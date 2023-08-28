<?php

class Usuarios extends ActiveRecord
{
    protected static $table = "usuarios";
    protected static $dbColumn = ["id", "nombre", "usuario", "email", "password", "imagen_url", "rol", "estado"];

    public $id;
    public $nombre;
    public $usuario;
    public $email;
    public $password;
    public $imagen_url;
    public $rol;
    public $estado;

    public function __construct($usuario)
    {
        $this->id = $usuario['id'] ?? '';
        $this->nombre = $usuario['nombre'] ?? '';
        $this->usuario = $usuario['usuario'] ?? '';
        $this->email = $usuario['email'] ?? '';
        $this->password = $usuario['password'] ?? '';
        $this->imagen_url = $usuario['imagen_url'] ?? '/avatars/default.png';
        $this->rol = $usuario['rol'] ?? 'usuario';
        $this->estado = $usuario['estado'] ?? 'normal';
    }

    public function validar()
    {

        if (empty($this->nombre)) {
            self::$errors[] = [
                "error" => "El nombre esta vacio",
                "code" => 1
            ];
        }

        if (empty($this->usuario)) {
            self::$errors[] = [
                "error" => "El usuario esta vacio",
                "code" => 2
            ];
        }
        if (empty($this->email)) {
            self::$errors[] = [
                "error" => "El email esta vacio",
                "code" => 3
            ];
        }

        if (empty($this->password)) {
            self::$errors[] = [
                "error" => "La contraseña esta vacia",
                "code" => 4
            ];
        }

        if (strlen($this->password) <= 5) {
            self::$errors[] = [
                "error" => "La contraseña debe ser mayor o igual a 6 digitos",
                "code" => 7
            ];
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$errors[] = [
                "error" => "El email no es valido",
                "code" => 5
            ];
        }
    }
    public function validarLogin()
    {
        if (empty($this->email)) {
            static::$errors[] = [
                "error" => "El email esta vacio",
                "code" => 3
            ];
        }

        if (empty($this->password)) {
            static::$errors[] = [
                "error" => "La contraseña esta vacia",
                "code" => 4
            ];
        }


        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            static::$errors[] = [
                "error" => "El email no es valido",
                "code" => 5
            ];
        }

    }

    public function validarPerfil()
    {

        if (empty($this->nombre)) {
            self::$errors[] = [
                "error" => "El nombre esta vacio",
                "code" => 1
            ];
        }

        if (empty($this->usuario)) {
            self::$errors[] = [
                "error" => "El usuario esta vacio",
                "code" => 2
            ];
        }
        if (empty($this->email)) {
            self::$errors[] = [
                "error" => "El email esta vacio",
                "code" => 3
            ];
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$errors[] = [
                "error" => "El email no es valido",
                "code" => 5
            ];
        }
    }

    public function crearCuenta()
    {
        try {
            $this->save();
            return true;
        } catch (\mysqli_sql_exception $th) {

            if ($th->getCode() == 1062) {
                self::$errors[] = [
                    "error" => "El email ya esta en uso !",
                    "code" => 8
                ];
            }
        }
    }

    public function actualizarPerfil()
    {
        if (!empty($_FILES['imagen_url']['name'])) {
            $previusImage = $this->imagen_url;

            if (file_exists("./" . $previusImage) && $previusImage !== '/avatars/default.png') {
                unlink("./" . $previusImage);
            }

            $tmpfile = $_FILES['imagen_url']['tmp_name'];
            $fileExt = explode(".", $_FILES['imagen_url']['name']);
            $ext = end($fileExt);

            $filename = time() . "." . $ext;
            $path = "/avatars/" . $filename;


            move_uploaded_file($tmpfile, "./" . $path);

            $this->setData('imagen_url', $path);
        }


        try {
            $this->save();
            $_SESSION['usuario'] = (array) $this;

            header("location: /perfil");
        } catch (\mysqli_sql_exception $th) {
            if ($th->getCode() == 1062) {
                self::$errors[] = [
                    "error" => "El email ya esta en uso !",
                    "code" => 8
                ];
            }
        }
    }

    public function login()
    {
        $sql = "SELECT * FROM usuarios WHERE email = '$this->email' and password = '$this->password'";

        $usuarioCreado = static::$db->query($sql)->fetch_assoc();


        if ($usuarioCreado) {
            if($usuarioCreado['estado'] == "ban"){
                static::$errors[] = [
                    "error" => "Has sido baneado de ecomind",
                    "code" => 22
                ];
            }
            else{
                $_SESSION['usuario'] = $usuarioCreado;
                header("location: /");
            }

        } else {
            static::$errors[] = [
                "error" => "Credenciales incorrectas",
                "code" => 10,
            ];
        }
    }
}

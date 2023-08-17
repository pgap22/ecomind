<?php

#[\AllowDynamicProperties]
class Foros extends ActiveRecord
{
    protected static $table = 'foros';
    protected static $dbColumn = ['id', 'nombre', 'descripcion', 'imagen_url', 'fecha_creacion', 'id_usuario', 'imagen_usuario'];
    protected static $errors = [];

    public $id;
    public $nombre;
    public $descripcion;
    public $imagen_url;
    public $fecha_creacion;
    public $id_usuario;
    public $imagen_usuario;

    public function __construct($foro)
    {
        $this->id = $foro['id'] ?? '';
        $this->nombre = $foro['nombre'] ?? '';
        $this->descripcion = $foro['descripcion'] ?? '';
        $this->imagen_url = $foro['imagen_url'] ?? '';
        $this->fecha_creacion = $foro['fecha_creacion'] ?? date('Y-m-d H:i:s');
        $this->id_usuario = $foro['id_usuario'] ?? '';

        $usuario = Usuarios::find($this->id_usuario);
        $this->imagen_usuario = $usuario->imagen_url;
    }

    public function validar($imagen = true)
    {

        if (empty($this->nombre)) {
            self::$errors[] = [
                "error" => "El nombre esta vacio",
                "code" => 1
            ];
        }

        if (empty($this->descripcion)) {
            self::$errors[] = [
                "error" => "La descripcion esta vacia",
                "code" => 11
            ];
        }
        if ($imagen) {
            if (empty($_FILES['imagen_url']['name'])) {
                self::$errors[] = [
                    "error" => "Ingresa una imagen",
                    "code" => 12
                ];
            }
            if (!str_starts_with($_FILES['imagen_url']['type'], "image")) {
                self::$errors[] = [
                    "error" => "Debe ser una imagen",
                    "code" => 13
                ];
            }
        }
    }
    /**
     * @return static[]
     */
    public static function busqueda($query): array
    {
        $result = Foros::executeSQL("SELECT * FROM foros WHERE nombre LIKE '%$query%' OR descripcion LIKE '%$query%'");
        $result = $result->fetch_all(MYSQLI_ASSOC);
        $foros = [];
        foreach ($result as $foro) {
            $foros[] = new Foros($foro);
        }
        return $foros;
    }
    public static function busquedaID($query,$id): bool|static
    {
        $result = Foros::executeSQL("SELECT * FROM foros WHERE nombre LIKE '%$query%' OR descripcion LIKE '%$query%' AND id = $id");
        $result = $result->fetch_assoc();
        if(!$result) return false;

        $foro = new static($result);

        return $foro;
    }

    public function actualizarImagen()
    {
        $foroimgname = time() . $_FILES['imagen_url']['name'];
        $path = "/foroimg/" . $foroimgname;
        move_uploaded_file($_FILES['imagen_url']['tmp_name'], "." . $path);

        unlink("." . $this->imagen_url);

        $this->setData('imagen_url', $path);
    }
    /**
     * @return static[]
     */
    public static function obtenerForosUnidos(): array
    {
        $foros = [];
        $idUsuario = $_SESSION['usuario']['id'];

        $forosUnidoSQL = Foros::executeSQL("SELECT * FROM usuariosForos WHERE id_usuario = $idUsuario");
        $forosUnidoSQL = $forosUnidoSQL->fetch_all(MYSQLI_ASSOC);

        foreach ($forosUnidoSQL as $foro) {
            $foroUnido = static::find($foro['id_foro']);
            $foroUnido->setData('unido', true);
            $foros[] = $foroUnido;
        }

        return $foros;
    }
    /**
     * @return static[]
     */
    public static function busquedaForosUnidos($query): array
    {
        $foros = [];
        $idUsuario = $_SESSION['usuario']['id'];

        $forosUnidoSQL = Foros::executeSQL("SELECT * FROM usuariosForos WHERE id_usuario = $idUsuario");
        $forosUnidoSQL = $forosUnidoSQL->fetch_all(MYSQLI_ASSOC);

        foreach ($forosUnidoSQL as $foro) {
            $foroUnido = static::busquedaID($query, $foro['id_foro']);
            if($foroUnido){
                $foroUnido->setData('unido', false);
                $foros[] = $foroUnido;
            }
        }

        return $foros;
    }

    public function unirseForo()
    {
        $idforo = $this->id;
        $idusuario = $_SESSION['usuario']['id'];

        try {
            $isInForo = $this->executeSQL("SELECT * FROM usuariosForos WHERE id_foro = $idforo AND id_usuario = $idusuario")->fetch_assoc();
            
            if($isInForo){
                return true;
            }

            $ok = $this->executeSQL("INSERT INTO usuariosForos(id_foro, id_usuario, fecha_inscripcion) VALUES($idforo, $idusuario, NOW())");
            return $ok;
        } catch (\mysqli_sql_exception $th) {
            echo '<pre>'; 
            var_dump($th); 
            echo '</pre>'; 
            return false;
        }
    }
}

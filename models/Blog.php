<?php

class Blog extends ActiveRecord
{
    protected static $table = 'blog';
    protected static $dbColumn = ['id', 'titulo', 'subtitulo', 'id_usuario', 'contenido', 'imagen_url', 'fecha_creacion', 'imagen_usuario'];
    protected static $errors = [];


    public $id;
    public $titulo;
    public $subtitulo;
    public $id_usuario;
    public $contenido;
    public $imagen_url;
    public $fecha_creacion;
    public $imagen_usuario;


    public function __construct($blog)
    {
        
        $this->id = $blog['id'] ?? '';
        $this->titulo = $blog['titulo'] ?? '';
        $this->subtitulo = $blog['subtitulo'] ?? '';
        $this->id_usuario = $blog['id_usuario'] ?? '';
        $this->contenido = $blog['contenido'] ?? '';
        $this->imagen_url = $blog['imagen_url'] ?? '';
        $this->fecha_creacion = $blog['fecha_creacion'] ?? date("Y-m-d H:i:s");
       
        $this->imagen_usuario = $blog['imagen_usuario'] ?? '';

        if(!empty($this->id_usuario) && empty($this->imagen_usuario)){
            $usuario = Usuarios::find($this->id_usuario);
            $this->imagen_usuario = $usuario->imagen_url;
        }
        else{
            $this->imagen_usuario = '';
        }
    }


    public function validar($imagen = true)
    {

        if (empty($this->titulo)) {
            self::$errors[] = [
                "error" => "El titulo esta vacio",
                "code" => 20
            ];
        }
        if (empty($this->subtitulo)) {
            self::$errors[] = [
                "error" => "El subtitulo esta vacio",
                "code" => 21
            ];
        }

        if (empty($this->contenido)) {
            self::$errors[] = [
                "error" => "El contenido esta vacio",
                "code" => 21
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

    public function actualizarImagen()
    {
        // if (file_exists("." . $this->imagen_url)) {
        //     unlink("." . $this->imagen_url);
        // }

        $blogname = time() . $_FILES['imagen_url']['name'];
        $path = "/blogsimg/" . $blogname;
        move_uploaded_file($_FILES['imagen_url']['tmp_name'], "." . $path);

        $this->setData('imagen_url', $path);
    }
}

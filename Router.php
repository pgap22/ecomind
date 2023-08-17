<?php

class Router
{

    private $layout = null;

    private $rutasGET = [];
    private $rutasPOST = [];

    public function get(string $url, $fn = null)
    {
        $this->rutasGET[$url] = $fn;
    }
    public function post(string $url, $fn = null)
    {
        $this->rutasPOST[$url] = $fn ;
    }


    public function ejecutarRutas()
    {
        $ruta = $_SERVER['PATH_INFO'] ?? '/';
        
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $fn = $this->rutasPOST[$ruta] ?? null;
            if($fn) $fn($this);
        } else {
            $fn = $this->rutasGET[$ruta] ?? null;
            if($fn) $fn($this);
        }
    }

    public function render(string $view, $datos = []){

        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        if(!$this->layout){
            include "./../views/" . $view . ".php";
            return;
        }
        
        $contenido = "./../views/" . $view . ".php";

        include $this->layout;
    }

    public function setLayout(string $layout){
        $file = file_exists("./../layouts/" . $layout . ".php"); 
    
        $this->layout = $file ? "./../layouts/" .$layout. ".php" : null;
    }
}

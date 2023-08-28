<?php

class Router
{

    private $layout = null;

    private $rutasGET = [];
    private $rutasPOST = [];

    public function get(string $url, $fn = null, $auth = false)
    {
        $this->rutasGET[$url] = [
            "page" => $fn,
            "auth" => $auth,
        ];
    }
    public function post(string $url, $fn = null, $auth = false)
    {
        $this->rutasPOST[$url] = [
            "page" => $fn,
            "auth" => $auth,
        ];
    }


    public function ejecutarRutas()
    {
        $ruta = $_SERVER['PATH_INFO'] ?? '/';

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $fn = $this->rutasPOST[$ruta]["page"] ?? null;
            $auth = $this->rutasGET[$ruta]["auth"] ?? null;
            if ($auth && isset($_SESSION['usuario'])) {
                $estado = $_SESSION['usuario']['estado'];
                if ($estado === 'ban') {
                    session_destroy();
                    header("location: /");
                }
            }

            if ($auth && !isset($_SESSION['usuario'])) {
                header("location: /login");
            }

            if ($fn) $fn($this);
        } else {
            $fn = $this->rutasGET[$ruta]["page"] ?? null;
            $auth = $this->rutasGET[$ruta]["auth"] ?? null;
            if ($auth && isset($_SESSION['usuario'])) {
                $estado = $_SESSION['usuario']['estado'];
                if ($estado === 'ban') {
                    session_destroy();
                    header("location: /");
                }
            }

            if ($auth && !isset($_SESSION['usuario'])) {
                header("location: /login");
            }

            if ($fn) $fn($this);
        }
    }

    public function render(string $view, $datos = [])
    {

        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        if (!$this->layout) {
            include "./../views/" . $view . ".php";
            return;
        }

        $contenido = "./../views/" . $view . ".php";

        include $this->layout;
    }

    public function setLayout(string $layout)
    {
        $file = file_exists("./../layouts/" . $layout . ".php");

        $this->layout = $file ? "./../layouts/" . $layout . ".php" : null;
    }
}

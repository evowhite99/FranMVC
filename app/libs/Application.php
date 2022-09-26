<?php

/**
 * La clase Application maneja la URL y lanza los procesoo...
 */

class Application
{
    private $url_controller = null;
    private $url_action = null;
    private $url_params = [];


    function __construct()
    {
        $db = Mysqldb::getInstance()->getDatabase();

        $url = $this->separarUrl();

        if (!$this->urlController) {
            require_once '../app/controllers/LoginController.php';
            $page = new LoginController();
            $page->index();
        } else if (file_exists('../app/controllers/' . ucfirst($this->urlController) . 'Controller.php')) {
            $controller = ucfirst($this->urlController) . 'Controller.php';
            require_once '../app/controllers/' . $controller . '.php';
            $this->urlController = new $controller;
            $this->urlController->index();
        }
    }

    public function separarUrl()
    {
        if ($_SERVER['REQUEST_URI'] != '/') {
            $url = trim($_SERVER['REQUEST_URI'], characters: '/');
            $url = filter_var($url, filter: FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            $this->urlController = $url[0] ?? null;
            $this->urlAction = $url[1] ?? null;

            unset($url[0], $url[1]);

            $this->urlParams = array_values($url);
        }
    }
}

<?php

namespace app\core;

class RouterCore
{
    private $uri;
    private $method;
    private $arGet = [];

    public function __construct()
    {
        $this->initialize();

        require '../app/config/Router.php';

        $this->execute();
    }

    private function initialize()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        $ex = explode('/', $uri);

        $uri = $this->normalizeURI($ex);

        for ($i = 0; $i < UNSET_URI_COUNT; $i++) {
            unset($uri[$i]);
        }

        $this->uri = implode('/', $this->normalizeURI($uri));
        if (DEBUG_URI) {
            dd($this->uri);
        }
    }

    private function normalizeURI($uri)
    {
        return array_values(array_filter($uri));
    }

    private function get($router, $call)
    {
        $this->arGet[] = [
            'router' => $router,
            'call' => $call,
        ];
    }

    private function execute()
    {
        if ($this->method == 'GET') {
            $this->executeGet();
        }
        if ($this->method == 'POST') {
            // CODE
        }
    }

    private function executeGet()
    {
        foreach ($this->arGet as $get) {
            $router = substr($get['router'], 1);

            if (substr($router, -1) == '/') {
                $router = substr($router, 0, -1);
            }

            if ($router == $this->uri) {
                if (is_callable($get['call'])) {
                    $get['call']();

                    break;
                }
            }
        }
    }
}

<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\App;

use WghtTrackApp_ClassLib\Exceptions\ViewNotFoundException;

class View{
    public function __construct(
        protected string $view,
        protected array $params = []
    )
    {
        
    }

    public static function create_View(string $view, array $params = []){
        return new static($view, $params);
    }

    public function render(): string{
        $viewPath = VIEW_PATH . '/' . $this->view . '.php';

        if(! file_exists($viewPath)){
            throw new ViewNotFoundException($viewPath);
        }

        foreach($this->params as $key => $value){
            $$key = $value;
        }

        ob_start();

        include $viewPath;

        return (string) ob_get_clean();
    }

    public function __toString()
    {
        return $this->render();
    }

    public function __get($name)
    {
        return $this->params[$name];
    }


}
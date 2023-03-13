<?php

namespace Core\Controllers;

use Core\Models\Client;
use Core\View\View;

class AbstractController
{
    protected $view;
    public function __construct()
    {
        $this->view = new View(__DIR__.'/../../templates');
    }

    public function action(){
      var_dump( Client::findAll());
    }
}

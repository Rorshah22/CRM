<?php

namespace Core\Controllers;

use Core\Models\UsersAuthService;
use Core\View\View;

class AbstractController
{
    protected $view;
    protected $user;
    public function __construct()
    {
        $this->user = UsersAuthService::getUserByToken();
        $this->view = new View(__DIR__.'/../../templates');
        $this->view->setVar('user', $this->user);
    }


}

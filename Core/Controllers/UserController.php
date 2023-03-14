<?php

namespace Core\Controllers;

use Core\Exceptions\InvalidArgumentException;
use Core\Models\Client;
use Core\Models\User;
use Core\Models\UsersAuthService;

class UserController extends AbstractController
{

    public function login()
    {
        try {
            if (!empty($_POST)) {
                $user = User::login($_POST);
                UsersAuthService::createToken($user);
                header('Location: /home');
                exit();
            }
        } catch (InvalidArgumentException $e) {
            $this->view->renderHtml('user/manager.php', ['error' => $e->getMessage()]);
            return;
        }
        $this->view->renderHtml('user/manager.php');
    }
    public function comment()
    {
           if (!empty($_POST)) {
            Client::addComment($_POST, $this->user);
        }

        header('Location: /home' , true, 302);
        exit();
    }
    public function home()
    {
        $condition = '';
        if (intval($this->user->getId()) === 1){
            $condition = 'WHERE MOD(id,2)=0';
        }
        if (intval($this->user->getId()) === 2){
            $condition = 'WHERE MOD(id,2)=1';
        }
        $requests = Client::findAll('DESC',$condition);
        $this->view->renderHtml('user/home.php', ['requests'=>$requests]);
    }
}
<?php

namespace Core\Controllers;

use Core\Exceptions\InvalidArgumentException;
use Core\Models\Client;

class RequestController extends AbstractController
{
    public function request()
    {
        if (!empty($_POST)){
            try {

            Client::createFromData($_POST);
            }catch (InvalidArgumentException $e){
                $this->view->renderHtml('main/main.php', ['error' => $e->getMessage()]);
                return;
            }

        header('Location: /done',true,302);
        exit();
        }
        $this->view->renderHtml('main/main.php');
    }
}

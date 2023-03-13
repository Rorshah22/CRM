<?php

namespace Core\Controllers;

use Core\Models\Client;

class RequestController extends AbstractController
{
    public function request()
    {
        if (!empty($_POST)){

            Client::createFromData($_POST);
        }
    }
}

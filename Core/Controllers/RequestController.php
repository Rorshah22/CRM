<?php

namespace Core\Controllers;

class RequestController extends AbstractController
{
    public function request()
    {
        if (!empty($_POST)){

        var_dump($_POST);
        }
    }
}

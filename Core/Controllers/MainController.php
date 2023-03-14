<?php

namespace Core\Controllers;

class MainController extends AbstractController
{
    public function main():void
    {
        $this->view->renderHtml('main/main.php');
    }
    public function done():void
    {
        $this->view->renderHtml('main/done.php');
    }
}

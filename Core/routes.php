<?php

return [
    '~^$~' => [\Core\Controllers\MainController::class, 'main'],
    '~^request$~' => [\Core\Controllers\RequestController::class, 'request'],
    '~^done$~' => [\Core\Controllers\MainController::class, 'done'],
    '~^manager$~' =>[\Core\Controllers\UserController::class,'login'],
    '~^login~' =>[\Core\Controllers\UserController::class,'login'],
    '~^home~' =>[\Core\Controllers\UserController::class,'home'],
    '~^comment_add$~' =>[\Core\Controllers\UserController::class,'comment'],
];

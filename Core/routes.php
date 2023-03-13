<?php

return [
    '~^$~' => [\Core\Controllers\MainController::class, 'main'],
    '~^request$~' => [\Core\Controllers\RequestController::class, 'request']
];

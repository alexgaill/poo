<?php
define ('ROOT', dirname(__DIR__));

require ROOT . '/Core/Autoloader/Autoloader.php';
use Core\Autoloader\Autoloader;


Autoloader::register();

require ROOT . "/App/Routing/Routing.php";

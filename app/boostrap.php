<?php
// load config
require_once 'config/config.php';
require_once 'helper/helper.php';

// load libraries
/*require_once 'libraries/Controller.php';
require_once 'libraries/Core.php';
require_once 'libraries/Database.php';*/

// Autoload Core Libraries
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});
$init = new Core();


?>
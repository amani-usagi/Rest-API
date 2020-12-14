<?php
    //directory seperator
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    defined('SITE_ROOT') ? null : define('SITE_ROOT', DS. 'xampp' .DS. 'htdocs' .DS. 'rest');

    //defining path for resources
    defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'include');
    defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');

    //loading config.php
    require_once(INC_PATH.DS."config.php");

    //core classes
    require_once(CORE_PATH.DS."post.php") 
?>
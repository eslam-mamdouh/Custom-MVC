<?php

require_once(ROOT .'/config/config.php');
require_once(ROOT . '/app/lib/helpers/functions.php');

// Autoload classes
function __autoload($class){
    if(file_exists(ROOT.'/core/'.$class.'.php')){
        require_once(ROOT.'/core/'.$class.'.php');
    }elseif( ROOT.'/app/controllers/'.$class.'.php' ){
        require_once(ROOT.'/app/controllers/'.$class.'.php');
    }elseif(ROOT.'/app/models/'.$class.'.php'){
        require_once(ROOT.'/app/models/'.$class.'.php');
    }
}

// Route The Request
Router::route($url);
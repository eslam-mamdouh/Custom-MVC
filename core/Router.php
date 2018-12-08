<?php

class Router{

    public static function route($url){
        if(isset($url[0]) && !empty($url)){
            $controller = ucwords($url[0]);
        }else {
            $controller = DEFAULT_CONTROLLER;   
        }

        array_shift($url); // delete first element and shift other elments to left

        if(isset($url[0]) && !empty($url)){
            $action = $url[0];
        }else {
            $action = 'index';
            
        }
        array_shift($url); 
        
        $params = $url;

        $dispatch = new $controller($controller , $action);
        if(method_exists($controller , $action)){
            call_user_func_array( [ $dispatch , $action] , $params);
        }else{
            die('This Method does not exist in the controller \"'.$controller.'\"');
        }

        debug($dispatch);
       
    }
}
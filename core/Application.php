<?php

class Application{

    public function __construct(){
        $this->set_reporting();
        $this->unregister_globals();

    }

    private function set_reporting(){
        if(DEBUG){
                error_reporting(E_ALL);
                init_set('display_errors' ,1);
        }else {
            error_reporting(0);
            init_set('display_errors' ,0);
            init_set('log_errors' ,1);
            init_set('error_log' , ROOT.'/tmp/logs/errors.log');
        }

    }

    // this function to unset all globals variables
    private function unregister_globals(){
        if(init_get('register_globals')){
            $globalArr = ["_SESSION" , "_COOKIE", "_POST" , "_GET" , "_REQUEST" , "_SERVER" , "_ENV" , "_FILE"];
            foreach($globalArr as $glob){
                foreach ($GLOBALS[$glob] as $key => $value) {
                    if($GLOBALS[$key] === $value){
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }
}
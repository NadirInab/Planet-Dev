<?php

spl_autoload_register("autoLoader") ;

function autoLoader($className){   
    $path = "../classes/" ;
    $ext = ".php" ;
    $fullPath = __DIR__."/".$path.$className.$ext ;
    if(!file_exists($fullPath)){
        return false ;
    }
     require $fullPath ;
}
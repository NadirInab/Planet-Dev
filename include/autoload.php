<?php 


spl_autoload_register('autoload') ;

function autoload($className){
    $path = "../classes/" ;
    $file = ".php" ;
    $fullPath = __DIR__.'/'.$path.$className.$file ;

    if(!file_exists($fullPath)){
        return false ;
    }
    require $fullPath ;
}
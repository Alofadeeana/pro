<?php

function autoLoader($className)
{
    $dirs = array('','../Models/',Models,'Models/');
    $formats = array('%s.php.anc','%s.php','%s.class.php','class.%s.php');
    foreach ($dirs as $key => $dir) {
        foreach ($formats as $key => $format) {
            $path = $dir.  sprintf($format,$className);
            if(file_exists($path))
            {
                include $path;
                return;
            } 
        } 
    }
}
spl_autoload_register('autoLoader');
?>
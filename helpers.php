<?php

#namespace Worktopia\Helpers;
/**
 * Get the base path
 * @param string $path
 * @return string
 */
function basePath(string $path = ''): string
{
  return rtrim(__DIR__, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);

  // return __DIR__ . "/" . $path;
}

/**
 * Load a view
 * @param string $name
 */

function loadView(string $name){
    require basePath('views/'.$name.'.view.php');
}

/**
 * Load partial
 * @param string $nombre
 */

function loadPartial(string $nombre = "head"){
    //var_dump(basePath('views\partials\\' .$nombre .'.php'));
  //  require basePath('views\\partials\\'.$nombre.'.php');
    if(basePath('views/partials/'.$nombre.'.php')){
        return basePath('views/partials/'.$nombre.'.php');
    }else{
        error_log( basePath('views/partials/'.$nombre.'.php'));
        return ;
    }

}

?>
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

function loadView(string $name , $data = []){
     extract($data);
      $viewPath =  basePath('views\\'.$name.'.view.php');
//    inspect($viewPath);
//    inspectAndDie($name);
    if(file_exists($viewPath)){
    require basePath('views/'.$name.'.view.php');
    }else{
        echo "Error loading file $viewPath not found" ;
    }
}

/**
 * Load partial
 * @param string $nombre
 */

function loadPartial(string $nombre = "head"){
    //var_dump(basePath('views\partials\\' .$nombre .'.php'));
  //  require basePath('views\\partials\\'.$nombre.'.php');
    $partialPath = basePath('views/partials/'.$nombre.'.php');
    if(file_exists($partialPath)){
        return basePath('views/partials/'.$nombre.'.php');

    }else{
         error_log( basePath('views/partials/'.$nombre.'.php'));
        echo "partial $partialPath not loading ";
    }

}



//// debugins
/**
 * inspect a value(s)
 * @param mixed $value
 * return void
 */
function inspect($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

/**
 * Inspect a value(s) and die
 *
 * @param mixed $value
 * @return void
 */
function inspectAndDie($value)
{
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}

/**
 * Format salary
 *
 * @param string $salary
 * @return string Formatted Salary
 */
function formatSalary($salary)
{
    return '$' . number_format(floatval($salary));
}

/**
 * Sanitize Data
 *
 * @param string $dirty
 * @return string
 */
function sanitize($dirty)
{
    return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
}

/**
 * Redirect to a given url
 *
 * @param string $url
 * @return void
 */
function redirect($url)
{
    header("Location: {$url}");
    exit;
}

?>
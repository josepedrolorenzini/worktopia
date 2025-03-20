<?php

#namespace Worktopia\Helpers;
/**
 * Get the base path
 * @param string $path
 * @return string
 */
function basePath($path = '') {
   return rtrim(__DIR__, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);

  // return __DIR__ . "/" . $path;
}

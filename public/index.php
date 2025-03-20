<?php

require __DIR__ . '/../helpers.php'; // Include helper

//var_dump(basePath('views\home.view.php') );
require basePath('views/home.php') ;
die;
use function Worktopia\Helpers\basePath; // Correct import

echo basePath('views\home.php');


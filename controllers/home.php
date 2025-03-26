<?php

$config = require basePath("config/db.php") ;

try {

    $db = new Database($config);
    $listings = $db->query("SELECT * FROM listings" )->fetchAll() ;
    //inspectAndDie($listings);

    $listingsJSON = json_encode($listings) ;
  #  inspect( $listings);

} catch (Exception $e) {
    echo "An error occurred: ". $e->getMessage() ;

}


//$data = [
//    "listings" => $listings
//] ;
//var_dump($data) ;
loadView("home" ,[
    "listings" => $listings
]);
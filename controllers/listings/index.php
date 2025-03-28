<?php
// exporting database
$config = require basePath("config/db.php") ;


try{

    // instantiate database object
$db = new Database($config) ;

// query the database
$listings = $db->query("SELECT * FROM listings LIMIT 6")->fetchAll() ;

// debug and die if there are any errors in the query
//inspectAndDie($listings) ;

// load the view with the listings data coming from the extract method in loadview method helpers
loadView("listings\index" , [
        "listings" => $listings
    ]
);

}catch(Exception $e){
    echo "An error occurred: ".$e->getMessage() ;
}


?>
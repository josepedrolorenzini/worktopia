<?php


// exporting database
$config = require basePath("config/db.php") ;


try{

    // instantiate database object
    $db = new Database($config) ;

    $id = $_GET['id'];
   // echo $id ;
    $params = [
        'id' => $id  // bind the id parameter to the query to prevent SQL injection
    ] ;

// query the database
       $listing = $db->query("SELECT * FROM listings where id = :id" , $params)->fetch() ;
//inspect($listing);   // die;

// debug and die if there are any errors in the query
//inspectAndDie($listings) ;

// load the view with the listings data coming from the extract method in loadview method helpers
    loadView("listings/show" ,[
        'listing' =>$listing
    ]);

}catch(Exception $e){
    echo "An error occurred: ".$e->getMessage() ;
}



<?php
    header('Access-Control-Allow-Origin: *');

    $url = $_GET['shortURL']; 
    
    // Get contents of file and decode JSON to a PHP stdObject
    $json = file_get_contents('./database/urls.json');
    $data = json_decode($json);

    foreach ($data as $key => $value) {
        if ($url == $value) { // If the provided key and the key in the JSON file matches, echo the url associated to that key
            echo $key;
        }
    }
?>
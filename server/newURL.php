<?php
    header('Access-Control-Allow-Origin: *');

    function generateRandomString() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        $length = 15;
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    $url = $_GET['url'];
    if ($url == "") die('<span style="color:red">No URL Specified</span>'); // If no URL is specified, return a formatted string

    // Get contents of file and decode JSON to a PHP stdObject
    $json = file_get_contents('./database/urls.json');
    $data = json_decode($json);

    // If a URL is enterd that is in the databse, return that so no copies are stored
    if (isset($data->$url)) { // If URL is already taken
        echo $data->$url; // Echo the url in the JSON file
        die();
    }

    $newURL = generateRandomString(); // Generate Random String

    $data->$url = $newURL;

    $file = fopen('./database/urls.json', 'w'); // Open the JSON file
    fwrite($file, json_encode($data)); // Write the new data to the JSON file
    fclose($file); // Close

    echo $newURL; // Echo the URL so the frondend can display it
?>
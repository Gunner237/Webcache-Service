<?php
    
    function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
    
    $url = $_GET['u'];
    
    // Remove all illegal characters from a url
    $url = filter_var($url, FILTER_SANITIZE_URL);
    
    // Validate url
    if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
        //$jsonData = file_get_contents($url,false,$context);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_USERAGENT,'Gunner237.WebCacheService');
        $jsonData = curl_exec($ch);
        curl_close($ch);
        
        
        if (isJson($jsonData)){
            echo $jsonData;
        }
        else{
            echo("$url does not contain JSON data, so the webcaching service was unable to retrieve it successfully");
        }
    }
    else {
        echo("$url is not a valid URL");
    }
    
    ?>

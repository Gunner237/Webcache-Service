<?php
    // Add user agent to comply with GitHub's documentation
    $opts = [
    'http' => [
    'method' => 'GET',
    'header' => [
    'User-Agent: Gunner237'
    ]
    ]
    ];
    
    $context = stream_context_create($opts);
    
    $url = $_GET['u'];
    
    // Remove all illegal characters from a url
    $url = filter_var($url, FILTER_SANITIZE_URL);
    
    // Validate url
    if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
        $jsonData = file_get_contents($url,false,$context);
        echo $jsonData;
    }
    else {
        echo("$url is not a valid URL");
    }
    
    ?>

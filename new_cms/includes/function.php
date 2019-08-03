<?php

    function redirect($uri){
        $domena = 'http://localhost';
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$domena.$uri);
        exit;
        echo $domena.$uri;
    }

?>
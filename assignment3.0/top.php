<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Monster Hunter</title>
        <meta charset="utf-8">
        <meta name="author" content="Aaron Longchamp">
        <meta name="description" content="Created to show usage of forms and 
              tell people about my favorite video game.">
        <meta name="viewport" content="width=device-width, inital-scale=1">
        
        <!-- [if lt IE 9]>
        <script src="//html5shim.googlecode.com/sin/trunk/html5.js"></script>
        <![endif] -->
        
         <link rel="stylesheet" href="style.css" type="text/css" media="screen">
        
        <?php
            // #####################################################################
            //
            // PATH SETUP
            //
        
        
        
        
        
        
        
        
        
        
        
        
            $phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");
        
            $path_parts = pathinfo($phpSelf);
        
            if ($debug)
            {
                print "<p>php Self: " . $phpSelf;
                print "<p>Path Parts<pre>'";
                print_r($path_parts);
                print "</pre>";
            }
        
            // #####################################################################
            //
            // include all libraries
            //
        
        
        
        
        
        
        
        ?> 
         
    </head>
    <!-- ### Body ### -->
    
    <?php 
    
    print '<body id="' . $path_parts['filename'] . '">';
    
    include "header.php";
    include "nav.php";

    ?>
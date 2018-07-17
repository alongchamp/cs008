<!DOCTYPE html>
<html lang="en">
    <head>
        <figure class="image">
            <img src="images/bjsmdfacs_header.gif" alt="Brian J Supple's Header">
        </figure>
        <meta charset="utf-8">
        <meta name="author" content="Aaron Longchamp & Michael Swain">
        <meta name="description" content="A rework of Brain Supple's site to revitalize 
              for easier use.">
        <meta name="viewport" content="width=device-width, inital-scale=1">
        
        <link rel="stylesheet" href="style.css" type="text/css" media="screen">
         
        <?php 
        
            $debug = false;
            // debug for testing
            $domain = "http://";
            if (isset($_SERVER['HTTPS'])) {
                if ($_SERVER['HTTPS']){
                    $domain = "https://";
                }
            }
            
            $server = htmlentities($_SERVER['SERVER_NAME'], ENT_QUOTES, "UTF-8");
            
            $domain .= $server;
        
            $phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");
        
            $path_parts = pathinfo($phpSelf);
        
            if ($debug) {
                print "<p>Domain" . $domain;
                print "<p>php Self: " . $phpSelf;
                print "<p>Path Parts<pre>'";
                print_r($path_parts);
                print "</pre>";
            }
            
            // include libraries
            
            require_once ('lib/security.php');    
            
            if ($path_parts['filename'] == "form") {
                include "lib/validation-functions.php";
                include "lib/mail-message.php";
            }
        ?>
        
        </head>
    <!-- ### Body ### -->
    
    <?php 
    print '<body id="' . $path_parts['filename'] . '">';
    
    include "header.php";
    include "nav.php";
    ?>
        
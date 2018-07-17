<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            My Photographic Life
        </title>
        <meta name="author" content="Aaron Longchamp">
        <meta name="description" content="My Photographic Life">
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" type="text/css" media="screen">
        
        <?php
        
        $phpSelf = htmlentities($_SERVER['PHP_SELF'],ENT_QUOTES, "UFT-8");
        $path_parts = pathinfo($phpSelf);
        
        ?>
        
    </head>
    
    <?php
    print '<body id="' . $path_parts['filename'] . '">';
    
    ?>
    
<!-- ### Start of Body ###-->
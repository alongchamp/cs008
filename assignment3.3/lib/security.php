<?php

// #############################################################################
// Security Checks
function securityCheck($form = false) {
    
    $status = true; // start with no errors
    
    // when form page check to make sure it sends to itself
    if ($form) {
        // globals in top.php
        global $yourURL;
        
        $fromPage = htmlentities($_SERVER['HTTP_REFERER'], ENT_QUOTES, "UTF-8");
        
        if ($debug) {
            print "<p>From: " . $fromPage . " should match URL: " . $yourURL;
        }
        
        if ($fromPage != $yourURL) {
            $status = false;
        }
    }
    
    return $status;
}

?>
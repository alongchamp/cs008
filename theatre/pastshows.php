<!DOCTYPE HTML>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="author" content="Gabriella Ortiz">
        <meta name="description" content="Exterior Photos.">
        <link rel="stylesheet"
              href="style.css"
              type="text/css"
              media="screen">


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$debug = false;

if(isset($_GET["debug"])){
    $debug = true;
}

$myFileName="theatre";

$fileExt=".csv";

$filename = $myFileName . $fileExt;

if ($debug) {
    print "\n\n<p>filename is " . $filename;
}

$file=fopen($filename, "r");

/* the variable $file will be empty or false if the file does not open */
if($file){
    if ($debug) {
        print "<p>File Opened</p>\n";
    }
}

    /* This reads the first row, which in our case is the column headers */
    $headers=fgetcsv($file);
    
    if($debug) {
        print "<p>Finished reading headers.</p>\n";
        print "<p>My header array<p><pre> "; print_r($headers); print "</pre></p>";
    }
    /* the while (similar to a for loop) loop keeps executing until we reach 
     * the end of the file at which point it stops. the resulting variable 
     * $records is an array with all our data.
     */
    while(!feof($file)){
        $records[]=fgetcsv($file);
    }
    
    //closes the file
    fclose($file);
    
    if($debug) {
        print "<p>Finished reading data. File closed.</p>\n";
        print "<p>My data array<p><pre> "; print_r($records); print "</pre></p>";
    }

print "<table>";
foreach ($records as $oneRecord) {
    if ($oneRecord[8] != "") {  //the eof would be a "" 
        print "<tr>";
        //print out values
//        print '<a href="' . $oneRecord[4] . '" target="_blank" ' . '>';
        print '<td><span class="userId">' . $oneRecord[1] . '</span></td>';
        print '<td><span class="description">' . $oneRecord[2] . '</span></td>';
        print '<td><span class="calories">' . $oneRecord[3] . '</span></td>';
        print '<td><img src="' . $oneRecord[7] . '" alt="' . $oneRecord[8] . '"></td>';
print "</tr>";
    }
}

print "</table>";

if ($debug) {
    print "<p>End of processing.</p>\n";
}

?>

 </html>                   
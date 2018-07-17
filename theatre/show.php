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

if ($debug) print "\n\n<p>filename is " . $filename;

$file=fopen($filename, "r");

/* the variable $file will be empty or false if the file does not open */
if($file){
    if($debug) print "<p>File Opened</p>\n";
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

print "<ol>";
foreach ($records as $oneRecord) {
    if ($oneRecord[8] != "") {  //the eof would be a "" 
        print "\n\t<li>";
        //print out values
//        print '<a href="' . $oneRecord[4] . '" target="_blank" ' . '>';
        print '<img src="'$oneRecord[5]'" alt="' . $oneRecord[2] . '">';
        print '</a>';
        print '<span class="userId">' . $oneRecord[1] . '</span>';
        print '<span class="description">' . $oneRecord[2] . '</span>';
        print '<span class="calories">' . $oneRecord[3] . '</span>';
print "\n\t</li>";
    }
}

print "</ol>";

if ($debug)
    print "<p>End of processing.</p>\n";
?>
                    
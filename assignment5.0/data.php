<?php

$debug = false;

if (isset($_GET["debug"]))
{
    $debug = true;
}

$myFileName = "data/photo_data";

$fileExt = ".csv";

$filename = $myFileName . $fileExt;

if ($debug)
{
    print"<p>Filename is " . $filename;
}

$file = fopen($filename,"r");

if ($file)
{
    if ($debug)
    {
            print "<p>File Opened</p>";
    }
}

if ($file)
{
    if ($debug)
    {
        print "<p>Begin reading data into an array.</p>";
    }
    
    $headers[] = fgetcsv($file);
    
    if ($debug)
    {
        print "<p>Finished reading data.</p>";
        print "<p>My header array<p><pre>";
        print_r($headers);
        print"</pre></p>";
    }
    
    while (!feof($file))
    {
        $records[] = fgetcsv($file);
    }
    
    fclose($file);
    
    if($debug)
    {
        print "<p>Finished reading data. File closed.</p>";
        print "<p>My data array<p><pre>";
        print_r($records);
        print"</pre></p>";
    }
}

include "top.php";

?>

<h1>
    Table of Data For Images
</h1>

<table>

<?php
foreach ($headers as $oneHeader)
{
    print "<tr>";
    print "<td>$oneHeader[0]</td>";
    print "<td>$oneHeader[1]</td>";
    print "<td>$oneHeader[2]</td>";
    print "<td>$oneHeader[3]</td>";
    print "<td>$oneHeader[4]</td>";
    print "<td>$oneHeader[5]</td>";
    print "</tr>";
}
foreach ($records as $oneRecord)
{
    
    print "<tr>";
    print "<td>$oneRecord[0]</td>";
    print "<td>$oneRecord[1]</td>";
    print "<td>$oneRecord[2]</td>";
    print "<td>$oneRecord[3]</td>";
    print "<td>$oneRecord[4]</td>";
    print "<td>$oneRecord[5]</td>";
    print "</tr>";
}

?>

</table>
</html>
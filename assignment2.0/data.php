<?php

$debug = false;

if (isset($_GET["debug"]))
{
    $debug = true;
}

$myFileName = "Photos";

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

include ("top.php");
include ("header.php");
include ("nav.php");
?>

    <h4>
        Table of Data for my Images
    </h4>
<table>
    
<?php

foreach ($records as $oneRecord)
{
    print "<tr>";
    print "<td>$oneRecord[0]</td>";
    print "<td>$oneRecord[1]</td>";
    print "<td>$oneRecord[2]</td>";
    print "<td>$oneRecord[3]</td>";
    print "<td>$oneRecord[4]</td>";
    print "<td>$oneRecord[5]</td>";
    print "<td>$oneRecord[6]</td>";
    print "<td>$oneRecord[7]</td>";
    print "<td>$oneRecord[8]</td>";
    print "</tr>";
}
?>
</table>

<figure>
    <img class="medium" alt="Original Sign."
                 src="Pics/Street_Sign.jpg">
            <figcaption>
                This is the original photo of the .png I made.
            </figcaption>
</figure>

<p>
    On this page there is data from the 3 different types of pictures that I 
    have on my site. Each picture is on a different page and is a different 
    type. There is a JPG, a PNG, and a GIF. Each of these photos are taken from 
    a different part of Burlington, VT shown on the map on my index.php page. 
    The JPG file is my site map on the index.php page. The PNG is the 
    transparent image on my churchst.php page. And finally the GIF file is a few
    pictures of the waterfront that I took with my camera and it is just cycling
    through them.
</p>

</html>
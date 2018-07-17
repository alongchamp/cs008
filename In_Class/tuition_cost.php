<!DOCTYPE html>
<html>
    <head>
        <title>
            Tuition Cost Classwork
        </title>
        <meta charset="utf-3">
        <meta name="author" content="Aaron Longchamp">
        <meta name="description" content="Practice using arrays in class.">
        <link rel="stylesheet" href="style.css" type="text/css" media="screen">
    </head>
    <body>
        <?php
            $tuition=array(
                array(1996,6468),
                array(2000,7464),
                array(2014,13728)
            );
            print "<h1>Tuition Cost</h1>";
            
            print"<ol>";
            
            foreach($tuition as $row){
                print "<li>".$row[0]."---".$row[1]."</li>";
            }
            print "</ol>";
        ?>
    </body>
</html>
<?php
include ("top.php");
include ("header.php");
include ("nav.php");
?>
<article id="main">
    <h2>
        Index
    </h2>
    <p>
        This is my main page for my photo site. There really isn’t much that I 
        have to say for this page but I can give it a shot. I am currently a 
        college student at the University of Vermont studying computer science 
        and hoping to get a bachelor’s degree. I also have a love of photography 
        and a 35mm Canon T-50. Originally the camera was my father’s but he 
        never used it and one day I told him of my interest in photography. And 
        thus began my journey into the photography world. I have only shot 2 
        rolls so far so I don’t have too many to work with (also most are light 
        splotched because I didn’t know how to take the film out) but I have a 
        few that are ok. And thus begins my voyage…
    </p>
    <figure>
        <img src='Pics/burlington.jpg' alt="Clickable map of Burlington,VT" usemap="#Pics/burlington.jpg">
        <map id="Pics/burlington.jpg" name="Pics/burlington.jpg">
            <area shape="rect" alt="Hilton" coords="476,375,545,513" href="hilton.php" />
            <area shape="rect" alt="Church St" coords="1103,26,1168,535" href="churchst.php" />
            <area shape="rect" alt="Waterfront" coords="86,87,173,145" href="waterfront.php" />
        </map>
        <figcaption>
            Click Church Street, Waterfront Park, or Hilton to view the image and page. Source: Google Maps
        </figcaption>
    </figure>
    
</article>

<?php
include ("footer.php");
?>

</body>
</html>
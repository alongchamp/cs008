<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Recycle
        </title>
        <meta charset ="utf-8">
        <meta name="author" content="Aaron Longchamp">
        <meta name="description" content="A personal view on how to help the 
              planet by recycling.">
        <link rel="stylesheet" href="style.css" type="text/css" media="screen">
    </head>
    <body>
        <h1>
            Recycling Earth
        </h1>
        <figure class="img-left small">
            <img class="small" alt="recycle_image" src="cc_recycle.png">
            <figcaption>
                A cartoon child recycling and sorting the different types of 
                recycle. Source: Creative Commons (Pixabay)
            </figcaption>
        </figure>
        <ol> 
            <li>
                <a href="index.php">Main</a>
            </li>
            <li>
                <a class="activePage">Recycling</a>
            </li>
            <li>
                <a href="community.php">Community Service</a>
            </li>
            <li>
                <a href="redemption.php">Redemption</a>
            </li>
        </ol>
        <h2>
            Recycle
        </h2>
        <p>
            There are many ways that we can stop pollution on this planet. 
            The easiest would be to recycle. Just by sorting recycle from trash 
            can reduce the amount of pollution on this planet drastically. This 
            can be most easily achieved by having a recycling bin in your house 
            and knowing what is recycle and what isn’t. Simply by going to your 
            solid waste processing plant and picking up a bucket. Most 
            facilities will hand them out to stop the continued increase of 
            landfills. To know what can and can’t go into recycling buckets it 
            is easiest to Google. There are plenty of sites on the internet to 
            help with that but also on the buckets or the waste treatment 
            facility can answer any questions you have about recycling. 
        </p>
        <h2>
            Recycling Rates of Items in Percent
        </h2>
        <?php
        
        $itemPercent=array(
            array("Lead-Acid Batteries",95.9),
            array("Steel Cans",70.8),
            array("Newspaper/Mechanical Papers",70.0),
            array("Yard Trimmings",57.7),
            array("Aluminum Cans",54.6),
            array("Tires",44.6),
            array("Glass Containers",34.1)
        );
        foreach($itemPercent as $row){
            print "<p>".$row[0]."-".$row[1]."</p>";
        }
        ?>
        <h3>
            Source: United States Environmental Protection Agency 2012 Survey
        </h3>
    </body>
</html>

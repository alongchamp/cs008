<!--### Navigation Bar ###-->
<nav>
    <ol>
        <?php
        // checks for main page
        if ($path_parts['filename'] == "index")
        {
            print '<li class="activePage">Index</li>';
        }
        else 
        {
            print '<li><a href="index.php">Index</a></li>';
        }
        // checks for about me page
        if ($path_parts['filename'] == "hilton")
        {
            print '<li class="activePage">Hilton</li>';
        }
        else
        {
            print '<li><a href="hilton.php">Hilton</a></li>';
        }
        // checks for pictures page
        if ($path_parts['filename'] == "churchst")
        {
            print '<li class="activePage">Church St</li>';
        }
        else
        {
            print '<li><a href="churchst.php">Church St</a></li>';
        }
        // checks for contact page
        if ($path_parts['filename'] == "waterfront")
        {
            print '<li class="activePage">Waterfront Park</li>';
        }
        else
        {
            print '<li><a href="waterfront.php">Waterfront Park</a></li>';
        }
        // checks for data page
        if ($path_parts['filename'] == "data")
        {
            print '<li class="activePage">Data</li>';
        }
        else
        {
            print '<li><a href="data.php">Data</a></li>';
        }
        ?>
    </ol>
</nav>
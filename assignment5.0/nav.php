<!-- Navigation Page -->

<nav class="nav-area">
    <ol>
        <?php
            if ($path_parts['filename'] == "index")
            {
                print '<li><a class="activePage">Home</a></li>';
            }
            else
            {
                print '<li><a href="index.php">Home</a></li>';
            }
            
            if ($path_parts['filename'] == "about")
            {
                print '<li><a class="activePage">About</a></li>';
            }
            else 
            {
                print '<li><a href="about.php">About</a></li>';
            }
            
            if ($path_parts['filename'] == "affil")
            {
                print '<li><a class="activePage">Affiliation</a></li>';
            }
            else 
            {
                print '<li><a href="affil.php">Affiliaiton</a></li>';
            }
            
            if ($path_parts['filename'] == "common")
            {
                print '<li><a class="activePage">Info</a></li>';
            }
            else 
            {
                print '<li><a href="common.php">Info</a></li>';
            }
            
            if ($path_parts['filename'] == "form")
            {
                print '<li><a class="activePage">Rate Me</a></li>';
            }
            else 
            {
                print '<li><a href="form.php">Rate Me</a></li>';
            }
            
            if ($path_parts['filename'] == "contact")
            {
                print '<li><a class="activePage">Contact</a></li>';
            }
            else 
            {
                print '<li><a href="contact.php">Contact</a></li>';
            }
        ?>
    </ol>
</nav>
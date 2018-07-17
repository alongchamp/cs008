<!-- ### Navigation ### -->
<nav>
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
            
            if ($path_parts['filename'] == "form")
            {
                print '<li><a class="activePage">Questionaire</a></li>';
            }
            else 
            {
                print '<li><a href="form.php">Questionaire</a></li>';
            }
        ?>
    </ol>
</nav>
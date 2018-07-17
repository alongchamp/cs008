<?php 
include "top.php";

// #############################################################################
//
// SECTION 1 Initate Variables
// 
// SECTION 1a  
// Variables for the Classroom Purposes to Help Find Errors

    $debug = false;

    if (isset($_GET["debug"])) { // ONLY Classroom Environment Usage
        $debug = true;
    }

    if ($debug) {
        print "<p>DEBUG MODE: ON</p>";
    }
    // #############################################################################
    // 
    // SECTION: 1b Security
    // 
    // 



    // #############################################################################    
    //
    // SECTION: 1c Form Variables   
    //
    // Initalize Variables, one for Each Form Element
    //      in the Order They Appear on the Form

    $email = "alongcha@uvm.edu";
 
 
    // #############################################################################
    //
    // SECTION: 1d Form Error Flags
    //
    //
    //
 
 
 
    // #############################################################################
    // SECTION: 1e Misc Variables
    // 
    //
 
 
 
 
 
 
 
// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
// 
// SECTION: 2 Process for When the Form is Submitted
 //
 
 
    // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 
    // 
    // SECTION: 2a Security
    //
    
    
    
    
    
    
    // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    //
    // SECTION: 2b Sanatize (clean) Data
    //
    //
    
 
 
 
 
 
 
 
 
    // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    //
    // SECTION: 2c Validation
    //
    //
    //
    //
    //
    //
    //
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    // 
    // SECTION: 2d Process Form - Passed Validation
    //
    //
    //
    
    
    
    
    // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    // 
    // SECTION: 2e Save Data
    //
    //
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    //
    // SECTION: 2f Create Message
    //
    //
    //
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    //
    // SECTION: 2g Mail to User
    //
    //
    //
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
// #############################################################################
//
// SECTION 3 Display Form
//
?>

<article id="main">
        
    <?php
    // #############################################################################
    // 
    // SECTION 3a
    // 
    //
    //
    //
    //
    //
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    // #############################################################################
    // 
    // SECTION 3b Error Messages
    //
    //
    
    
    
    
    
    
    
    
    
    
    
    
    // #############################################################################
    //
    // SECTION 3c html Form
    //
    /* Display the HTML form. Note that the action is to this same page. 
       $phpSelf is defined in top.php
      
      
      
      
      
      
      
      
      
      
      
      
      
    */
    ?>
    
    <form action="<?php print $phpSelf; ?>"
          method="post"
          id="frmRegister">
        
        <fieldset class="wrapper">
            <legend>Register Now!</legend>
            <p>Please Join our Mailing List and Help us Gather Some Information About the General Public Through a Quick Survey.</p>
            
            <fieldset class="wrapperTwo">
                <legend>Please Fill in the Following Form</legend>
                
                <fieldset class="contact">
                    <legend>Contact Information</legend>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <label for="txtEmail" class="required">Email
                        <input type="text" id="txtEmail" name="txtEmail"
                               value="<?php print $email; ?>"
                               tabindex="120" maxlength="45" placeholder="Pleaase Enter Your Valid Email Address"
                               
                               onfocus="this.select()"
                               autofocus>
                    </label>
                </fieldset> <!-- Ends Contact -->
                
            </fieldset> <!-- Ends Wrapper Two -->
            
            <fieldset class="buttons">
                <legend></legend>
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Register" tabindex="900" class="button">
            </fieldset> <!-- Ends Buttons -->
            
        </fieldset> <!-- Ends Wrapper -->
    </form>
    
    <?php
    
    ?>
    
</article>

<?php include "footer.php"; ?>

</body>
</html>
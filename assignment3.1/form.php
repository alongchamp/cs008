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
    $yourURL = $domain . $phpSelf;


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
    // Initialize Error Flags one for each form element we validate
    // in the order they appear in section 1c
 
    $emailERROR = false;
 
    // #############################################################################
    // SECTION: 1e Misc Variables
    // 
    // create an array to hold error messages filled (if any) in 2d displayed in 3c
 
 
    $errorMsg = array();
 
 
 
 
// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
// 
// SECTION: 2 Process for When the Form is Submitted
 //
 if (isset($_POST["btnSubmit"])) {
      
    // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 
    // 
    // SECTION: 2a Security
    //
    if (!securityCheck(true)) {
        $msg = "<p>You Failed! ";
        $msg.="Security breach detected and reported</p>";
        die($msg);
    }
    
    // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    //
    // SECTION: 2b Sanatize (clean) Data
    // Remove any potential JavaScript or html code from users input on the form.
    // Note it is best to follow the same order as declared in section 1c
    
 
 
    
    
    $email = filter_var($_POST["txtEmail"], FILTER_SANITIZE_EMAIL);
 
 
 
    // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    //
    // SECTION: 2c Validation
    //
    //Validation section: check each valie for possible errors, empty, or not what is expected.
    //If block needed for each element checked in order they appear. 
    // errorMsg will display on form
    // Error flag ($emailERROR) used in section 3c
    //
    //
    
    
    
    
    
    
    
    
 
    if ($email == ""){
        $errorMsg[] = "Enter email address";
        $emailERROR = true;
    } elseif (!verifyEmail($email)) {
        $errorMsg[] = "Email Incorrect";
        $emailERROR = true;
    }
    
    
    // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    // 
    // SECTION: 2d Process Form - Passed Validation
    //
    // Process for when the form passes validation (the errorMsg array is empty)
    //
    if (!$errorMsg){
        if ($debug)
            print "<p>Form is valid</p>";    
    
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
    
    
    
    
    
    
    
    
    
    
    
    } // end "form is valid"
} // end if submitted 
    
    
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
    // If first time, or errors going to disp
    //
    if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) {
        print "<h1>Your request has ";
    
    
    
    
    
        print "been processed</h1>";
    
    
    
    
    
    
    
    
    
    
    } else { 
    
    
        // #############################################################################
        // 
        // SECTION 3b Error Messages
        //
        //
    
        if ($errorMsg){
            print '<div id="errors">';
            print "<ol>";
            foreach ($errorMsg as $err){
                print "<li>" . $err . "</li>";
            }
            print "</ol>";
            print '</div>';
        }
        
        
    // #############################################################################
    //
    // SECTION 3c html Form
    //
    /* Display the HTML form. Note that the action is to this same page. 
       $phpSelf is defined in top.php
       NOTE the line:
      
      value = "<?php print $email; ?>"
      
      this makes the form sticky
      shows either default or typed line
      
      NOTE this line: 
          
      <?php if($emailERROR) print 'class="mistake"'; ?>
      
      prints out css class to highlight background etc. to make it stand out
      
      
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
                               tabindex="120" maxlength="45" placeholder="Please Enter Your Valid Email Address"
                               <?php if($emailERROR) print 'class="mistake"'; ?>
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
    }
    ?>
    
</article>

<?php include "footer.php"; ?>

</body>
</html>
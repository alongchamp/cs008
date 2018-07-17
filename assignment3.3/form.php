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

    $email = "";
    $fname = "";
    $lname = "";
    $gender = "Male";
    $gsword = false;
    $lsword = false;
    $cblade = true;
    $sshield = false;
    $duals = false;
    $iglaive = true;
    $lbow = false;
    $hbow = false;
    $bow = true;
    $rate = "5";
    $comments = "";
 
    // #############################################################################
    //
    // SECTION: 1d Form Error Flags
    //
    // Initialize Error Flags one for each form element we validate
    // in the order they appear in section 1c
 
    $emailERROR = false;
    $fnameERROR = false;
    $lnameERROR = false;
    $genderERROR = false;
    $gswordERROR = false;
    $lswordERROR = false;
    $cbladeERROR = false;
    $sshieldERROR = false;
    $dualsERROR = false;
    $iglaiveERROR = false;
    $lbowERROR = false;
    $hbowERROR = false;
    $bowERROR = false;
    $rateERROR = false;
    $commentsERROR = false;
 
    // #############################################################################
    // SECTION: 1e Misc Variables
    // 
    // create an array to hold error messages filled (if any) in 2d displayed in 3c
 
    $errorMsg = array();
    
    // array to hold form values that will be written to CSV file
    $dataRecord = array();
 
    $mailed = false; 
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
    $dataRecord[] = $email;
    
    $fname = htmlentities($_POST["txtFname"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $fname;
 
    $lname = htmlentities($_POST["txtLname"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $lname;
    
    $gender = htmlentities($_POST["radGender"],ENT_QUOTES,"UTF-8");
    $dataRecord[] = $gender;
    
    if (isset($_POST["chkGsword"])){
        $gsword = true;
    } else {
        $gsword = false;
    }
    $dataRecord[] = $gsword;
    
    if (isset($_POST["chkLsword"])){
        $lsword = true;
    } else {
        $lsword = false;
    }
    $dataRecord[] = $lsword;
    
    if (isset($_POST["chkCblade"])){
        $cblade = true;
    } else {
        $cblade = false;
    }
    $dataRecord[] = $cblade;
    
    if (isset($_POST["chkSshield"])){
        $sshield = true;
    } else {
        $sshield = false;
    }
    $dataRecord[] = $sshield;
    
    if (isset($_POST["chkDuals"])){
        $duals = true;
    } else {
        $duals = false;
    }
    $dataRecord[] = $duals;
    
    if (isset($_POST["chkIglaive"])){
        $iglaive = true;
    } else {
        $iglaive = false;
    }
    $dataRecord[] = $iglaive;
    
    if (isset($_POST["chkLbow"])){
        $lbow = true;
    } else {
        $lbow = false;
    }
    $dataRecord[] = $lbow;
    
    if (isset($_POST["chkHbow"])){
        $hbow = true;
    } else {
        $hbow = false;
    }
    $dataRecord[] = $hbow;
    
    $rate = htmlentities($_POST["lstRate"],ENT_QUOTES,"UTF-8");
    $dataRecord[] = $rate;
    
    $comments = htmlentities($_POST["txtComments"],ENT_QUOTES,"UTF-8");
    $dataRecord[] = $comments;
    
    // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    //
    // SECTION: 2c Validation
    //
    // Validation section: check each valie for possible errors, empty, or not what is expected.
    // If block needed for each element checked in order they appear. 
    // errorMsg will display on form
    // Error flag ($emailERROR) used in section 3c
    //
    //
    
    if ($email == ""){
        $errorMsg[] = "Enter Email Address";
        $emailERROR = true;
    } elseif (!verifyEmail($email)) {
        $errorMsg[] = "Email Incorrect";
        $emailERROR = true;
    }
    
    if ($fname == ""){
        $errorMsg[] = "Enter First Name";
        $fnameERROR = true;
    } elseif (!verifyAlphaNum($fname)) { 
        $errorMsg[] = "Characters Not Right";
        $fnameERROR = true;
    }
    
    if ($lname == ""){
        $errorMsg[] = "Enter Last Name";
        $lnameERROR = true;
    } elseif (!verifyAlphaNum($lname)) {
        $errorMsg[] = "Characters Not Right";
        $lnameERROR = true;
    }
    
    if ($comments == ""){
        $errorMsg[] = "Enter Comment";
        $commentERROR = true;
    } elseif (!verifyAlphaNum($comments)) {
        $errorMsg[] = "Characters Not Right";
        $commentERROR = true;
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
    // Saves data to CSV
    
    $fileExt = ".csv";
    
    $myFileName = "data/registration";
    
    $filename = $myFileName . $fileExt;
    
    if ($debug) {
        print "/n/n<p>Filename: " .$filename;
    }
    // Now open the file for appending
    $file = fopen($filename, 'a');
    
    // Write info from form to csv
    fputcsv($file, $dataRecord);
    
    // Close
    fclose($file);
    
    // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    //
    // SECTION: 2f Create Message
    //
    // Build message to display in section 3a to mail to user
    //
    
    $message = ' '
            . 'Your Information: ';
    
    foreach ($_POST as $key => $value) {
        
        $message .= "";
    
        $camelCase = preg_split('/(?=[A-Z])/', substr($key, 3));
        if ($key != "btnSubmit"){
            foreach ($camelCase as $one) {
                $message .= $one . " ";
            }
            $message .= " = " . htmlentities($value, ENT_QUOTES, "UTF-8") . "";
        }
    }    
    
    // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    //
    // SECTION: 2g Mail to User
    //
    // Process to mail to user
    // Message was built in 2f
    $to = $email; // from form 
    $cc = "";
    $bcc = "";
    $from = "alongcha@uvm.edu";
    
    // subject of mail
    $todayDate = strftime("%x");
    $subject ="Hunter Info: " . $todayDate;
    
    $mailed = sendMail($to, $cc, $bcc, $from, $subject, $message);
    
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
    
        if (!$mailed) {
            print"not";
        }
    
        print "been processed</h1>";
    
        print "<p>A copy of this message has ";
        if (!$mailed) {
            print "not";
        }
        print "been sent</p>";
        print "<p>To: " . $email . "</p>";
        print"<p>Mail Message:</p>";
    
        print $message;
    } else { 
    
    
        // #############################################################################
        // 
        // SECTION 3b Error Messages
        //
        // display an error message when printing out form
    
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
                
                <fieldset class="info">
                    <legend>Personal Info</legend>
                    
                    <label for="txtFname" class="required">First Name
                        <input type="text" id="txtFname" name="txtFname"
                               value="<?php print $fname; ?>"
                               tabindex="120" maxlength="45" placeholder="Enter First Name"
                               <?php if($fnameERROR) print 'class="mistake"'; ?>
                               onfocus="this.select()">
                    </label>
                    
                    <label for="txtLname" class="required">Last Name
                        <input type="text" id="txtLname" name="txtLname"
                               value="<?php print $lname; ?>"
                               tabindex="120" maxlength="45" placeholder="Enter Last Name"
                               <?php if($lnameERROR) print 'class="mistake"'; ?>
                               onfocus="this.select()">
                    </label>
                    
                    <fieldset class="radio">
                        <legend>Gender</legend>
                        
                        <label><input type="radio" 
                            id="radGenderMale" 
                            name="radGender" 
                            value="Male"
                            <?php if ($gender == "Male") print "checked" ?>
                            tabindex="330">Male</label>
                        <label><input type="radio" 
                        id="radGenderFemale" 
                        name="radGender" 
                        value="Female"
                        <?php if ($gender == "Female") print "checked" ?>
                        tabindex="340">Female</label>
                    </fieldset>
                </fieldset>
                
                <fieldset class="chkBox">
                    <legend>Weapon Types(Choose Your Favorites</legend>
                    <fieldset class="heavy">
                        <legend>Heavy Damage</legend>
                        <label><input type="checkbox" 
                            id="chkGsword" 
                            name="chkGsword" 
                            value="Gsword"
                            <?php if ($gsword) print " checked "; ?>
                            tabindex="420">Great Sword</label>
                        
                        <label><input type="checkbox" 
                            id="chkLsword" 
                            name="chkLsword" 
                            value="Lsword"
                            <?php if ($lsword) print " checked "; ?>
                            tabindex="420">Long Sword</label>
                        
                        <label><input type="checkbox" 
                            id="chkCblade" 
                            name="chkCblade" 
                            value="Cblade"
                            <?php if ($cblade) print " checked "; ?>
                            tabindex="420">Charged Blade</label>
                    </fieldset>
                    
                    <fieldset class="fast">
                        <legend>Fast Weapons</legend>
                        <label><input type="checkbox" 
                            id="chkSshield" 
                            name="chkSshield" 
                            value="Sshield"
                            <?php if ($sshield) print " checked "; ?>
                            tabindex="420">Sword & Shield</label>
                        
                        <label><input type="checkbox" 
                            id="chkDuals" 
                            name="chkDuals" 
                            value="Duals"
                            <?php if ($duals) print " checked "; ?>
                            tabindex="420">Dual Swords</label>
                        
                        <label><input type="checkbox" 
                            id="chkIglaive" 
                            name="chkIglaive" 
                            value="Iglaive"
                            <?php if ($iglaive) print " checked "; ?>
                            tabindex="420">Insect Glaive</label>
                    </fieldset>
                    
                    <fieldset class="range">
                        <legend>Ranged Weapons</legend>
                        <label><input type="checkbox" 
                            id="chkLbow" 
                            name="chkLbow" 
                            value="Lbow"
                            <?php if ($lbow) print " checked "; ?>
                            tabindex="420">Light Bowgun</label>
                        
                        <label><input type="checkbox" 
                            id="chkHbow" 
                            name="chkHbow" 
                            value="Hbow"
                            <?php if ($hbow) print " checked "; ?>
                            tabindex="420">Heavy Bowgun</label>
                        
                        <label><input type="checkbox" 
                            id="chkBow" 
                            name="chkBow" 
                            value="Bow"
                            <?php if ($bow) print " checked "; ?>
                            tabindex="420">Bow</label>
                    </fieldset>
                    
                    <fieldset  class="listbox">	
                        <label for="lstRate">Game Rating</label>
                        <select id="lstRate" 
                                name="lstRate" 
                                tabindex="520" >
                            <option <?php if($rate=="1") print " selected "; ?>
                                value="1">1-I'm Lying</option>
        
                            <option <?php if($rate=="2") print " selected "; ?>
                                value="2">2-Sure That's My Answer</option>
        
                            <option <?php if($rate=="3") print " selected "; ?>
                                value="3">3-Getting Better</option>
                            
                            <option <?php if($rate=="4") print " selected "; ?>
                                value="4">4-Not Everyone's Perfection</option>
                            
                            <option <?php if($rate=="5") print " selected "; ?>
                                value="5">5-*cough*Right Choice*cough*</option>
                    </select>
                    </fieldset>
                </fieldset>
                
                <fieldset class="comment">					
                    <label for="txtComments" class="required">Comments</label>
                    <textarea id="txtComments" 
                    name="txtComments" 
                    tabindex="200"
                    <?php if ($commentsERROR) print 'class="mistake"'; ?>
                    onfocus="this.select()" 
                    style="width: 25em; height: 4em;" ><?php print $comments; ?></textarea>
                </fieldset>
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
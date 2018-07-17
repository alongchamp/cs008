<?php
include "top.php";

// Section 1
// Initiate Variables

// 1a
// Debug

    $debug = false;
    
    if (isset($_GET["debug"])) {
            $debug = true;
    }
    
    if ($debug) {
        print "<p>DEBUG MODE: ON</p>";
    }
    
// 1b
// Security
    
    $yourURL = $domain . $phpSelf;
    
// 1c
// Form Variables
    
    // text box
    $email = "";
    $fname = "";
    $lname = "";
    
    
    // radio
    $gender = "Male";
    
    // radio
    $test = "No";
    
    // check
    $xray = false;
    $ekg = false;
    $na = false;
    
    // check
    $bsurg = false;
    $cssurg = false;
    $gbsurg = false;
    $hsurg = false;
    
    // check
    $person = false;
    $mail = false;
    $inter = false;
    $other = true;
    
    // radio
    $insur = "Medicare";
    
    // list
    $rate = "5";
    
    // text area
    $comments = "";
    
// 1d
// Error Flags
    
    $emailERROR = false;
    $fnameERROR = false;
    $lnameERROR = false;
    $genderERROR = false;
    $testERROR = false;
    $xrayERROR = false;
    $ekgERROR = false;
    $naERROR = false;
    $bsurgERROR = false;
    $cssurgERROR = false;
    $gbsurgERROR = false;
    $hsurgERROR = false;
    $personERROR = false;
    $mailERROR = false;
    $interERROR = false;
    $otherERROR = false;
    $insurERROR = false;
    $rateERROR = false;
    $commentsERROR = false;
      
// 1e
// Misc Variables
// Create Array for Error Message
    
    $errorMsg = array();

    
// Array for CSV Writing
    $dataRecord = array();
            
    $mailed = false;

// Section 2
// Form Submission
    if (isset($_POST["btnSubmit"])) {

    // 2a
    // Security
    
        if (!securityCheck(false)) {
            $msg = "<p>Security Breach Detected. ";
            $msg.= "Breach Detected and Reported</p>";
            die($msg);
        }
        
    // 2b
    // Sanatize
        
        $email = filter_var($_POST["txtEmail"], FILTER_SANITIZE_EMAIL);
        $dataRecord[] = $email;
    
        $fname = htmlentities($_POST["txtFname"], ENT_QUOTES, "UTF-8");
        $dataRecord[] = $fname;
 
        $lname = htmlentities($_POST["txtLname"], ENT_QUOTES, "UTF-8");
        $dataRecord[] = $lname;
    
        $gender = htmlentities($_POST["radGender"],ENT_QUOTES,"UTF-8");
        $dataRecord[] = $gender;
        
        $test = htmlentities($_POST["radTest"],ENT_QUOTES,"UTF-8");
        $dataRecord[] = $test;

        if (isset($_POST["chkXray"])){
            $xray = true;
        } else {
            $xray = false;
        }
        $dataRecord[] = $xray;
        
        if (isset($_POST["chkEkg"])){
            $ekg = true;
        } else {
            $ekg = false;
        }
        $dataRecord[] = $ekg;
        
        if (isset($_POST["chkNa"])){
            $na= true;
        } else {
            $na = false;
        }
        $dataRecord[] = $na;
        
        if (isset($_POST["chkBsurg"])){
            $bsurg = true;
        } else {
            $bsurg = false;
        }
        $dataRecord[] = $bsurg;
        
        if (isset($_POST["chkCssurg"])){
            $cssurg = true;
        } else {
            $cssurg = false;
        }
        $dataRecord[] = $cssurg;
        
        if (isset($_POST["chkGbsurg"])){
            $gbsurg = true;
        } else {
            $gbsurg = false;
        }
        $dataRecord[] = $gbsurg;
        
        if (isset($_POST["chkHsurg"])){
            $hsurg = true;
        } else {
            $hsurg = false;
        }
        $dataRecord[] = $hsurg;
        
        if (isset($_POST["chkPerson"])){
            $person = true;
        } else {
            $person = false;
        }
        $dataRecord[] = $person;
        
        if (isset($_POST["chkMail"])){
            $mail = true;
        } else {
            $mail= false;
        }
        $dataRecord[] = $mail;
        
        if (isset($_POST["chkInter"])){
        $inter = true;
        } else {
            $inter = false;
        }
        $dataRecord[] = $inter;
        
        if (isset($_POST["chkOther"])){
            $other = true;
        } else {
            $other = false;
        }
        $dataRecord[] = $other;
        
        $insur = htmlentities($_POST["radInsur"],ENT_QUOTES,"UTF-8");
        $dataRecord[] = $insur;
        
        $rate = htmlentities($_POST["lstRate"],ENT_QUOTES,"UTF-8");
        $dataRecord[] = $rate;
    
        $comments = htmlentities($_POST["txtComments"],ENT_QUOTES,"UTF-8");
        $dataRecord[] = $comments;
        
    // 2c 
    // Validaiton
        
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
        
    // 2d
    // Process Form

        if (errorMsg){
            if ($debug)
                print "<p>Form is valid.</p>";
        
        
        // 2e 
        // Save Data

            $fileExt = ".csv";
        
            $myFileName = "data/rms";
        
            $filename = $myFileName . $fileExt;

            if ($debug) {
                print "/n/n<p>Filename: " .$filename;
            }
            // Open
            $file = fopen($filename, 'a');
    
            // Write 
            fputcsv($file, $dataRecord);
    
            // Close
            fclose($file);
         
        // 2f
        // Create Message
            
            $message = ''
                    . 'Submitted Information: ';
            
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
            
            echo "hi";
            
        // 2g
        // Send Mail
            
            $to = $email; // from form 
            $cc = "";
            $bcc = "";
            $from = "alongcha@uvm.edu";
    
            // subject of mail
            $todayDate = strftime("%x");
            $subject ="Provided Info: " . $todayDate;
    
            $mailed = sendMail($to, $cc, $bcc, $from, $subject, $message);
        
    }
}

// Section 3
// Form to Display



print '<article id="main"  class="content-area">';
    
     
    
    // 3a
    // If 1st time or no errors
    
        if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) {
            print "<h1>Your request has ";
            
            if (!$mailed) {
                print"not ";
            }
    
            print "been processed</h1>";
    
            print "<p>A copy of this message has ";
            if (!$mailed) {
                print "not ";
            }
            print "been sent</p>";
            print "<p>To: " . $email . "</p>";
            print"<p>Mail Message:</p>";
    
            print $message;
        } 
        else {
        
    // 3b
    // If errors
            
            if ($errorMsg){
                print '<div id="errors">';
                print "<ol>";
                foreach ($errorMsg as $err){
                    print "<li>" . $err . "</li>";
                }
                print "</ol>";
                print '</div>';
            }
            
            
        // 3c
        // HTML Form
            
            ?>
    
            <form action="<?php print $phpSelf; ?>"
                  method="post"
                  id="frmRsurg">
                
                <fieldset class="wrapper">
                  
                    <legend>Rate My Surgeon</legend>
                    <p>Please take a few moments to recall your feelings about 
                        the surgery and fill out this questionaire. It is only 
                        a few questions long and will help with further patient 
                        to surgeon interactions.</p>
                    
                    <fieldset class="personal">
                        <legend>Personal Information</legend>
                        
                        <label for="txtEmail" class="required">Email
                            <input type="text" id="txtEmail" name="txtEmail"
                                   value=""
                                   tabindex="120" maxlength="45" 
                                   placeholder="Please Enter Email"
                                   <?php if($emailERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()"
                                   autofocus="">
                        </label>
                        
                        <br>
                        
                        <label for="txtFname" class="required">First Name
                            <input type="text" id="txtFname" name="txtFname"
                                value="<?php print $fname; ?>"
                                tabindex="120" maxlength="45" placeholder="Enter First Name"
                                <?php if($fnameERROR) print 'class="mistake"'; ?>
                                onfocus="this.select()">
                        </label>
                    
                        <br>

                        
                        <label for="txtLname" class="required">Last Name
                            <input type="text" id="txtLname" name="txtLname"
                                value="<?php print $lname; ?>"
                                tabindex="120" maxlength="45" placeholder="Enter Last Name"
                                <?php if($lnameERROR) print 'class="mistake"'; ?>
                                onfocus="this.select()">
                        </label>
                                                
                        <br><br>
                       
                        
                        <fieldset class="radio1">
                            <legend>Gender</legend>
                        
                            <label><input type="radio" 
                                id="radGenderMale" 
                                name="radGender" 
                                value="Male"
                                <?php if ($gender == "Male") print "checked" ?>
                                tabindex="330">Male
                            </label>
                            
                            <label><input type="radio" 
                            id="radGenderFemale" 
                            name="radGender" 
                            value="Female"
                            <?php if ($gender == "Female") print "checked" ?>
                            tabindex="340">Female
                            </label>
                        </fieldset>
                                                
                        <br>

                                                
                    </fieldset>
                    
                    <fieldset class="surgery">
                        <legend>Surgery Information</legend>
                        
                        <fieldset class="radio2">
                            <legend>Were Either Of The Two Following Test Needed Prior To Surgery?</legend>
                            
                            <label><input type="radio"
                                id="radTestYes"
                                name="radTest"
                                value="Yes"
                                <?php if ($test == "Yes") print "checked" ?>
                                tabindex="330">Yes
                            </label>
                            
                            <label><input type="radio"
                                id="radTestNo"
                                name="radTest"
                                value="No"
                                <?php if ($test == "No") print "checked" ?>
                                tabindex="330">No
                            </label>
                        </fieldset>
                        
                        <br>
                        
                        <fieldset class="chkBox1">
                            <legend>If the answer above was yes please specify.</legend>
                            
                            <label>
                                <input type="checkbox" 
                                id="chkXray" 
                                name="chkXray" 
                                value="xray"
                                <?php if ($xray) print " checked "; ?>
                                tabindex="420">X-Ray
                            </label>
                            
                            <label>
                                <input type="checkbox" 
                                    id="chkEkg" 
                                    name="chkEkg" 
                                    value="ekg"
                                    <?php if ($ekg) print " checked "; ?>
                                    tabindex="420">EKG
                            </label>
                            
                            <label>
                                <input type="checkbox" 
                                    id="chkNa" 
                                    name="chkNa" 
                                    value="na"
                                    <?php if ($na) print " checked "; ?>
                                    tabindex="420">Not Available 
                            </label>
                        </fieldset>
                        
                        <br>
                        
                        <fieldset class="chkBox2">
                            <legend> Which surgery was preformed at this appointment?</legend>
                            
                            <label>
                                <input type="checkbox" 
                                    id="chkBsurg" 
                                    name="chkBsurg" 
                                    value="bsurg"
                                    <?php if ($bsurg) print " checked "; ?>
                                    tabindex="420">Breast Surgery
                            </label>
                            
                            <label>
                                <input type="checkbox" 
                                id="chkCsurg" 
                                name="chkCsurg" 
                                value="csurg"
                                <?php if ($csurg) print " checked "; ?>
                                tabindex="420">Colon Surgery
                            </label>
                            
                            <label>
                                <input type="checkbox" 
                                id="chkGbsurg" 
                                name="chkGbsurg" 
                                value="gbsurg"
                                <?php if ($gbsurg) print " checked "; ?>
                                tabindex="420">Gall Bladder Surgery
                            </label>
                            
                            <label>
                                <input type="checkbox" 
                                id="chkHsurg" 
                                name="chkHsurg" 
                                value="hsurg"
                                <?php if ($hsurg) print " checked "; ?>
                                tabindex="420">Hernia Surgery
                            </label>
                            
                        </fieldset>
                        
                        <br>
                        
                        <fieldset class="chkBox3">
                            <legend>How did you hear about Dr. Supple?</legend>
                                 
                            <label>        
                                <input type="checkbox" 
                                id="chkPerson" 
                                name="chkPerson" 
                                value="Person"
                                <?php if ($person) print " checked "; ?>
                                tabindex="420">Another Person
                            </label>
                            
                            <label>
                                <input type="checkbox" 
                                id="chkMail" 
                                name="chkMail" 
                                value="mail"
                                <?php if ($mail) print " checked "; ?>
                                tabindex="420">Mailed Letter
                            </label>
                                    
                            <label>
                                <input type="checkbox" 
                                id="chkInter" 
                                name="chkInter" 
                                value="inter"
                                <?php if ($inter) print " checked "; ?>
                                tabindex="420">Internet
                            </label>
                                    
                            <label>
                                <input type="checkbox" 
                                id="chkOther" 
                                name="chkOther" 
                                value="other"
                                <?php if ($other) print " checked "; ?>
                                tabindex="420">Other Media Source
                            </label>
                            
                        </fieldset>
                        
                        <br>
                        
                        <fieldset class="radio3">
                            <legend>Insurance coverage</legend>
                            
                            <label><input type="radio"
                                id="radInsurBc"
                                name="radInsur"
                                value="bc"
                                <?php if ($insur == "bc") print "checked" ?>
                                tabindex="330">Blue Cross
                            </label>
                        
                            <label><input type="radio"
                                id="radInsurBs"
                                name="radInsur"
                                value="bs"
                                <?php if ($insur == "bs") print "checked" ?>
                                tabindex="330">Blue Shield
                            </label>
                            
                            <label><input type="radio"
                                id="radInsurCig"
                                name="radInsur"
                                value="cig"
                                <?php if ($insur == "cig") print "checked" ?>
                                tabindex="330">Cigna
                            </label>
                            
                            <label><input type="radio"
                                id="radInsurMed"
                                name="radInsur"
                                value="med"
                                <?php if ($insur == "med") print "checked" ?>
                                tabindex="330">Medicare
                            </label>
                            
                            <label><input type="radio"
                                id="radInsurP"
                                name="radInsur"
                                value="ponb"
                                <?php if ($insur == "ponb") print "checked" ?>
                                tabindex="330">Plans With Out of Network Benefits
                            </label>
                        </fieldset>
                        
                        <br>
                        
                        <fieldset  class="listbox">	
                            <label for="lstRate">Rating Out of 5</label>
                            <select id="lstRate" 
                                    name="lstRate" 
                                    tabindex="520" >
                                <option <?php if($rate=="1") print " selected "; ?>
                                    value="1">1</option>
        
                                <option <?php if($rate=="2") print " selected "; ?>
                                    value="2">2</option>
        
                                <option <?php if($rate=="3") print " selected "; ?>
                                    value="3">3</option>
                            
                                <option <?php if($rate=="4") print " selected "; ?>
                                    value="4">4</option>
                            
                                <option <?php if($rate=="5") print " selected "; ?>
                                    value="5">5</option>
                            </select>
                        </fieldset>
                        
                        <br>
                        
                        <fieldset class="comment">					
                            <label for="txtComments" class="required">Comments</label>
                            <textarea id="txtComments" 
                            name="txtComments" 
                            tabindex="200"
                            <?php if ($commentsERROR) print 'class="mistake"'; ?>
                            onfocus="this.select()" 
                            style="width: 25em; height: 4em;" ><?php print $comments; ?></textarea>
                        </fieldset>
 
                        <br>
                        
                        <fieldset class="buttons">
                        <legend></legend>
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" tabindex="900" class="button">
                        </fieldset>
                    </fieldset>
                </fieldset>
                
                <br>
                <br>
           
        </form>
        <?php
        }
        ?>
    

</article>

<?php include "footer.php"; ?>

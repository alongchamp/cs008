<?php
// #############################################################################
//
// This function mails text to user
// it requires users sending info
// CONSTRAINTS:
//    $to - !$empty
//    $to - email format
//    $cc - email format if !$empty
//    $bcc - "                  "
//    $from - !$empty
//    $subject - !$empty
//    $message - !$empty
//    $message - char > min
//    $message - len > min
//
//    $from - clean of invalid html
//
//    $message - clean of invalid html
//
//
// function returns boolean
function sendMail($to, $cc, $bcc, $from, $subject, $message) {
    $MIN_MESSAGE_LENGTH = 40;
    
    $blnMail = false;
    
    $to = filter_var($to, FILTER_SANITIZE_EMAIL);
    $cc = filter_var($cc, FILTER_SANITIZE_EMAIL);
    $bcc = filter_var($bcc, FILTER_SANITIZE_EMAIL);
    
    $subject = htmlentities($subject, ENT_QUOTES, "UTF_8");
    
    // check values passed are good
    if (empty($to)) return false;
    if (!filter_var($to, FILTER_VALIDATE_EMAIL)) return false;
    
    if ($cc!="") if(!filter_var($cc, FILTER_VALIDATE_EMAIL)) return false;
    
    if($bcc!="") if(!filter_var($bcc, FILTER_VALIDATE_EMAIL)) return false;
    
    if(empty($from)) return false;
    
    if(empty($subject)) return false;
    
    if(empty($message)) return false;
    if (strlen($message)<$MIN_MESSAGE_LENGTH) return false;
    
    // Message
    $messageTop = '' . $subject . '';
    $mailMessage = $messageTop . $message;
    
    $headers = "MIME-Version: 1.0/r";
    $headers .= "Content-type: text/html; charset=utf-8/r/n";
    
    $headers .= "From: " . $from . "/r";
    
    if ($cc != "") $headers .= "CC: " . $cc . "/r";
    if ($bcc != "") $headers .= "Bcc " . $bcc . "/r";
    
    // sends mail
    $blnMail = mail($to, $subject, $mailMessage, $headers);
    
    return $blnMail;
}
?>
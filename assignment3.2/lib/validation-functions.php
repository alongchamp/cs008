<?php
// #############################################################################
// series of functions to help validate form
// functions are boolean

function verifyAlphaNum ($testString) {
    // Check for letters, nums, dash, period, space, single quotes only
    return (preg_match("/^([[:alnum:]]|-|\.| |')+$/", $testString));
}

function verifyEmail ($testString) {
    // Check for valid email http://www.php.net/manual/en/filter.examples.validation.php
    return filter_var($testString, FILTER_VALIDATE_EMAIL);
}

function verifyNumeric ($testString) {
    // Check for numbers and periods
    return (is_numeric($testString));
}

function verifyPhone ($testString) {
    // Check for phone number http://www.php.net/manual/en/function.preg-match.php
    $regex = '/^(?:1(?:[. -])?)?(?:\((?=\d{3}\)))?([2-9]\d{2})(?:(?<=\(\d{3})\))? ?(?:(?<=\d{3})[.-])?([2-9]\d{2})[. -]?(\d{4})(?: (?i:ext)\.? ?(\d{1,5}))?$/';
    
    return (preg_match($regex, $testString));
}

?>
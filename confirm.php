<?php
/*
    Bella Hovis  
    CSCI 297 Scripting Languages   
    Assignment: Mailing List
    Description: When the user visits the Confirm page, if the confirmation value matches the record for that email then change the false to true. 
                 At the same time dispatch an email to their email address thanking them for confirming and indicating they are now subscribed 
                 and will begin to receive emails from you.
*/

require_once('fileop.php'); 

//get secret string
$randomvalue = $_GET['seceret'];  

$indexEntry = false; 
$entries = array(); 
$entries = readLines('subscribers.txt'); 

$i=0; 
foreach($entries as $entry){
    
    $entryValue = explode(",", $entry);
   
    if(array_search($randomvalue, $entryValue) !== false)
    {
        $valuelocation = $i; 
        $indexEntry = true; 
        break;  
    }
    $i += 1; 
}


//check to see if the confirmation value matches the record for that email
if($indexEntry !== false){
    
    //matches change false to true
    $line = $entries[$valuelocation]; 
    $line = explode(",", $line); 
    $newEntry = $line[0] . "," . $line[1] .",true";
    
    deleteLine('subscribers.txt',$valuelocation ); 
    appendLine('subscribers.txt', $newEntry);

    //send confirmation email 
    $subject = "Account Confirmed  "; 
    $message = "Thank you for confirming you account. You are now sunscribed and will begin to recieve emails from us."; 
    mail("hovisi2@winthrop.edu", $subject, $message,"From: no-reply@winthrop.edu\r\n");
    echo "Account confirmed"; 
}
else{
    echo "Account could not be confirmed"; 
}

?> 


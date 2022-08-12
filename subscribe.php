<?php
/*
    Bella Hovis  
    CSCI 297 Scripting Languages   
    Assignment: Mailing List
    Description: The Subscribe page will have a simple form that allows the user to input their email and hit subscribe.  
                    This will generate an entry into a text file that will contain 3 pieces of information: their email address, 
                    a random value that will be emailed to them, and a false indicating that their email is not yet confirmed. 
                    At the same time an email will be dispatch to them where the email will be  explaining that you are asking them to confirm 
                    their account and provide them with a return link to confirm it.
*/

require_once('fileop.php'); 
$entry = array(); 

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    
    //create form 
    //takes input of email address when done hit subscribe
    ?> 

    <form method="POST" action="subscribe.php">
        <label>Email: <input type="text" name="email"></input></label>
        <button type="subscribe">Subscribe</button>
    </form>

    

<?php
    
}
else{
    if(isset($_POST['email'])){
        //entry into a text file that contains email, random value, and false b/c email not confirmed
        $entry[] = $_POST['email']; 
        $entry[] =  bin2hex(random_bytes(10)); 
        $entry[] = "false"; 

        $entry[2] = str_replace("\r\n","",$entry[2]);
        appendLine('subscribers.txt', implode(",", $entry) . "\r\n"); 

        echo "An email was sent to confirm their account."; 

        //now send email to account 
        $subject = "Confirm Account:  "; 
        $message = "Please confirm your account by clicking the following link: " . "<a href ='https://deltona.birdnest.org/~acc.hovisi2/mailing-list-subscription-hovisi/confirm.php?seceret=" . urlencode($entry[1]) . "'>Click Here</a>";
        $result = mail("hovisi2@winthrop.edu", $subject, $message, "From: no-reply@winthrop.edu\r\nContent-Type: text/html\r\n"); 
    }
}



?> 


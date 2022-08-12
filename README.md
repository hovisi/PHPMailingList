# PHPMailingList
This assignment is to create a mailing list subscription that confirms the users email address. 

The Subscribe page will have a simple form that allows the user to input their email and hit subscribe.  This will generate an entry into a text file that will contain 3 pieces of information: their email address, a random value that will be emailed to them, and a false indicating that their email is not yet confirmed. At the same time an email will be dispatch to them where the email will be  explaining that you are asking them to confirm their account and provide them with a return link to confirm it. 

When they visit the Confirm page, if the confirmation value matches the record for that email then change the false to true. At the same time ispatch an email to their email address thanking them for confirming and indicating they are now subscribed and will begin to receive emails from you.


# Instructions
To run click the following link: [Mailing List Subscription](https://deltona.birdnest.org/~acc.hovisi2/mailing-list-subscription-hovisi/subscribe.php)

Note that you may only enter @winthrop.edu email addresses to send the mail too.  My program is also hard coded so that it only sends code to myself. 

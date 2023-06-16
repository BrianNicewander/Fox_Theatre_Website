<?php

//set default values
$first_name = '';
$last_name = '';

$address = '';
$city = '';
$state = '';
$zip = '';

$phone = '';
$phone_business = '';
$email = '';
$email_retype = '';

$contact_preference = '';
$subject = '';
$message = '';

$error = '';

//process
$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'process_data':

        //filter input
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');

        $address = filter_input(INPUT_POST, 'address');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');

        $phone = filter_input(INPUT_POST, 'phone');
        $phone_business = filter_input(INPUT_POST, 'phone_business');
        $email = filter_input(INPUT_POST, 'email');
        $email_retype = filter_input(INPUT_POST, 'email_retype');

        $contact_preference = filter_input(INPUT_POST, 'contact_preference');

        $message = filter_input(INPUT_POST, 'message');

        // puts the contact info together
        $info = "First Name: $first_name  \n" .
            "Last Name: " . $last_name . "\n" .
            "Address: " . $address . "\n" .
            "City: " . $city . "\n" .
            "State: " . $state . "\n" .
            "Zip: " . $zip . "\n" .
            "Phone " . $phone . "\n" .
            "Business Phone: " . "\n" .
            "Email: \n" . $email . "\n" .
            "Preferred Contact: " . $contact_preference . "\n\n";


        // word wrap
        $message =  wordwrap($message, 50);

        // puts the info in the email message
        $message = $info . $message;

        // send the email message // change

        // sends the email (put your email address in the empty quotes)
        mail("brian_nicewander@hotmail.com", $subject, $message);

        //redirect page
        header("Location: redirect_contact_us_page.php");
}
// sends the user back to the contact us page
include 'contact_us.php';

<?php
// $fullnamelArray =[];
function isValidName( $fullname)  {
  $regex = '/^[a-zA-Z]+$/iD';
  return (preg_match(   $regex,
                $fullname)) ;
}

function isValidEmail( $email) {
  $regex = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';
  preg_match(   $regex,
                $email,
                $emailArray,
                PREG_OFFSET_CAPTURE,
                0);

  return (count($emailArray) === 0) ? false : true;
}

// $sekme = true;
$sekme = '';
$sekmeMessage = '';
$fullNamePranesimas = '';
$emailPranesimas = '';
$sendMessagePranesimas = '';

if(count($_POST) > 0) {
    if(empty($_POST['fullname'])) {
        $fullNamePranesimas = "Enter your full name";
        $sekme=false;
    }
    elseif (strlen($_POST['fullname'])<3) {
        $fullNamePranesimas = "Vardas turi būti ne mažiau kaip 3 simboliai";
        $sekme=false;
    }
    elseif (!isValidName($_POST['fullname'])) {
        $fullNamePranesimas = "Full name turi būti tik iš raidžių";
        $sekme=false;
    }
    else {$sekme = true;}

    if(empty($_POST['email'])) {
        $emailPranesimas = "Enter your email";
    }
    elseif(!isValidEmail($_POST['email'])) {
        $emailPranesimas = "Įveskite teisingą el. pašto adresą.";
        $sekme=false;
    }
    else {$sekme = true;}

    if(empty($_POST['sendmessage'])) {
        $sendMessagePranesimas = "Enter your message";
        $sekme=false;
    }
    elseif (strlen($_POST['sendmessage'])<=5||strlen($_POST['sendmessage'])>500) {
        $sendMessagePranesimas = "Message turi būti ne mažiau kaip 5 ir ne daugiau kaip 500 simbolių";
        $sekme=false;
    }
    else {$sekme = true;}

    if($sekme != false){
        $sekmeMessage = "Formos duomenys įvesti teisingai!!!";
    }
}
?>

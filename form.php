<?php

$errs = [];
$name = $email = $msg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name  = $_POST['name'];
    $email  = $_POST['email'];
    $msg  = $_POST['msg'];

    if (empty($name)) {
        $errs['nameErr'] = 'please type your name.';
    } else {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $name = trim($name);
    }

    if (empty($email)) {
        $errs['emailErr'] = 'Please type your email.';
    } else {

        if (filter_var($_POST['email'], FILTER_SANITIZE_STRING)) {
            $email = trim($email);
        } else {
            $errs['emailErr'] = 'please enter a valid email.';
        }
    }

    if (empty($msg)) {
        $errs['msgErr'] = 'Please Type Your Messages';
    } elseif (strlen($msg) < 5) {
        $errs['msgErr'] = 'The message must be more than 5 letters.';
    } else {
        $msg = trim(filter_var($_POST['msg'], FILTER_SANITIZE_STRING));
    }

    if (empty($errs)) {
        echo '<span class="success-info">Name: '.$name.' <br>email: '.$email.'<br>msg: '.$msg.'<br></span>';
    } else {
        echo "<script> alert('Check The Form Rules') </script>";
        echo '<span class="warning-info">Please Check The Form Rules</span>';
    }
}

?>
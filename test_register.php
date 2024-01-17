<?php

function register($email, $password, $first_name, $last_name, $baseurl) {

    $email = urlencode($email);
    $name = urlencode($name);
    $username = urlencode($username);

    $lastname = urlencode($lastname);
    $password = urlencode($password);

    $ch = curl_init();
    $url = "$baseurl/registration.php";

    $cookieFile = "cookies";
    if(!file_exists($cookieFile)) {
        $fh = fopen($cookieFile, "w");
        fwrite($fh, "");
        fclose($fh);
    }

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "email=$email&name=$name&username=$username&lastname=$lastname&pass=$password&confirm=$password&submit=submit");

    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile); // Cookie aware
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile); // Cookie aware

    $result = curl_exec($ch);

    /* Delete comment below to see what is returned */
    // echo $result;

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
}

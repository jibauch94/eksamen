<?php
/**
 * Created by PhpStorm.
 * User: jibba_000
 * Date: 14-12-2017
 * Time: 11:58
 */


$password = "hejKarsten";

$hashedPassword = hash('whirlpool',  $password);

//ovenfor sker en almindelig hash af passwordet med algoritmen wirhlpool
// se flere algoritmer her - http://php.net/manual/en/function.hash.php

$saltedPassword = password_hash($password ,PASSWORD_BCRYPT );


echo "Your password is = " . $password . "<br> hashed password = " . $hashedPassword  . "<br> random salted password = " . $saltedPassword;

//her sker en hash med random salt, algoritmen vi bruger her er Becrypt, som efterhånden bruges mange steder, da det er et mere sikkert valg at bruge en random genrated salt.
//BCRYPT bliver blandt andet brugt når du opretter brugere i googles firebase.
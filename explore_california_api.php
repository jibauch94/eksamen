<?php

// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
//$input = json_decode(file_get_contents('php://input'),true);

// connect to the mysql database
$link = mysqli_connect('localhost', 'root', 'root', 'eksamen');
mysqli_set_charset($link,'utf8');

// retrieve the table and key from the path
$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
$key = array_shift($request)+0;


// create SQL based on HTTP method
switch ($method) {
    case 'GET':
        $sql = "select * from `$table`"; break;

}

// excecute SQL statement
$result = mysqli_query($link,$sql);

// die if SQL statement failed
if (!$result) {
    http_response_code(404);
    die(mysqli_error());
}

// print results, insert id or affected row count
if ($method == 'GET') {
    if (!$key) echo '[';
    for ($i=0;$i<mysqli_num_rows($result);$i++) {
        echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
    }
    if (!$key) echo ']';
}

// close mysql connection
mysqli_close($link);

  /*
Alle REST Api er Api men ikke alle API er REST API....
jeg har fulgt en guide som viser hvordan man laver en REST API, dog er der fjernet noget kode, som oftest bruges i forbindelse med REST API, så jeg vil nok sige at dette bare er en API.
Skulle jeg lave en REST API, skulle der være flere metoder en bare GET.
Der skulle også findes POST, PUT, Delete som spiller med ind i en REST API.
REST API er for at gøre det nemt at slette, tilføje og få information til og fra en database, hvor du i bund og grund kun kan GET fra en API.
I ovenstående tilfælde kan vi kun GET, da koden for at kune PUT,POST, Delete er slettet, fordi det ikke var lige relevant.
REST (REpresentational State Transfer). REST API er bygget på URIs, HTTP protocol eller JSON til data format.
En REST API er bygget for at være simpel, og bygget efter 4 http requests, GET, PUT, POST, Delete.


<?php

$_ENV = parse_ini_file('keys.env');

$mysqli = mysqli_init();
$mysqli->ssl_set(NULL, NULL, "cacert-2023-05-30.pem", NULL, NULL);
$mysqli->real_connect($_ENV["HOST"], $_ENV["USERNAME"], $_ENV["PASSWORD"], $_ENV["DATABASE"]);
$mysqli->close();


?>
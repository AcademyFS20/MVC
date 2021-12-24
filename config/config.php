<?php
// Constant definition of URI BASE:

DEFINE('BASE_URI', 'http://' . $_SERVER['SERVER_NAME'].'/MVC/');
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

// Constant SEO variables:
DEFINE ('WEBSITE_TITLE', 'CHAT APPLICATION');
DEFINE ('WEBSITE_AUTHOR', 'Meriem');
DEFINE ('WEBSITE_DESCRIPTION', 'chat application handling');
DEFINE('WEBSITE_KEYWORDS', 'chat, communication, cooperative, nature');

//  Constant DB Connexion:

DEFINE('DB_HOST', 'localhost');
DEFINE('DB_USER', 'root');
DEFINE('DB_PASS', '');
DEFINE('DB_NAME', 'chatdatabase');



?>
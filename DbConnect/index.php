<?php
// define('cont','valeur')
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_Pass','');
define('DB_name','restaudb');
try {
    $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_name."", DB_USER, DB_Pass);
} catch (Exception $error) {//e de type  exception w exeception heya akber wahda tlmhom kol mta les
    echo $error->getMessage();
}





?>
<?php
// Establish database connection
$user='root';
$password = 'SoftEng476';
$db_info= 'mysql:host=162.243.212.14;dbname=cs476'; 
// database info
try {
    $db = new PDO($db_info, $user, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
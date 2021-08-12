<?php
$dbname   = '';
$username = '';
$password = '';
try {
    $pdo = new \PDO("mysql:host=mysql:3306;dbname=$dbname", $username,  $password);
} catch (Exception $e) {
    print $e->getMessage() . "\n";
}

echo phpversion();

print "\nOK\n";
?>
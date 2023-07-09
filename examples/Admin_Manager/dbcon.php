<?php 
require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
$factory = (new Factory)->withServiceAccount('thitracngiembanglayxe-firebase-adminsdk-4zk7w-9e9fa6ccf8.json')
    ->withDatabaseUri('https://thitracngiembanglayxe-default-rtdb.firebaseio.com/');
    $database = $factory->createDatabase();
    $auth = $factory->createAuth();
?>  
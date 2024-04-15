<?php
$host='localhost';
$dbname = 'accounts';
$user='root';// The default username
$password='';// Empty by default => in your computer

$dsn = "mysql:host=$host;dbname=$dbname;port=3307";


try{
    $pdo=new PDO($dsn,$user,$password);
}catch(PDOException $e){
    echo "Database Connection failed: ".$e->getMessage();
    throw new PDOException($e->getMessage());
}
?>

<?php
$dsn= 'mysql:host=localhost;dbname=articles';
$username= 'root';
$password= '';
try{
$con=new PDO($dsn,$username,$password);
echo 'u are connected';

}
catch(PDOException $e){
    echo 'Failed '.$e->getMessage();
}
?>

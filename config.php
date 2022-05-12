<?php
    $host='localhost';
    $name='id18794570_mydb';
    $mypass='byU=^D})=1YGb/IG';
    $dbms='id18794570_kdb'; 

    $con = mysqli_connect($host,$name,$mypass,$dbms);
    if (!$con) die('Could not connect: ' . mysql_error());
    mysqli_select_db($con,$dbms) or die("cannot select DB" . mysql_error());
?>
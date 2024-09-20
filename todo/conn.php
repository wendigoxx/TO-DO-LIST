<?php

$conn = new mysqli("localhost", "root","","info");

if($conn){
    //echo "database connected";
}else{
    die($conn);
}
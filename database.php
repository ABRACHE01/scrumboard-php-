<?php
    
    //CONNECT TO MYSQL DATABASE USING MYSQLI 

   $serverName="localhost";
   $userName="root";
   $password="";
   $dbName="scrumboard";
   
   //create connection 
   
global $con;
   $con=mysqli_connect($serverName,$userName, $password,$dbName);

//    if(mysqli_connect_errno()){

//     echo "failed to connect!";
//     exit();
//    }
//    echo "connection succsess";


  
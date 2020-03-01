<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Gautam Buddha University</title>
        <link rel="icon" type="image/gif/png" href="img/gbulogo.png">
        <!-- Required meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <!--Bootstrap CSS --><!--
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/bootstrap-rtl.css">
        <link rel="stylesheet" href="css/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">-->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
        <link rel="stylesheet" href="css/bootstrap-grid.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.css">
        
        <style>
            .jumbotron{
            background-color: #ffffff!important;
            }
            @media only screen and (max-width: 575px){
            .head-title{
            text-align: center !important;
            }
            .profile-image{
            width: 320px!important;
            max-height: 380px!important;
            }
            }
            @media only screen and (max-width: 767px){
            
            .gbulogoonpage{
            display: none;
            }
            
            }
            @media only screen and (max-width: 1000px){
            .header-profile div h1{
            font-size:29px!important;
            }
            .header-profile div h6, h4{
            font-size: 0.8rem!important;
            }
            .gbulogoonpage img{
            width:150px!important;
            }
            }
            #content ul li{
            color: #32668F;
            }
            #content ul li a{
            color: #E25822;
            text-decoration: none;
            }
            @media only screen and (max-width: 991px){
            .profesh{
            display: none;
            }
            .profesh-2{
            background-color: #78335d!important;
            }

            }
            #content ul li{
            margin-bottom: 15px;
            }
        </style>
        
    </head>
    <body>

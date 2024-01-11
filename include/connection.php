<?php
$host       = "stud.hosted.hr.nl";
$database   = "prj_2023_2024_ressys_t11";
$user       = "prj_2023_2024_ressys_t11";
$password   = "iakoopaf";

$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());;

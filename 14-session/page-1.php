<?php 

session_start(); // on veut utiliser les sessions sur la page

var_dump($_SESSION); //le tableau est vide la premiere fois


$countries = ['fr','it'];

$_SESSION['countries'] = $countries;

var_dump($_SESSION);
?>
<?php


session_start();

//détruire la session courante
session_destroy();

/* Redirige vers la page d'accueil */

header("Location: index.php");
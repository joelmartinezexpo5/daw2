<?php
session_start();
unset($_SESSION['visitas']);
header('Location: ../index.php');
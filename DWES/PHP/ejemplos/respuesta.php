<?php 
    if (isset($_GET['enviar'])) { 
        $nombre = $_GET['nombre']; 
        $modulos = $_GET['modulos'];
        print "Nombre: ".$nombre."<br />"; 
        foreach ($modulos as $modulo) { print "Modulo: ".$modulo."<br />"; }
    } 
?>
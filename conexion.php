<?php
    error_reporting(-1);
    ini_set('display_errors', 'On');

    function conectarBD(){
        $user = 'lukas';
        $pass = 'Lvkaz3natoR';
        $db = 'lukas';
        $port = '5432'; //'5432';
        $host = 'localhost'; //'192.168.1.1'; //'josue.nas-data.com';
        $connectionString = 'host=' . $host . ' port=' . $port . ' dbname=' . $db . ' user=' . $user . ' password=' . $pass;

        global $conexion;

        $conexion = pg_connect($connectionString)
            or die("Connection ERROR: " . pg_last_error());
    }
?>
<?php

    function connect() {
        // Serverdaten - muss angepasst werden
        $server = "mysql:host=localhost;dbname=meine_kontakte";
        $username = "root";
        $passwort = "";

        $connection = new PDO($server, $username, $passwort);

        // Abfragestring für MySQL
        $sql = "SELECT * FROM kontakte";

        $abfrage = $connection->prepare($sql);
        $abfrage->execute();

        // Speichern der Abfrageergebnisse in einem Array
        $ergebnis = $abfrage->fetchAll();

        // Rückgabe der Variablen
        return $ergebnis;
    }

    if (isset ($_POST['newInsert'])) newInsert();

    function newInsert() {

        // Serverdaten - muss angepasst werden
        $server = "mysql:host=localhost;dbname=meine_kontakte";
        $username = "root";
        $passwort = "";

        $connection = new PDO($server, $username, $passwort);

        // Speichern der übergebenen Daten in Variablen
        $name = $_POST['name'];
        $nachname = $_POST['nachname'];
        $email = $_POST['email'];

        // Abfragestring für MySQL
        $sqlNew = "INSERT INTO kontakte (Name, Nachname, Email) VALUES (?,?,?)";

        $new = $connection->prepare($sqlNew);
        $new->execute([$name, $nachname, $email]);

         // Weiterleiten
         header('location: index.php');
    }

    function delete() {

        // Serverdaten - muss angepasst werden
        $server = "mysql:host=localhost;dbname=meine_kontakte";
        $username = "root";
        $passwort = "";

        $connection = new PDO($server, $username, $passwort);

        // Abfragestring für MySQL
        $sqlDelete = 'DELETE FROM kontakte WHERE ID='.$_GET['delete'];

        $delete = $connection->prepare($sqlDelete);
        $delete->execute();
    }

    function edit() {

        // Serverdaten - muss angepasst werden
        $server = "mysql:host=localhost;dbname=meine_kontakte";
        $username = "root";
        $passwort = "";

        $connection = new PDO($server, $username, $passwort);

        // Abfragestring für MySQL
        $sqlEdit = 'SELECT * FROM kontakte WHERE ID='.$_GET['edit'];

        $edit = $connection->prepare($sqlEdit);
        $edit->execute();

        // Speichern der Abfrageergebnisse in einem Array
        $ergebnis = $edit->fetchAll();

        // Rückgabe der Variablen
        return $ergebnis;
    }

    if (isset ($_POST['update'])) update();

    function update() {

        // Serverdaten - muss angepasst werden
        $server = "mysql:host=localhost;dbname=meine_kontakte";
        $username = "root";
        $passwort = "";

        $connection = new PDO($server, $username, $passwort);

        // Speichern der übergebenen Daten in Variablen
        $name = $_POST['name'];
        $nachname = $_POST['nachname'];
        $email = $_POST['email'];
        $id = $_POST['id'];

        // Abfragestring für MySQL
        $sqlUpdate = "UPDATE kontakte SET Name=?, Nachname=?, Email=? WHERE ID=?";

        $update = $connection->prepare($sqlUpdate);
        $update->execute([$name, $nachname, $email, $id]);

        // Weiterleiten
        header ('location: index.php');
    }
?>
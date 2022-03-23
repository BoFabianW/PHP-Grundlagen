<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>PHP Datenbank</title>
</head>

<body>

    <?php

        include('connect.php');
        connect();

            echo '<table>';
            echo '<thead><tr>';
            echo '<td>ID</td><td>Name</td><td>Nachname</td><td>Email</td><td>Aktion</td><td><a href="index.php?newInsert">+</a></td>';
            echo '</tr></thead>';
            
            echo '<tbody>';

                $ausgabe = connect();

                foreach($ausgabe as $line) {
                    echo '<tr>';
                    echo '<td>'.$line['ID'].'</td>';
                    echo '<td>'.$line['Name'].'</td>';
                    echo '<td>'.$line['Nachname'].'</td>';
                    echo '<td>'.$line['Email'].'</td>';
                    echo '<td><a href="index.php?edit='.$line['ID'].'">Bearbeiten</a></td>';
                    echo '<td><a href="index.php?delete='.$line['ID'].'">Löschen</a></td>';
                    echo '</tr>';
                }

            echo '</tbody>';
            echo '</table>';
    ?>

    <?php
        if (isset ($_GET['delete'])) {
            delete();
            header ('location: index.php');
        }

        if (isset ($_GET['edit'])) {
            $ausgabe = edit();
            
            echo '<form action="connect.php" method="POST">';
            echo '<input type="text" name="name" value="'.$ausgabe[0]['Name'].'">';
            echo '<input type="text" name="nachname" value="'.$ausgabe[0]['Nachname'].'">';
            echo '<input type="text" name="email" value="'.$ausgabe[0]['Email'].'">';
            echo '<input type="hidden" name="id" value="'.$ausgabe[0]['ID'].'">';
            echo '<input type="hidden" name="update" value="update">';
            echo '<button type="submit" name="submit">Speichern</button>';
            echo '</form>';
        }

        if (isset ($_GET['newInsert'])) {
                
            echo '<form action="connect.php" method="POST">';
            echo '<label for="name">Name:</label>';
            echo '<input type="text" name="name" value="">';
            echo '<label for="nachname">Nachname:</label>';
            echo '<input type="text" name="nachname" value="">';
            echo '<label for="email">Email:</label>';
            echo '<input type="text" name="email" value="">';
            echo '<input type="hidden" name="newInsert" value="newInsert">';
            echo '<button type="submit" name="submit">Speichern</button>';
            echo '</form>';
        }
    ?>

</body>
</html>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- CSS einbinden -->
     <link rel="stylesheet" href="style-form.css">

    <title>PHP-Kontaktformular</title>
</head>
<body>
   
<!-- Kontaktformular -->
    <form action="index.php" method="POST">
        <label class="label-form" for="name">Name:*</label>
        <input class="input-form" type="text" name="name" placeholder="Bitte Namen eingeben" required>

        <label class="label-form" for="email">Email:*</label>
        <input class="input-form" type="email" name="email" placeholder="Bitte Email eingeben" required>

        <label class="label-form" for="telefon">Telefon:</label>
        <input class="input-form" type="text" name="telefon" placeholder="Telefonnummer">

        <label class="label-form" for="nachricht">Nachricht:*</label>
        <textarea class="textarea-form" name="nachricht" placeholder="Bitte Nachricht eingeben" id="msg" cols="30" rows="10" required></textarea>

        <button class="button-form" type="submit" name="submit">Absenden</button>
    </form>

    <!-- Absenden der Daten aus dem Formular -->
    <?php

        if(isset($_POST['submit'])) {
            $from = "From:".$_POST['name']."<".$_POST['email'].">\r\n";
            $from .= "Reply-To:".$_POST['email']."\r\n";
            $from .= "Content-Type: text/html\r\n";

            $empf = "info@prometheus-software-bo.de";
            $betreff = "Kontaktformular";
            $nachricht = $_POST["nachricht"];

            mail($empf, $betreff, $nachricht, $from);

            echo "Die Nachricht wurde gesendet!";
        }
    ?>
    
</body>
</html>
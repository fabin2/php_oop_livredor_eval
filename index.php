<?php
require ('./classes/connexion_bdd.php');
require ('./classes/message.class.php');

$database = new DatabaseHandler();
$db = $database->connectionToDatabase();

$message = new Message($db);
$result = $message->readTable();

if (isset($_POST['submit'])) {
    if(!empty($_POST['email']) && !empty($_POST['message'])) {
        $message->email = $_POST['email'];
        $message->message = $_POST['message'];
        $message->createMessage();
        header('Location: http://localhost/php_eval_livre_dor/');
        die;
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>
</head>
<body>
    <h1>Livre d'or</h1>
    <form method="POST">
        <fieldset>
            <label>Email
                <input type="email" name="email">
            </label>
            <label>Veuillez laisser un message
                <textarea name="message" cols="30" rows="5"></textarea>
            </label>
            <input type="submit" name="submit" value="Envoyer">
        </fieldset>
    </form>

    <?php
        if (!empty($result)){
            echo "<table border='2px' cellpadding='5px' cellspacing='0'>";
            echo "<tr>
                    <th>auteur_id</th>
                    <th>auteur_email</th>
                    <th>auteur_message</th>
                    <th>auteur_time</th>
                </tr>";
            foreach($result as $key =>$value){
                echo "<tr>";
                        foreach($value as $val2){
                            echo "<td>$val2 </td> ";
                        }
                echo "</tr>";
            }
        }
        echo "</table>";
    ?>

</body>
</html>

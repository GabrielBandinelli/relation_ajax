<!DOCTYPE html>
<?php
    $notes = ['C' => 'do', 'D' => 'ré', 'E' => 'mi', 'F' => 'fa', 'G' => 'sol', 'A' => 'la', 'B' => 'si'];
    $result = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(empty($_POST['note_americaine'])) {
            $result = '<p>Aucune note choisie !</p>';
        } else {
            $note = $_POST['note_americaine'];
            $result = '<p>La notation américaine pour la note\' '.$note.'  \' est \' '.$notes[$note].' \'.</p>';
        }
        echo $result;
        return;    
    }
?>

<html lang="fr"> 
    
    <head>
        <meta charset="UTF-8">
        <title>
            Note de musique 
        </title>
        <script src="js/script.js" charset="utf-8"></script>
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <form action="index.php" method="POST" id="forma">
            <fieldset>
                <legend> Correspondance des notes </legend>
                <p> Chosir une note américaine </p>
                <select name ="note_americaine">
                    <option value=""> Choix </option>
                        
        <?php foreach ($notes as $americaine => $musique): ?>
            <?php echo "<option value='$americaine'> $americaine </option>"; ?>
        <?php endforeach; ?>

                </select>
                <input type="submit" name="envoyer" value="afficher la correspondance">
            </fieldset>
        </form>
        <div id="resultat">                    
            <?php echo $result; ?>
        </div>

    </body>
</html>

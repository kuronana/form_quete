<?php
/*$nom = $prenom = $mail = $num = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = test_input($_POST["nm"]);
    $prenom = test_input($_POST["prn"]);
    $mail = test_input($_POST["ml"]);
    $num = test_input($_POST["nm"]);
    $message = test_input($_POST["msg"]);
    }

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }*/

if($_POST)
{
    $textnom = $_POST['nom'];
    $textprenom = $_POST['prenom'];
    $error = array();
    //start validation
    if(empty($_POST['nom']))
    {
        $error['nom1'] = "Votre nom ne peut être aussi vide que votre vie sentimental.";
    }
    elseif(ctype_alpha($_POST['nom']) === false)
    {
        $error['nom2'] = 'Veuillez entrer un nom valide.'; 
    }
    if(empty($_POST['prenom']))
    {
        $error['prenom1'] = 'Vous n\'êtes peut être personne, mais vous devez bien avoir un prénom, non ?';
    }
    elseif(ctype_alpha($_POST['prenom']) === false)
    {
        $error['prenom2'] = 'Veuillez entrer un prénom valide.'; 
    }
    if(empty($_POST['mail']))
    {
        $error['mail1'] = 'Vous devez renseigner une addresse mail.';
    }
    if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
    {
        $error['mail2'] = 'Veuillez entrer une adresse mail au bon format';
    }
    if(empty($_POST['num']))
    {
        $error['num1'] = 'On ne vous le dit pas souvent, mais nous avont besoin de votre numero de téléphone.';
    }
    elseif(!is_numeric($_POST['num']))
    {
        $error['num2'] = 'Un numero de téléphone n\'est composé que de chiffre...'; 
    }
    if(empty($_POST['select']))
    {
        $error['select1'] = 'Nos experts vous conseillent vivement le sujet "Hentai".';
    }
    if(empty($_POST['message']))
    {
        $error['message1'] = 'Pourquoi nous contacter si vous n\'avez pas de message à nous envoyer ?';
    }

    //checkerrors
    elseif(count($error) == 0)
    {
        echo "Envoyer avec succès !";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form target="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" class="container">
        <div class="row">
            <label for="nom">Nom :</label>
            <input type="text"  id="nom" name="nom" value="<?php if(isset($_POST)) echo $_POST['nom'] ?>" required>
            <?php if(isset($error['nom1'])) echo $error['nom1']; ?>
            <?php if(isset($error['nom2'])) echo $error['nom2']; ?>
        </div>
        <div class="row">
            <label for="prenom">Prénom :</label>
            <input type="text" minlength="3" maxlength="30" id="prenom" name="prenom" value="<?php if(isset($_POST)) echo $_POST['prenom'] ?>" required>
            <?php if(isset($error['prenom1'])) echo $error['prenom1']; ?>
            <?php if(isset($error['prenom2'])) echo $error['prenom2']; ?>
        </div>
        <div class="row">
            <label for="mail">Courriel :</label>
            <input type="email" minlength="3" maxlength="30" id="mail" name="mail" value="<?php if(isset($_POST)) echo $_POST['mail'] ?>" required>
            <?php if(isset($error['mail1'])) echo $error['mail1']; ?>
            <?php if(isset($error['mail2'])) echo $error['mail2']; ?>
        </div>
        <div class="row">
            <label for="num">Numero de tel. :</label>
            <input type="tel" id="num" name="num"  value="<?php if(isset($_POST)) echo $_POST['num'] ?>" required>
            <?php if(isset($error['num1'])) echo $error['num1']; ?>
            <?php if(isset($error['num2'])) echo $error['num2']; ?>
        </div>
        <label for="select" class="row">Sujet</label>
        <select required id="select" name="select">
            <option value>...</option>
            <option value="1">shonen</option>
            <option value="2">ecchi</option>
            <option value="3">hentai</option>
        </select>
        <?php if(isset($error['select1'])) echo $error['select1']; ?>
        <div class="row">
            <label for="message">Message :</label>
            <textarea rows=10 cols=80 id="message" minlength="3" maxlength="300" name="message" value="<?php if(isset($_POST)) echo $_POST['message'] ?>" required></textarea>
            <?php if(isset($error['message1'])) echo $error['message1']; ?>
        </div>
        <div class="button row">
            <button type="submit" value="submit ">Envoyer votre message</button>
        </div>
    </form> 
</body>
</html>

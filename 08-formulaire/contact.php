<?php
    $email= null;
    $sujet= null;
    $message= null;

    if (!empty($_POST)) {
        $email = $_POST['email'];
        $sujet = $_POST['sujet'];
        $message = $_POST['message'];
    }
?>
<form action="" method="post">
    <div style="padding: 5px">
        <input type="email" name="email" placeholder="Email" required value="<?= $email ?>">
    </div>
    <div style="padding: 5px">
        <input type="text" name="sujet" placeholder="Objet" value="<?= $sujet ?>">
    </div>
    <div style="padding: 5px">
        <textarea type="text" name="message" placeholder="Message (15 caractères minimum)" minlength="15" value="<?= $message ?>"></textarea>
    </div>

    <div style="padding: 5px"><input type="submit" value='Envoyer'></div>

</form>

<?php 



if (isset($_POST['email']) && isset($_POST['sujet']) && isset($_POST['message'])) {    

    if (false == filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("Cet email n'est pas valide");
    }
    if (strlen($sujet) <= 0) {
        exit("Veuillez remplir l'objet");
    }

    if (strlen($message) <= 15) {
        exit('Votre message est trop court');
    }
    
    echo "Votre message a bien été envoyé !!!!!!!!!!!";
}


?>
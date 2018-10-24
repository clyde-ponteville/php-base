<?php 
    $title = 'Sticky - Contact';
    require(__DIR__.'/partials/header.php'); 
?>

<!-- Begin page content -->
<main role="main" class="container">
    <h1 class="mt-5">Contact</h1>
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
<form action="" method="post" class="form-group">
    <div style="padding: 5px">
        <input class="form-control" type="email" name="email" placeholder="Email" required value="<?= $email ?>">
    </div>
    <div style="padding: 5px">
        <input class="form-control" type="text" name="sujet" placeholder="Objet" value="<?= $sujet ?>">
    </div>
    <div style="padding: 5px">
        <textarea class="form-control" type="text" name="message" placeholder="Message (15 caractères minimum)" minlength="15" value="<?= $message ?>"></textarea>
    </div>

    <div style="padding: 5px"><input class="btn btn-primary" type="submit" value='Envoyer'></div>

</form>

<?php 



if (isset($_POST['email']) && isset($_POST['sujet']) && isset($_POST['message'])) {    

    if (false == filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("<span class='alert alert-danger'>Cet email n'est pas valide</span>");
    }
    if (strlen($sujet) <= 0) {
        exit("<span class='alert alert-danger'>Veuillez remplir l'objet</span>");
    }

    if (strlen($message) <= 15) {
        exit("<span class='alert alert-danger'>Votre message est trop court</span>");
    }
    
    mail($email, $sujet,$message);
    echo "<span class='alert alert-success'>Votre message a bien été envoyé !</span>";
}


?>
</main>

<?php require(__DIR__.'/partials/footer.php'); ?>

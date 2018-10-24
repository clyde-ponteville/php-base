<?php 
    $title = 'PizzaStore - Ajouter Pizza';
    require(__DIR__.'/partials/header.php');    
?>

<!-- Begin page content -->
<main class="container">
    <h1 class="mt-5">Ajouter une pizza</h1>

    <form action="" method="post" class="form-group">
        <label for="name">Nom de la pizza</label><input name="name" type="text" class="form-control">
        <label for="price">Prix de la pizza</label><input name="price" type="text" class="form-control">
        <label for="img">Image</label><input name="img" type="file" class="form-control-file">
        <div class="py-3">
            <input class="btn btn-primary" name="btnAddPizza" type="submit" value='Ajouter une pizza'>        
        </div>
    </form>
    
</main>

<?php require(__DIR__.'/partials/footer.php'); ?>

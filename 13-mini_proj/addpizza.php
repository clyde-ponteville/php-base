<?php 
    $title = 'PizzaStore - Ajouter Pizza';
    require(__DIR__.'/partials/header.php');    
?>


<main class="container">
    <h1 class="mt-5">Ajouter une pizza</h1>

    <form action="config/insertPizza.php" method="post" class="form-group" enctype="multipart/form-data">
        <label for="name">Nom de la pizza</label><input name="name" type="text" class="form-control">
        <label for="price">Prix de la pizza</label><input name="price" type="number" step="0.01" class="form-control">
        <?php 
            require_once(__DIR__.'/config/database.php');

            $query = $db->query('SELECT * FROM size');            
            $result = $query->fetchAll();        
        ?>
        <div class="mt-3 sizeAdd">
            <?php foreach ($result as $value) { ?>
                    <label for="size_<?= $value['name'] ?>"><?= strtoupper($value['name']) ?></label><input name="<?= $value['id']?>" type="checkbox" id="size_<?= $value['name'] ?>">
            <?php } ?>            
            
        </div>


        <label for="img">Image</label><input name="img" type="file" class="form-control-file">
        <div class="py-3">
            <input class="btn btn-primary" name="btnAddPizza" type="submit" value='Ajouter une pizza'>        
        </div>
    </form>

    <?php   
        
        if (isset($_GET['done']) && is_numeric($_GET['done'])) {            
            $done = $_GET['done'];
            switch ($done) {
                case '0':
                ?>
                    <div class="alert alert-danger" role="alert">
                        La pizza n'a pas été ajouté ! 
                    </div>
                <?php
                    break;

                case '1':
                ?>
                    <div class="alert alert-success" role="alert">
                        Votre pizza a bien été ajouté ! ☺
                    </div>
                <?php
                    break;
                default:
                    # code...
                    break;
            }
            
        }
        

    ?>
    
    
</main>

<?php require(__DIR__.'/partials/footer.php'); ?>

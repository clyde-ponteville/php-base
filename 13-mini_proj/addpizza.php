<?php 
    $title = 'PizzaStore - Ajouter Pizza';
    require(__DIR__.'/partials/header.php');    
?>


<main class="container">
    <h1 class="mt-5">Ajouter une pizza</h1>

    <form action="config/insertPizza.php" method="post" class="form-group" enctype="multipart/form-data">
        <label for="name">Nom de la pizza</label><input name="name" type="text" class="form-control">
        <label for="price">Prix de la pizza</label><input name="price" type="number" min="5" max="19.99" step="0.01" class="form-control" placeholder="Prix compris entre 5€ et 19.99€">
        <?php 
            require_once(__DIR__.'/config/database.php');

            $query = $db->query('SELECT * FROM size');            
            $result = $query->fetchAll();        
        ?>
        <div class="mt-3 sizeAdd">
            <?php foreach ($result as $value) { ?>
                    <label class="lblCheck" for="size_<?= $value['name'] ?>"><?= strtoupper($value['name']) ?></label><input name="<?= $value['id']?>" type="checkbox" id="size_<?= $value['name'] ?>">
            <?php } ?>            
            
        </div>
        <select class="custom-select" name="category" id="select_category">
            <option selected>Choisissez la categorie</option>
            <?php 
                $getCategory = $db->query('SELECT * FROM category');            
                $dataCategory = $getCategory->fetchAll();

                foreach ($dataCategory as $category) { ?>
                    <option value="<?= $category['id'] ?>"><?= ucfirst($category['name']) ?></option>
                <?php }
            ?>
        </select>
        <textarea class="form-control" name="description" id="description" rows="3" placeholder='Ajouter une description'></textarea>
        <label for="img">Image</label><input name="img" type="file" class="form-control-file">
        <div class="py-3">
            <input class="col-lg-12 btn btn-success" name="btnAddPizza" type="submit" value='Ajouter une pizza'>        
        </div>
    </form>

    <?php   
//Erreur formulaire
    if (isset($_GET)) {

        if (isset($_GET['errName']) == 'name') {
            ?>
            <div class="alert alert-danger" role="alert">
                Le nom n'est pas valide !
            </div>
        <?php
        }
        if (isset($_GET['errPrice']) == 'price') {
            ?>
            <div class="alert alert-danger" role="alert">
                Le prix n'est pas valide !
            </div>
        <?php
        }
        if (isset($_GET['errCat']) == 'category') {
            ?>
            <div class="alert alert-danger" role="alert">
                La categorie n'est pas valide !
            </div>
        <?php
        }
        if (isset($_GET['errImg']) == 'image') {
            ?>
            <div class="alert alert-danger" role="alert">
                L'image n'est pas valide !
            </div>
        <?php
        }
        if (isset($_GET['errDesc']) == 'description') {
            ?>
            <div class="alert alert-danger" role="alert">
                La description n'est pas valide !
            </div>
        <?php
        }
    }
        
        if (isset($_GET['done'])) {            
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
            }
            
        }
        

    ?>
    
    
</main>

<?php require(__DIR__.'/partials/footer.php'); ?>

<?php 
    $title = 'PizzaStore - Single';
    require(__DIR__.'/partials/header.php');    
?>

<!-- Begin page content -->
<main class="container d-flex">
    <div class="col-md-6 boxPizzaSingle">

        <?php 
            require_once(__DIR__.'/config/database.php');

            if (isset($_GET['name'])) {
                $name = htmlspecialchars($_GET['name']);
                // $name = $db->quote($name);           
            
                $query = $db->prepare('SELECT * FROM pizza WHERE name= :pizza');    
                $query->bindValue(':pizza', $name, PDO::PARAM_STR);    
                $query->execute();
                $result = $query->fetch();
                
                echo "<h2 class='mt-5'>".$result['name']."</h2>";    
                echo "<img src='assets/".$result['image']."' alt=".$result['name'].">";
                
            }        
        ?>
        <a class="btn btn-primary" href="pizza_list.php">Retour à la liste des pizzas</a>
    </div>
    <div class="boxPrice col-md-6">
        <?php  
            if (isset($_GET['name'])) {
                $name = htmlspecialchars($_GET['name']);
                // $name = $db->quote($name);           
            
                $getSize = $db->prepare('SELECT pizza.name, pizza.price, size.name taille, size.price supplement, (pizza.price + size.price) AS total
                FROM pizza_has_size
                INNER JOIN pizza ON pizza.id = pizza_has_size.pizza_id
                INNER JOIN size ON size.id = pizza_has_size.size_id
                WHERE pizza.name = :pizza
                ORDER BY pizza.id, size.id ASC');                    
                
                $getSize->bindValue(':pizza', $name, PDO::PARAM_STR);    
                $getSize->execute();
                $result = $getSize->fetchAll(); 
                
            }   
            ?>
        <select class='custom-select' name="size" id="size">
            <option selected>Nos tailles</option>
            <?php
                foreach ($result as $size) { ?>
                    <option value="<?=$size['taille']?>"><?= strtoupper($size['taille'])?></option>;
            <?php  } ?>
            
        </select>

        <div class="priceSingle">
            <span>Prix: <?= $size['price'] ?> €</span>
            
            <?php 
                $i = 0;
                $j = 10;
                foreach ($result as $supp) { ?>
                    <span class="supp" id=<?= $i?>>+<?= $supp['supplement'] ?> €</span> 
                    <span id=<?= $j?> class="total">Total : <?= $supp['total'] ?> €</span>                    
            <?php 
                $i++;
                $j++;
                } 
            ?>
                <button type="button" class="btn btn-success">Commander</button>
        </div>
    </div>
    

    
</main>

<?php require(__DIR__.'/partials/footer.php'); ?>
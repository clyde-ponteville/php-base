<?php 
    $title = 'PizzaStore - Single';
    require(__DIR__.'/partials/header.php');    
?>

<!-- Begin page content -->
<main class="container">
    <div class="boxPizzaSingle">

        <?php 
            require 'config/database.php';

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


    
</main>

<?php require(__DIR__.'/partials/footer.php'); ?>

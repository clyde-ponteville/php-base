<?php 
    $title = 'PizzaStore - Liste Pizza';
    require(__DIR__.'/partials/header.php');    
?>

<!-- Begin page content -->
<main role="main" class="container">
    <h1 class="mt-5">Liste Pizza</h1>

    <div class="list">    
        <?php 
            require 'config/database.php';

            $query = $db->prepare('SELECT * FROM pizza');
            $query->execute();
            $result = $query->fetchAll();

            foreach ($result as $pizza) {
                echo '<div>';
                echo '<span style= display:block>'.$pizza['name'].'</span>'; 
                echo "<img src='assets/".$pizza['image']."' alt=".$pizza['name'].">"; 
                echo '<span style= display:block>'.$pizza['price'].'</span>'; 
                echo '</div>';
            }
        ?>
    </div>
    
</main>

<?php require(__DIR__.'/partials/footer.php'); ?>

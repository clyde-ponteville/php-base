<?php 
    $title = 'PizzaStore - Liste Pizza';
    require(__DIR__.'/partials/header.php');    
?>

<!-- Begin page content -->
<main class="container">
    <h1 class="mt-5">Nos pizzas</h1>

    <div class="row list">
        <?php 
            require 'config/database.php';
            $query = $db->prepare('SELECT * FROM pizza');
            $query->execute();
            $result = $query->fetchAll();

            foreach ($result as $pizza) {
                echo '<div class="col-md-4 pizza">';
                    echo '<a href="pizza_single.php?name='.$pizza['name'].'"><div class="card mb-4 box-shadow">'; 
                        echo '<div class="imgSize">';               
                            echo "<img class='card-img-top' src='assets/".$pizza['image']."' alt=".$pizza['name'].">";
                        echo '</div>';
                        echo '<div class=card-body>';
                            echo '<h3 style= display:block>'.$pizza['name'].'</h3>';  
                            echo '<span style= display:block>'.$pizza['price'].' €</span>'; 
                        echo '</div>';
                    echo '</div></a>';
                echo '</div>';
            }
        ?>
    </div>

</main>

<?php require(__DIR__.'/partials/footer.php'); ?>

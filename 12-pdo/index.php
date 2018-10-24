<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    
</head>
<body>
    <?php 
        $host = 'localhost';
        $dbname = 'pizzastore';
        $user = 'root';
        $pwd = '';
        try{
            $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=UTF8' ,$user, $pwd,[
                //Affiche les erreur sql
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                // On récupère tous les résultats en tableau associatif
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        }catch(Exception $e){
            echo $e->getMessage();
            header('Location: https://www.google.fr/search?q='.$e->getMessage());
        }
        $query = $db->query('SELECT * FROM pizza');
        $result = $query->fetchAll();

        echo '<h2>fetchAll()</h2>';
        echo '<div>';
        foreach ($result as  $pizza) {        
            echo '<span style= display:block>'.$pizza['name'].'</span>';        
        }
        echo '</div>';


        echo '<h2>While - fetch()</h2>';
        $q = $db->query('SELECT * FROM pizza');        
        while ($resulta = $q->fetch()) {
            echo '<span style= display:block>'.$resulta['name'].'</span>';
        }
        
        

    ?>
</body>
</html>

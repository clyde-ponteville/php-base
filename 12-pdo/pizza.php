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

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
            $id = $db->quote($id);            
            $query = $db->prepare('SELECT * FROM pizza WHERE id='.$id);
            $query->execute();                
            $result = $query->fetch();
            if ($result) {                
                echo '<h2>'.$result['name'].'</h2>';
            }else{
                echo "La pizza n'existe pas";   
            }
            
        }else{            
            echo 'Pas de resultat';
        }


    ?>
</body>
</html>

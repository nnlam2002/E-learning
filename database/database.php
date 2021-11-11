<?php
    $dsn = 'mysql:host=localhost;dbname=study_camp';
    $username = 'root';
    $password = '';

    try{
        $db = new PDO($dsn, $username, $password);
    }catch(PDOException $e){
        $error = $e->getMessage();
        echo '<p>Error Message: <?php echo $error; ?></p>';
    }
?>
<?php
//connexion à la base de données
try{
    $db = new PDO('mysql:host=localhost;dbname=test_projet;charset=utf8', 'root', 'root',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $exception)
{
    die( 'Erreur : ' . $exception->getMessage() );
}


$query = $db->query('SELECT * FROM events limit 5');
$events = $query->fetchAll();
?>

<?php $title = ''; ?>
<?php ob_start(); ?>

    <main class="index">
        <?php require_once 'partials/frontend/header.php';?>

        <?php require_once 'partials/frontend/slider.php';?>

        <?php require_once 'partials/frontend/footer.php';?>
    </main>

<!-- scripts -->
<script src="../../assets/js/header.js"></script>
<script src="../../assets/js/slider.js"></script>
<script src="../../assets/js/menu-burger.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>

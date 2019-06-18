<!doctype html>
<html lang="fr">
<head>
    <?php require './partials/backend/headAssets.php'; ?>
    <title><?= $title ?></title>
</head>
    <body>
        <?= $content ?>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
        <script>tinymce.init({selector:'textarea'});</script>
    </body>
</html>
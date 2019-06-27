<?php
require_once ('././model/categories.php');

function categoriesList(){
    $categories = getCategoriesList();
    require_once './views/backend/categoriesList.php';
}

function categoriesForm(){
    if (isset($_GET['category-id'])){
        $category = getCategory($_GET['category-id']);
    }
    if (isset($_POST['save']) || isset($_POST['update'])){
        if (empty($_POST['name'])){
            $errors['empty'] = 'Tous les champs sont obligatoire !';
        }
        else{
            if (isset($_POST['update'])){
                $result = updateCategory($_POST['name'], $_POST['category-id']);
                if (!$result){
                    $errors['errorUpdate'] = 'Une erreur est survenue veuillez réessayer !';
                }
                else{
                    $_SESSION['success']['categoryUpdated'] = 'Modification effectuée avec succès !';
                    header('location:index.php?page=admin-categories-list');
                    exit;
                }
            }
            else{
                $result = addCategory($_POST['name']);
                if (!$result){
                    $errors['errorInsert'] = 'Une erreur est survenue veuillez réessayer !';
                }
                else{
                    $_SESSION['success']['categoryInserted'] = 'Insertion effectuée avec succès !';
                    header('location:index.php?page=admin-categories-list');
                    exit;
                }
            }
        }
    }
    require_once './views/backend/categoriesForm.php';
}

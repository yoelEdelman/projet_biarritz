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
                $category = updateCategory($_POST['name'], $_POST['category-id']);
            }
            else{
                $result = addCategory($_POST['name']);
            }
        }
    }
    require_once './views/backend/categoriesForm.php';
}
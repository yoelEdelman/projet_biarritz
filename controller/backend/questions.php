<?php
require_once ('././model/questions.php');
require_once ('././model/categories.php');

function questionsList(){
    if (isset($_GET['question-id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){
        $result = deleteQuestions($_GET['question-id']);
        if (!$result){
            $errors['errorDelete'] = 'Une erreur est survenue veuillez réessayer !';
        }
        else{
            $_SESSION['success']['questionsDeleted'] = 'Supression effectuée avec succès !';
            header('location:index.php?page=admin-questions-list');
            exit;
        }
    }
    $questions = getQuestions(FALSE);
    require_once './views/backend/questionsList.php';
}

function questionsForm(){
    $categories = getCategoriesList();

    if (isset($_GET['question-id'])){
        $question = getQuestions($_GET['question-id']);
    }
    if (isset($_POST['update']) || isset($_POST['save'])){
        if (empty($_POST['question']) || empty($_POST['categories'])){
            $errors['empty'] = 'Veuillez remplir les champs obligatoire !';
        }
        elseif (isset($_POST['update'])){
            $result = updateQuestions($_POST['question'], $_POST['categories'], $_POST['question-id']);
            if (!$result){
                $errors['errorUpdate'] = 'Une erreur est survenue veuillez réessayer !';
            }
            else{
                $_SESSION['success']['questionUpdated'] = 'Modification effectuée avec succès !';
                header('location:index.php?page=admin-questions-list');
                exit;
            }
        }
        elseif (isset($_POST['save'])){
            $result = addQuestions($_POST['question'], $_POST['categories']);
            if (!$result){
                $errors['errorInsert'] = 'Une erreur est survenue veuillez réessayer !';
            }
            else{
                $_SESSION['success']['questionInserted'] = 'Insertion effectuée avec succès !';
                header('location:index.php?page=admin-questions-list');
                exit;
            }
        }
        $question['question'] = $_POST['question'];
    }
    require_once './views/backend/questionsForm.php';
}

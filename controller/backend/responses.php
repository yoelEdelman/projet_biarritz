<?php
require_once ('././model/questions.php');
require_once ('././model/responses.php');

function responsesList(){
    if (isset($_GET['response-id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){
        $result = deleteResponses($_GET['response-id']);
        if (!$result){
            $errors['errorDelete'] = 'Une erreur est survenue veuillez réessayer !';
        }
        else{
            $_SESSION['success']['responseDeleted'] = 'Supression effectuée avec succès !';
            header('location:index.php?page=admin-responses-list');
            exit;
        }
    }
    $responses = getResponses(FALSE);
    require_once './views/backend/responsesList.php';
}

function responsesForm(){
    $questions = getQuestions();

    if (isset($_GET['response-id'])){
        $response = getResponses($_GET['response-id']);
    }
    if (isset($_POST['update']) || isset($_POST['save'])){
        if (empty($_POST['response']) || empty($_POST['question'])){
            $errors['empty'] = 'Veuillez remplir les champs obligatoire !';
        }
        elseif (isset($_POST['update'])){
            $result = updateResponses($_POST['response'], $_POST['question'], $_POST['response-id']);
            if (!$result){
                $errors['errorUpdate'] = 'Une erreur est survenue veuillez réessayer !';
            }
            else{
                $_SESSION['success']['responseUpdated'] = 'Modification effectuée avec succès !';
                header('location:index.php?page=admin-responses-list');
                exit;
            }
        }
        elseif (isset($_POST['save'])){
            $result = addResponses($_POST['response'], $_POST['question']);
            if (!$result){
                $errors['errorInsert'] = 'Une erreur est survenue veuillez réessayer !';
            }
            else{
                $_SESSION['success']['responseInserted'] = 'Insertion effectuée avec succès !';
                header('location:index.php?page=admin-responses-list');
                exit;
            }
        }
        $response['answer'] = $_POST['response'];
    }
    require_once './views/backend/responsesForm.php';
}

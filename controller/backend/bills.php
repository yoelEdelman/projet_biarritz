<?php
require_once ('././model/bills.php');

function billsForm(){
    if (isset($_POST['save'])){
        if (empty($_POST['bill_from']) || empty($_POST['bill_to']) || empty($_POST['amount_due']) || empty($_FILES['bill'])){
            $errors['empty'] = 'Veuillez remplir les champs obligatoire !';
        }
        $amountDue = (int)$_POST['amount_due'];
        $paid = (int)$_POST['paid'];
        if (!is_int($amountDue)){
            $errors['notInt'] = 'La somme due ne peut contenir des nombre uniquement';
        }
        else{
            $result = addBills($_POST['bill_from'], $_POST['bill_to'], $amountDue, $paid, $_POST['user-id'], $_FILES['bill']);
            if (!$result){
                $errors['errorInsert'] = 'Une erreur est survenue veuillez réessayer !';
            }
            else{
                $_SESSION['success']['billInserted'] = 'Insertion effectuée avec succès !';
                header('location:index.php?page=admin-users-list');
                exit;
            }
        }
    }
    require_once './views/backend/billsForm.php';
}

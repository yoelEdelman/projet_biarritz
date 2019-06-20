<?php
require_once ('././model/faq.php');
require_once ('././model/categories.php');

function faq(){
    $categories = getCategoriesList();
    $faqs = getFaq();
    require_once './views/frontend/faq.php';
}
<?php
header('Content-Type: application/json');
require_once('../utilities/bdd.php');
    if (isset($_GET['id']))
    {
        $return['question']=Questions::getQuestions($_GET['id']);
    }
    else{
        $question=null;
    }
    echo json_encode($return);
?>
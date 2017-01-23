<?php
header('Content-Type: application/json');
require_once('../utilities/bdd.php');
    if (isset($_GET['id']))
    {
        $return['votes']=Votes::getVotes($_GET['id']);
        $return['question']=Questions::getQuestions($_GET['id']);
    }
    else{
        $votes=null;
        $question=null;
    }
    echo json_encode($return);
?>
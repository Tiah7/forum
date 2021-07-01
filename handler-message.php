<?php
if ( isset($_POST["data-author"]) && !empty($_POST["data-author"]) 
&& isset($_POST["data-text"]) && !empty($_POST["data-text"]) 
&& isset($_POST["data-topic_id"]) && !empty($_POST["data-topic_id"]) 
) {

    $author = strip_tags($_POST['data-author']);
    $topic_id = strip_tags($_POST['data-topic_id']);
    $text = strip_tags($_POST['data-text']);

    require_once("db-connect.php");
    $sql="INSERT INTO message (`author`,`topic_id`,`text`) VALUE (:author,:topic_id,:text)";
    $query = $conn ->prepare($sql);
    $query->bindValue(':author',$author, PDO::PARAM_STR);
    $query->bindValue(':topic_id',$topic_id, PDO::PARAM_STR);
    $query->bindValue(':text',$text, PDO::PARAM_STR);
    $query->execute();

    echo '<a href="view-topic.php?id='.$topic_id.'"><button>Retour</button></a>';
}else{
    echo "Remplissez les champs";
}


<?php
echo "<p>".$_POST["data-author"]."</p>";
echo "<p>".$_POST["data-object"]."</p>";
echo "<p>".$_POST["data-text"]."</p>";

if ( isset($_POST["data-author"]) && !empty($_POST["data-author"]) 
&& isset($_POST["data-object"]) && !empty($_POST["data-object"]) 
&& isset($_POST["data-text"]) && !empty($_POST["data-text"]) 
) {
    $author = strip_tags($_POST['data-author']);
    $object = strip_tags($_POST['data-object']);
    $text = strip_tags($_POST['data-text']);

    require_once("db-connect.php");
    $sql = "INSERT INTO topics (`author`,`object`,`text`) VALUES (:author,:object,:text)";
    $query = $conn ->prepare($sql);
    $query-> bindValue(':author',$author,PDO::PARAM_STR);
    $query-> bindValue(':object',$object,PDO::PARAM_STR);
    $query-> bindValue(':text',$text,PDO::PARAM_STR);
    $query-> execute();
}else{
    echo "Remplissez les champs";
}
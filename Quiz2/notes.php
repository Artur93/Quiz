<?php

require("db_abstract.php");
if(!empty($_POST['note'])){
    $note = $_POST['note'];
    $time = date('Y-m-d', time());
    db_insert("note_table", array(
        "note" => $note,
        "date" => $time
    ));
    header('Content-Type: application/json');
    header('HTTP/1.1 201 Created');
    $result = array(
        'status' => array(
            "message" => "Note was create successfully..."
        )
    );
    print json_encode($result);
}

if(!empty($_POST['delete'])){
    db_delete("note_table", array(
        "id" => $_POST["delete"]
    ));
}
if(empty($_POST["note"]) && empty($_GET)){
    header('Content-Type: application/json');
    header('HTTP/1.1 400 Bad Request');

    $result = array(
        'status' => array(
            "message" => "Unable to create note..."
        )
    );
    print json_encode($result);
}

if(!empty($_GET)){
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $result = db_select("note_table", array(
        "1" => "1"
    ));

    $result1 = array();

    foreach($result as $key){
        $result1[] = array(
            "id"    => $key["id"],
            "note"  => $key["note"],
            "date"  => $key["date"]
        );
    }

    print json_encode($result1);
}
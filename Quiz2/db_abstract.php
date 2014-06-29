<?php

define("DB_HOST", "localhost");
define("DB_NAME", "notes");
define("DB_USER", "root");
define("DB_PASS", "");

function db_select($table,$query) {

    $pdo = new PDO('mysql:host='.DB_HOST.';'.'dbname='.DB_NAME.'', DB_USER, DB_PASS);
    $quey_key = array_keys($query);
    $query_values = array_values($query);
    $sql_query_condition = "";


    for($i = 0; $i < count($quey_key); $i++){
        if($i == (count($quey_key) -1)){
            $sql_query_condition .= $quey_key[$i] . "=?";

        } else{
            $sql_query_condition .= $quey_key[$i] . "=? and ";

        }
    }
    $squ_query_final = "SELECT * FROM " .$table. " WHERE " . $sql_query_condition;
    // echo $squ_query_final;
    $stmt = $pdo ->prepare($squ_query_final);
    $stmt->execute($query_values);
    $res = $stmt->fetchAll();
    return $res;
}

function db_insert($table, $data) {
    $question_mark = array_fill(0, count($data), "?");
    $keys = array_keys($data);
    $values = array_values($data);
    //$mysqli = new mysqli("localhost", "root", "123", "test1");
    $query = "insert into " . $table . "(" . implode(',', $keys).  ") value (" . implode(',', $question_mark) . ')';
    //echo($query);
    $pdo = new PDO('mysql:host='.DB_HOST.';'.'dbname='.DB_NAME.'', DB_USER, DB_PASS);
    $stmt = $pdo -> prepare($query);
    $stmt->execute($values);
}


function db_update($table, $data, $conditions){
    $data_key = array_keys($data);
    $data_values = array_values($data);
    $conditions_key = array_keys($conditions);
    $conditions_values = array_values($conditions);
    $sql_query_data = "";
    $sql_query_condition = "";
    for($i = 0; $i < count($data_key); $i++){
        if(!$data_key[$i+1]){
            $sql_query_data .= $data_key[$i] . "=?";
        } else{
            $sql_query_data .= $data_key[$i] . "=?, ";
        }
    }
    for($i = 0; $i < count($conditions_key); $i++){
        if(!$conditions_key[$i+1]){
            $sql_query_condition .= $conditions_key[$i] . "=?";
        } else{
            $sql_query_condition .= $conditions_key[$i] . "=? and ";
        }
    }
    $sql_query_final = "UPDATE " . $table . " SET " . $sql_query_data . " WHERE " . $sql_query_condition;
    $pdo = new PDO('mysql:host='.DB_HOST.';'.'dbname='.DB_NAME.'', DB_USER, DB_PASS);
    $marged_array = array_merge($data_values, $conditions_values);
    //echo $sql_query_final;
    $stmt = $pdo ->prepare($sql_query_final);
    $stmt ->execute($marged_array);
}


function db_delete($table, $conditions) {
    $conditions_key = array_keys($conditions);
    $conditions_value = array_values($conditions);
    $pdo = new PDO('mysql:host='.DB_HOST.';'.'dbname='.DB_NAME.'', DB_USER, DB_PASS);
    $sql_query_condition = "";
    for($i = 0; $i < count($conditions_key); $i++){
        if(!$conditions_key[$i+1]){
            $sql_query_condition .= $conditions_key[$i] . "=?";
        } else{
            $sql_query_condition .= $conditions_key[$i] . "=? and ";
        }
    }
    $squ_query_final = "DELETE FROM " . $table . " WHERE " . $sql_query_condition;
    //echo $squ_query_final;
    $stmt = $pdo -> prepare($squ_query_final);
    $stmt ->execute($conditions_value);
}
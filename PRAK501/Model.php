<?php
function selectalldata($table) {
    global $conn;
    $query = "SELECT * FROM $table";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt;
}

function selectdatabyid($table, $id, $struktur){
    global $conn;
    $select = "SELECT * FROM $table WHERE $struktur = :id";
    $stmt = $conn->prepare($select);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function insert($data, $table){
    global $conn;
    $columns = implode(", ", array_keys($data));
    $values = implode(", ", array_map(function($item) { return ":$item"; }, array_keys($data)));
    $insert = "INSERT INTO $table ($columns) VALUES ($values)";
    $stmt = $conn->prepare($insert);
    foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }
    $stmt->execute();
    return $stmt;
}

function update($data, $table, $where, $struktur){
    global $conn;
    $set = implode(", ", array_map(function($key) { return "$key = :$key"; }, array_keys($data)));
    $update = "UPDATE $table SET $set WHERE $struktur = :where";
    $stmt = $conn->prepare($update);
    foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }
    $stmt->bindValue(":where", $where);
    return $stmt->execute();
}

function delete($id, $table, $column) {
    global $conn;
    try {
        $sql = "DELETE FROM $table WHERE $column = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
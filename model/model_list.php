<?php
class Model_List
{
    static function create($table, $data)
    {
        $db = Connection::Init_connection();
        $stmt = $db->prepare(
            "INSERT INTO $table VALUES (null, :id_user, :name_list, default)"
        );
        $stmt->bindParam(":id_user", $data["id_user"], PDO::PARAM_INT);
        $stmt->bindParam(":name_list", $data["name_list"], PDO::PARAM_STR);
        try {
            $db->beginTransaction();
            $stmt->execute();
            $last_id = $db->lastInsertId();
            $db->commit();
            return $last_id;
        } catch (PDOException $e) {
            $db->rollback();
        }
    }

    static function read($table, $data)
    {
        if ($data == null) {
            $stmt = Connection::Init_connection()->prepare("SELECT * FROM $table");
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Connection::Init_connection()->prepare("SELECT * FROM $table WHERE ID_USER=:id_user");
            $stmt->bindParam(":id_user", $data, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    static function update($table, $data)
    {
        $stmt = Connection::Init_connection()->prepare("UPDATE $table SET USED=:used WHERE ID_LIST=:id_list");
        $stmt->bindParam(":id_list", $data["id_list"], PDO::PARAM_INT);
        $stmt->bindParam(":used", $data["used"], PDO::PARAM_BOOL);
        if ($stmt->execute()) {
            return true;
        }
    }

    static function delete($table, $data)
    {
        $db = Connection::Init_connection();
        $stmt = $db->prepare(
            "DELETE FROM $table WHERE ID_LIST=:id_list"
        );


        $stmt = $db->prepare(
            "DELETE FROM $table WHERE ID_LIST=:id_list"
        );
        $stmt->bindParam(":id_list", $data, PDO::PARAM_INT);
        try {
            $db->beginTransaction();
            $stmt->execute();
            $db->commit();
            return true;
        } catch (PDOException $e) {
            $db->rollback();
        }
    }
}

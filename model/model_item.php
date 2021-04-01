<?php
class Model_Item
{
    static function create($table, $data)
    {
        $db = Connection::Init_connection();
        $stmt = $db->prepare(
            "INSERT INTO $table VALUES (:id_item, :id_list, :amount)"
        );
        $stmt->bindParam(":id_item", $data["id_item"], PDO::PARAM_INT);
        $stmt->bindParam(":id_list", $data["id_list"], PDO::PARAM_INT);
        $stmt->bindParam(":amount", $data["amount"], PDO::PARAM_INT);
        try {
            $db->beginTransaction();
            $stmt->execute();
            $db->commit();
            return true;
        } catch (PDOException $e) {
            $db->rollback();
        }
    }

    static function read($table, $data)
    {
        $db = Connection::Init_connection();
        if ($data == null) {
            $stmt = $db->prepare(
                "SELECT ALL * FROM $table"
            );
            try {
                $db->beginTransaction();
                $stmt->execute();
                $result = $stmt->fetchAll();
                $db->commit();
                return $result;
            } catch (PDOException $e) {
                $db->rollback();
            }
        } else {
            $stmt = $db->prepare(
                "SELECT * FROM $table WHERE ID_LIST=:id_list"
            );
            $stmt->bindParam(":id_list", $data, PDO::PARAM_INT);
            try {
                $db->beginTransaction();
                $stmt->execute();
                $result = $stmt->fetchAll();
                $db->commit();
                return $result;
            } catch (PDOException $e) {
                $db->rollback();
            }
        }
    }

    static function update($table, $data)
    {
        $db = Connection::Init_connection();
        $stmt = $db->prepare(
            "UPDATE $table SET ID_ITEM=:new_id_item, AMOUNT=:amount WHERE ID_LIST=:id_list AND ID_ITEM=:old_id_item"
        );
        $stmt->bindParam(":old_id_item", $data["old_id_item"], PDO::PARAM_INT);
        $stmt->bindParam(":new_id_item", $data["new_id_item"], PDO::PARAM_INT);
        $stmt->bindParam(":id_list", $data["id_list"], PDO::PARAM_INT);
        $stmt->bindParam(":amount", $data["amount"], PDO::PARAM_INT);
        try {
            $db->beginTransaction();
            $stmt->execute();
            $db->commit();
            return true;
        } catch (PDOException $e) {
            $db->rollback();
        }
    }

    static function delete($table, $data)
    {
        $db = Connection::Init_connection();
        $stmt = $db->prepare(
            "DELETE FROM $table WHERE ID_ITEM=:id_item"
        );
        $stmt->bindParam(":id_item", $data, PDO::PARAM_INT);
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

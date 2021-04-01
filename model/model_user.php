<?php
class Model_User
{
    static function create($table, $data)
    {
        $stmt = Connection::Init_connection()->prepare("INSERT INTO $table VALUES (:name, :email, :password)");
        $db = Connection::Init_connection();
        $stmt = $db->prepare(
            "INSERT INTO $table VALUES (null, :name, :email, :password)"
        );
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        try {
            $db->beginTransaction();
            $stmt->execute();
            $row_id = $db->lastInsertId();
            $db->commit();
            return $row_id;
        } catch (PDOException $e) {
            $db->rollback();
        }
    }

    static function read($table, $data, $name)
    {
        if ($data == null && $name == null) {
            $stmt = Connection::Init_connection()->prepare("SELECT * FROM $table");
            $stmt->execute();
            return $stmt->fetchAll();
        } else if ($name == null) {
            $stmt = Connection::Init_connection()->prepare("SELECT * FROM $table WHERE id_user=:id_user");
            $stmt->bindParam(":id_user", $data, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Connection::Init_connection()->prepare(
                "SELECT * FROM $table WHERE nombre_user=:name AND password=:password"
            );
            $stmt->bindParam(":password", $data, PDO::PARAM_STR);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }
    }

    static function update($table, $data)
    {
        return true;
    }

    static function delete($table, $data)
    {
        return true;
    }
}

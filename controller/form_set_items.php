<?php
class Form_Set_Items
{

    public static function create()
    {
        if (
            isset($_POST["id_list"]) &&
            isset($_POST["items"]) &&
            isset($_POST["amount"])
        ) {

            $table = "LIST_ITEM";
            $data = array(
                "id_list" => $_POST["id_list"],
                "id_item" => $_POST["items"],
                "amount" => $_POST["amount"]
            );
            $response = Model_Item::create($table, $data);
            echo '<script type="text/javascript">
                 if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                    window.location.reload();
                 }
                 </script>';
            return $response;
        }
    }

    public static function select($table, $value)
    {
        $response = Model_Item::read($table, $value);
        return $response;
    }

    public static function update()
    {
        if (
            isset($_POST["id_list"]) &&
            isset($_POST["old_id_item"]) &&
            isset($_POST["new_id_item"]) &&
            isset($_POST["item_amount"])
        ) {
            $table = "LIST_ITEM";
            $data = array(
                "id_list" => $_POST["id_list"],
                "old_id_item" => $_POST["old_id_item"],
                "new_id_item" => $_POST["new_id_item"],
                "amount" => $_POST["item_amount"]
            );
            $response = Model_Item::update($table, $data);
            if ($response) {
                echo '<script type="text/javascript">
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                    window.location.reload();
                }
                </script>';
            }
        }
    }

    public static function delete()
    {
        if (
            isset($_POST["delete"]) &&
            isset($_POST["id_list"])
        ) {
            $table = "LIST_ITEM";
            $data = $_POST["delete"];
            $response = Model_Item::delete($table, $data);
            if ($response) {
                echo '<script type="text/javascript">
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                    window.location.reload();
                }
                </script>';
            }
        }
    }
}

<?php
class Form_Items
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
            isset($_POST["items"]) &&
            isset($_POST["amount"])
        ) {

            $table = "LIST_ITEM";
            $data = array(
                "id_list" => $_POST["id_list"],
                "id_item" => $_POST["items"],
                "amount" => $_POST["amount"]
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
        if (isset($_POST["delete"])) {
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

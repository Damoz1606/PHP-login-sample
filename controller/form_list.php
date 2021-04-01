<?php
class Form_List
{

    public static function create()
    {
        if (
            isset($_POST["id_user"]) &&
            isset($_POST["name_list"])
        ) {

            $table = "LIST";
            $data = array(
                "id_user" => $_POST["id_user"],
                "name_list" => $_POST["name_list"]
            );
            $response = Model_List::create($table, $data);
            echo '<script type="text/javascript">
                 if(window.history.replaceState){
                     window.history.replaceState(null, null, window.location.href);
                     window.location = "content.php?action=create&user=' . $_GET['user'] . '&id_list=' . $response . '&name=' . $_POST["name_list"] . '";
                 } </script>';
            return $response;
        }
    }

    public static function select($value)
    {
        $table = "LIST";
        $response = Model_List::read($table, $value);
        return $response;
    }

    public static function update()
    {
        if (
            isset($_POST["id_list"]) &&
            isset($_POST["used"])
        ) {

            $table = "LIST";
            $data = array(
                "id_list" => $_POST["id_list"],
                "used" => $_POST["used"]
            );
            $response = Model_List::update($table, $data);
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
            $table = "LIST";
            $data = $_POST["delete"];
            $response = Model_List::delete($table, $data);
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

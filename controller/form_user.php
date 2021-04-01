<?php
class Form_User
{
    static function create()
    {
        if (
            isset($_POST["name"]) &&
            isset($_POST["email"]) &&
            isset($_POST["password"])
        ) {

            $table = "PERSON";
            $data = array(
                "name" => $_POST["name"],
                "email" => $_POST["email"],
                "password" => $_POST["password"]
            );
            $response = Model_User::create($table, $data);
            if ($response != null) {
                echo '<script type="text/javascript">
                 if(window.history.replaceState){
                     window.history.replaceState(null, null, window.location.href);
                     window.location = "index.php";
                 } </script>';
            } else {
                echo '<script type="text/javascript">
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                } </script>';
                echo '<div class="alert alert-danger">Ya existe</div>';
            }
            return $response;
        }
    }

    static function sign_in()
    {
        if (
            isset($_POST["name"]) &&
            isset($_POST["password"])
        ) {
            $table = "PERSON";
            $response = Model_User::read($table, $_POST["password"], $_POST["name"]);
            if ($response["NOMBRE_USER"] == $_POST["name"] && $response["PASSWORD"] == $_POST["password"]) {
                $_SESSION["validate_user"] = true;
                echo '<script type="text/javascript">
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                    window.location = "content.php?home&user=' . $response["ID_USER"] . '";
                }
                </script>';
            } else {
                echo '<script type="text/javascript">
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                } </script>';
                echo '<div class="alert alert-danger">No existe</div>';
            }
        }
    }

    public static function select($value)
    {
        $table = "PERSON";
        $response = Model_User::read($table, $value, null);
        return $response;
    }

    public static function update()
    {
        if (
            isset($_POST["id_list"]) &&
            isset($_POST["used"])
        ) {

            $table = "PERSON";
            $data = array(
                "id_list" => $_POST["id_list"],
                "used" => $_POST["used"]
            );
            $response = Model_User::update($table, $data);
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
            $table = "PERSON";
            $data = $_POST["delete"];
            $response = Model_User::delete($table, $data);
            if ($response) {
                echo '<script type="text/javascript">
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                    //window.location.reload();
                }
                </script>';
            }
        }
    }
}

<?php

class Link
{
    static function get_sign_link($link)
    {
        if (
            $link == "login" ||
            $link == "signup"
        ) {
            $module = "./views/templates/login/" . $link . ".php";
        } else {
            $module = "./views/templates/login/login.php";
        }
        return $module;
    }

    static function get_link($link)
    {
        if (
            $link == "home" ||
            $link == "list" ||
            $link == "history" ||
            $link == "create"
        ) {
            $module = "./views/templates/user/" . $link . ".php";
        } else if ($link == 'logout') {
            session_destroy();
            echo '<script type="text/javascript">
                window.location = "index.php";
                </script>';
        } else {
            $module = "./views/templates/user/home.php";
        }
        return $module;
    }
}

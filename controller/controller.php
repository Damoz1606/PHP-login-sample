<?php

class Controller
{
    function get_sign_template()
    {
        include './views/sign_in.php';
    }

    function get_sign_page()
    {
        if (isset($_GET['log'])) {
            $link = $_GET['log'];
        } else {
            $link = "login";
        }
        $response = Link::get_sign_link($link);
        include $response;
    }

    function get_template()
    {
        include './views/template.php';
    }

    function get_page()
    {
        if (isset($_GET['action'])) {
            $link = $_GET['action'];
        } else {
            $link = "home";
        }
        $response = Link::get_link($link);
        include $response;
    }
}

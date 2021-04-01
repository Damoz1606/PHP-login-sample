<?php
require_once './controller/controller.php';
require_once './controller/link.php';
require_once './controller/form_list.php';
require_once './controller/form_set_items.php';
require_once './controller/form_items.php';
require_once './controller/form_user.php';
require_once './model/connection.php';
require_once './model/model_item.php';
require_once './model/model_list.php';
require_once './model/model_user.php';

$mvc = new Controller();
$mvc->get_template();

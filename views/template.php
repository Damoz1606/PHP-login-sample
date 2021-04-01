<?php
if (isset($_SESSION["validate_user"])) {
    if (!$_SESSION["validate_user"]) {
        echo '<script type="text/javascript">
                window.location = "index.php";
                </script>';
        return;
    }
}

if (!isset($_GET["user"]) || $_GET["user"] == null) {
    echo '<script type="text/javascript">
                window.location = "index.php";
                </script>';
    return;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./public/css/style.css">
</head>

<body>

    <header>
        <?php
        include './views/components/nav.php';
        ?>
    </header>

    <div class="container-fluid p-3 my-2">
        <?php
        $mvc = new Controller();
        $mvc->get_page();
        ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
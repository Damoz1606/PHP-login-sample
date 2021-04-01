<?php
$user = Form_User::select($_GET["user"]);
?>

<div class="container">
    <div class="home-card">
        <div class="card">
            <div class="card-body">
                <div class="card-text">
                    <div class="title-card">
                        <h1><?php echo $user['NOMBRE_USER'] ?></h1>
                    </div>
                    <hr>
                    <div class="text-card">
                        <p class="italic-text"><?php echo $user['EMAIL'] ?></p>
                    </div>
                </div>
                <hr>
                <div>
                    <form action="">
                        <div class="container items-right">
                            <a href="content.php?action=logout" class="btn btn-light">Log Out</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include './views/components/floating_btn.php';
?>
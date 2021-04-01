<?php
$menu = array(
    "home",
    "list",
    "history"
);
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav">
            <?php foreach ($menu as $key) : ?>
                <?php if (isset($_GET['action'])) : ?>
                    <?php if ($_GET['action'] == $key) : ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="content.php?action=<?php echo $key ?>&user=<?php echo $_GET['user'] ?>"><?php echo $key ?></a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="content.php?action=<?php echo $key ?>&user=<?php echo $_GET['user'] ?>"><?php echo $key ?></a>
                        </li>
                    <?php endif ?>
                <?php else : ?>
                    <?php if ($key == "home") : ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="content.php?action=<?php echo $key ?>&user=<?php echo $_GET['user'] ?>"><?php echo $key ?></a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="content.php?action=<?php echo $key ?>&user=<?php echo $_GET['user'] ?>"><?php echo $key ?></a>
                        </li>
                    <?php endif ?>
                <?php endif ?>
            <?php endforeach ?>
        </ul>
    </div>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="content.php?action=logout" class="nav-link">Log Out</a>
        </li>
    </ul>
</nav>
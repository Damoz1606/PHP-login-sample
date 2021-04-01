<?php

if (isset($_GET["id_list"])) {
    $id_list = $_GET["id_list"];
} else {
    echo '<script type="text/javascript">
                 if(window.history.replaceState){
                     window.history.replaceState(null, null, window.location.href);
                     window.location = "content.php?action=home&user=' . $_GET['user'] . '";
                 } </script>';
}

$items_list = Form_Set_Items::select('LIST_ITEM', $id_list);
$items = Form_Set_Items::select('ITEM', null);
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1><?php
                if (isset($_GET['name'])) {
                    echo $_GET['name'];
                } else {
                    echo "Undefined Name";
                }
                ?></h1>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="btn-group">
                    <a href="content.php?action=list&user=<?php echo $_GET['user'] ?>" class="btn btn-primary">Save</a>
                </div>
                <hr>
                <div>
                    <form action="" class="form-group" method="post">
                        <div class="form-input">
                            <select name="items" id="item" required>
                                <?php foreach ($items as $key => $value) : ?>
                                    <option value="<?php echo $value['ID_ITEM'] ?>"><?php echo $value['NAME'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-input">
                            <input type="number" name="amount" id="amount" min="0" value="0" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="id_list" value="<?php echo $id_list ?>">
                            <button type="submit" class="btn btn-primary"><span class="fa fa-plus"></span></button>
                            <?php
                            Form_Set_Items::create();
                            ?>
                        </div>
                    </form>
                    <div class="mt-1">
                        <table class="table table-sm table-light text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($items_list as $item_list => $value_list) : ?>
                                    <?php foreach ($items as $item => $value_item) : ?>
                                        <?php if ($value_list['ID_ITEM'] == $value_item['ID_ITEM']) : ?>
                                            <tr>
                                                <td><?php echo $value_item['NAME'] ?></td>
                                                <td><?php echo $value_list['AMOUNT'] ?></td>
                                                <td><?php echo sprintf('$%.2f', $value_item['PRICE']) ?></td>
                                                <td>
                                                    <form method="post">
                                                        <input type="hidden" name="id_list" value="<?php echo $id_list ?>">
                                                        <input type="hidden" name="delete" value="<?php echo $value_item['ID_ITEM'] ?>">
                                                        <form>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_modal" onclick="open_modal(<?php echo $value_list['ID_LIST'] ?>, <?php echo $value_item['ID_ITEM'] ?>, <?php echo $value_list['AMOUNT'] ?>)">Edit</button>
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </form>
                                                        <?php
                                                        Form_Items::delete();
                                                        ?>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include './views/components/item_modal.php';
?>
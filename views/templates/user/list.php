<?php
$user_list = Form_List::select($_GET['user']);
?>

<div id="accordion" class="container-fluid">
    <?php foreach ($user_list as $key => $value) : ?>
        <?php if ($value['USED'] == 1) : ?>
            <div class="card">
                <div class="card-header d-flex">
                    <button type="button" class="btn btn-light container d-flex p-2" data-toggle="collapse" data-target="#collapse_<?php echo $value['ID_LIST'] ?>" aria-expanded="true" aria-controls="collapse_<?php echo $value['ID_LIST'] ?>">
                        <div class="container text-center">
                            <h5 class="text-capitalize"><?php echo $value['NAME'] ?></h5>
                        </div>
                    </button>
                    <form method="post">
                        <input type="hidden" name="used" value="0">
                        <input type="hidden" name="id_list" value="<?php echo $value['ID_LIST'] ?>">
                        <div class="btn-group">
                            <a class="btn btn-warning pt-3 pb-3" href="content.php?action=create&user=<?php echo $_GET['user'] ?>&id_list=<?php echo $value['ID_LIST'] ?>&name=<?php echo $value['NAME'] ?>">Edit</a>
                            <button type="submit" class="btn btn-danger pt-3 pb-3">Process</button>
                            <?php
                            Form_List::update();
                            ?>
                        </div>
                    </form>
                </div>
                <?php
                $items_list = Form_Items::select('LIST_ITEM', $value['ID_LIST']);
                $items = Form_Items::select('ITEM', null);
                ?>
                <div id="collapse_<?php echo $value['ID_LIST'] ?>" class="collapse" data-parent="#accordion">
                    <div class="card-body">
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
            </div>
        <?php endif ?>
    <?php endforeach ?>

    <?php
    include './views/components/item_modal.php';
    include './views/components/floating_btn.php';
    ?>

</div>
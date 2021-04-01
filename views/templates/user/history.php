<?php
$user_list = Form_List::select($_GET['user']);
?>

<div class="container">
    <div class="d-flex justify-content-between flex-wrap">
        <?php foreach ($user_list as $key => $value) : ?>
            <?php if ($value['USED'] == 0) : ?>
                <button type="button" class="btn btn-light card m-4" data-toggle="modal" data-target="#show_list_<?php echo $value['ID_LIST'] ?>">
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="text-capitalize"><?php echo $value['NAME'] ?></h5>
                        </div>
                    </div>
                </button>
            <?php endif ?>
        <?php endforeach ?>
    </div>
</div>

<?php foreach ($user_list as $key => $value) : ?>
    <?php if ($value['USED'] == 0) : ?>
        <div class="modal fade" id="show_list_<?php echo $value['ID_LIST'] ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body container-fluid">
                        <div class="text-center">
                            <h5 id="list_title" class="text-capitalize"><?php echo $value['NAME'] ?></h5>
                        </div>
                        <div class="container">
                            <table class="table table-sm table-light text-center mt-1">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <?php
                                $items_list = Form_Items::select('LIST_ITEM', $value['ID_LIST']);
                                $items = Form_Items::select('ITEM', null);
                                ?>
                                <tbody>
                                    <?php foreach ($items_list as $item_list => $value_list) : ?>
                                        <?php foreach ($items as $item => $value_item) : ?>
                                            <?php if ($value_list['ID_ITEM'] == $value_item['ID_ITEM']) : ?>
                                                <tr>
                                                    <td><?php echo $value_item['NAME'] ?></td>
                                                    <td><?php echo $value_list['AMOUNT'] ?></td>
                                                    <td><?php echo sprintf('$%.2f', $value_item['PRICE']) ?></td>
                                                </tr>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form action="" method="post">
                            <input type="hidden" name="used" value="<?php echo $_GET['user'] ?>">
                            <input type="hidden" name="id_list" value="<?php echo $value['ID_LIST'] ?>">
                            <button type="submit" class="btn btn-warning">Restore</button>
                            <?php
                            Form_List::update();
                            ?>
                        </form>
                        <form action="" method="post">
                            <input type="hidden" name="delete" value="<?php echo $value['ID_LIST'] ?>">
                            <button type="submit" class="btn btn-danger"><span class="fa fa-trash"></button>
                            <?php
                            Form_List::delete();
                            ?>
                        </form>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
<?php endforeach ?>
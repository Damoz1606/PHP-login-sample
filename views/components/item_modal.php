<div class="modal fade" id="edit_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body container-fluid">
                <div class="container">
                    <?php
                    $items = Form_Items::select('ITEM', null);
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="form-input">
                                <select name="new_id_item" id="new_id_item" required>
                                    <?php foreach ($items as $key => $value) : ?>
                                        <option value="<?php echo $value['ID_ITEM'] ?>"><?php echo $value['NAME'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-input">
                                <input type="number" name="item_amount" id="item_amount" min="0" value="0" required>
                            </div>
                        </div>
                        <input type="hidden" name="id_list" value="" id="id_list">
                        <input type="hidden" name="old_id_item" value="" id="old_id_item">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <?php
                        Form_Set_Items::update();
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function open_modal(id_list, id_item, item_amount) {
        document.getElementById("id_list").setAttribute('value', id_list);
        document.getElementById("old_id_item").setAttribute('value', id_item);
        document.getElementById("item_amount").setAttribute('value', item_amount);

        var items = document.getElementById("new_id_item").childNodes;
        for (var i = 0, j = 0; i < items.length; i++) {
            console.log(items[i].value);
            if (items[i].value == undefined) {
                j++;
            } else if (items[i].value == id_item) {
                document.getElementById("new_id_item").selectedIndex = i - j;
            }
        }
    }
</script>
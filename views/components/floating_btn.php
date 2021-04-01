<a type="button" class="float" data-toggle="modal" data-target="#create_list">
    <span class="fa fa-plus float-icon"></span>
</a>


<div class="modal fade" id="create_list" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body container-fluid">
                <div class="text-center">
                    <h5 id="list_title">Create List</h5>
                </div>
                <div class="container">
                    <form action="" method="post">
                        <div class="form-input">
                            <input type="hidden" name="id_user" value="<?php echo $_GET['user'] ?>">
                            <input type="text" name="name_list" id="name_list" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <?php
                            Form_List::create();
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
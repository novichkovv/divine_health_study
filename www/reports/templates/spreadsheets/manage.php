<script type="text/javascript" src="<?php echo R_SITE_DIR; ?>js/jquery.nestable.js">
</script>
<h1>Manage Spreadsheets</h1>
<hr>
<div class="row">
    <div class="col-md-6">


        <form method="post" action="">
            <div class="row">
                <div class="form-group">
                    <div class="dd">
                        <ol class="dd-list">
                            <?php foreach($spreadsheets as $k => $field): ?>
                                <li class="dd-item" data-id="<?php echo $k; ?>">
                                    <div class="dd-handle">
                                        <?php echo $field['name']; ?>
                                    </div>
                                    <a class="btn btn-default btn-icon" style="position: relative; left: 270px; top: -38px;" href="<?php echo R_SITE_DIR . 'spreadsheets/add/?id=' . $field['id']; ?>">
                                        <span class="glyphicon glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a class="btn btn-default btn-icon delete_spreadsheet" data-toggle="modal" role="button" style="position: relative; left: 270px; top: -38px;" data-id="<?php echo $field['id']; ?>" href="#delete_modal">
                                        <span class="text-danger glyphicon glyphicon-remove-circle"></span>
                                    </a>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="<?php echo $k; ?>">
                                            <input type="text" class="form-control"  placeholder="field name" name="old[<?php echo $field['id']; ?>][name]" value="<?php echo $field['name']; ?>">
                                            <input type="hidden" id="pos_<?php echo $k; ?>" name="old[<?php echo $field['id']; ?>][position]" value="<?php echo $field['position']; ?>">
                                        </li>
                                    </ol>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <input name="save_changes_btn" value="Save" class="btn btn-primary" type="submit" />
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="delete_modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete Spreadsheet</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure?</p>
            </div>
            <div class="modal-footer">
                <form action="" method="post">
                    <input name="delete_id" id="delete_input" type="hidden" value="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="delete_btn" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function()
    {
        $('.dd').nestable({maxDepth:2});
        $('.dd').nestable('collapseAll');
        $('.dd').on('change', function(){
            var order = $('.dd').nestable('serialize');
            for(var i in order) {
                $("#pos_" + i).val(order[i]['id']);
            }
        });
    });

    $("body").on("click", ".delete_spreadsheet", function()
    {
        var id = $(this).attr('data-id');
        $("#delete_input").val(id);
    });
</script>
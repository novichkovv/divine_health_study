<h1>User Groups</h1>
<hr>
<div class="row">
    <div class="col-md-10">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Group Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($groups as $group): ?>
                <tr>
                    <td><?php echo $group['id']; ?></td>
                    <td><?php echo $group['group_name']; ?></td>
                    <th>
                        <a href="<?php echo R_SITE_DIR; ?>users/add_group/?id=<?php echo $group['id']; ?>" class="btn btn-default btn-icon">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="#delete_group_modal" class="btn btn-default btn-icon delete_group" data-id="<?php echo $group['id']; ?>" data-toggle="modal" role="button">
                            <span class="text-danger glyphicon glyphicon-remove-circle"></span>
                        </a>
                    </th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="delete_group_modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete Group</h4>
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
    $("body").on("click", ".delete_group", function()
    {
        var id = $(this).attr('data-id');
        $("#delete_input").val(id);
    });
</script>
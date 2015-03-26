<h1>Users</h1>
<hr>
<div class="row">
    <div class="col-md-10">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>First Name</th>
                <th>Group</th>
                <th>Login</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['user_name']; ?></td>
                    <td><?php echo $user['user_surname']; ?></td>
                    <td><?php echo $user['group_name']; ?></td>
                    <td><?php echo $user['login']; ?></td>
                    <td><?php echo $user['create_date']; ?></td>
                    <th>
                        <a href="<?php echo R_SITE_DIR; ?>users/add/?id=<?php echo $user['id']; ?>" class="btn btn-default btn-icon">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="#delete_user_modal" class="btn btn-default btn-icon delete_user" data-id="<?php echo $user['id']; ?>" data-toggle="modal" role="button">
                            <span class="text-danger glyphicon glyphicon-remove-circle"></span>
                        </a>
                    </th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="delete_user_modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete User</h4>
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
    $("body").on("click", ".delete_user", function()
    {
        var id = $(this).attr('data-id');
        $("#delete_input").val(id);
    });
</script>
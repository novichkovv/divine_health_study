<h1>Low Inventory Stock Reports Settings</h1>
<hr>
<div class="row">
    <div class="col-sm-6">
        <form method="post">
            <div class="form-group">
                <label>Enable :</label>
                <select name="enable" class="form-control">
                    <option value="1" <?php if($value['enable'] == 1) echo 'selected'; ?>>
                        Yes
                    </option>
                    <option value="0" <?php if($value['enable'] == 0) echo 'selected'; ?>>
                        No
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label>Notify if quantity less than or equals:</label>
                <input type="text" name="quantity" class="form-control" value="<?php echo $value['quantity']; ?>">
            </div>
            <div class="form-group">
                <label>Recievers:</label>
                <table class="table-bordered table">
                    <tr>
                        <th>Email</th>
                        <th>Delete</th>
                    </tr>
                    <?php if($value['email']): ?>
                    <?php foreach($value['email'] as $email): ?>
                        <tr>
                            <td><?php echo $email['email']; ?></td>
                            <td>
                                <a href="#delete_email" data-toggle="modal" data-id="<?php echo $email['id']; ?>" role="button" class="btn btn-icon btn-warning delete_email">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </table>
            </div>
            <div class="form-group">
                <label>Add Email</label>
                <div class="row">
                    <div class="col-sm-9">
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="col-sm-3">
                        <input type="submit" name="add_email" class="btn btn-info" value="add">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-lg btn-success" value="Save Settings" name="save_settings">
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="delete_email">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete email?</p>
            </div>
            <div class="modal-footer">
                <form method="post">
                    <input type="hidden" name="email" id="email_to_delete" value="">
                    <button type="submit" name="delete_email_button" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function()
    {
        $(".delete_email").click(function()
        {
            var val = $(this).attr('data-id');
            $("#email_to_delete").val(val);
        })
    });
</script>
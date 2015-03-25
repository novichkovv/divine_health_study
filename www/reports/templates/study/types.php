<h1>Page Types</h1>
<hr>
<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if($types): ?>
            <?php foreach($types as $type): ?>
                <tr>
                    <td><?php echo $type['type_name']; ?></td>
                    <td>
                        <a href="<?php echo R_SITE_DIR; ?>study/add_type/?id=<?php echo $type['id']; ?>" class="btn btn-default btn-icon">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="#delete_type_modal" data-toggle="modal" role="button" class="btn btn-default btn-icon">
                            <span class="glyphicon glyphicon-remove-circle text-danger"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
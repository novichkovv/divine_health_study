<script type="text/javascript" src="<?php echo R_SITE_DIR; ?>js/jquery.nestable.js">
</script>
<h1>Create Spreadsheet</h1>
<hr>
<div class="row">
    <div class="col-md-5">
        <form method="post" action="">
            <div class="row">
                <div class="form-group">
                    <input class="form-control" placeholder="spreadsheet_name" name="spreadsheet_name" value="<?php echo $spreadsheet['name'];?>">
                </div>
                <div class="form-group">
                    <div class="dd">
                        <ol class="dd-list">
                            <?php if($_GET['id']): ?>
                                <?php foreach($fields as $k => $field): ?>
                                    <li class="dd-item" data-id="<?php echo $k; ?>">
                                        <div class="dd-handle">
                                            <?php echo $field['name']; ?>
                                        </div>
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="<?php echo $k; ?>">
                                                <input type="text" class="form-control"  placeholder="field name" name="old[<?php echo $field['id']; ?>][name]" value="<?php echo $field['name']; ?>">
                                                <input type="hidden" id="pos_<?php echo $k; ?>" name="old[<?php echo $field['id']; ?>][position]" value="<?php echo $field['position']; ?>">
                                            </li>
                                        </ol>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php if($_GET['id']): ?>
                    <div class="form-group">
                        <label>Add new field</label>
                        <input class="form-control" placeholder="field name" name="new_name" value="">
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary" name="add_field_btn">
                    </div>
                </div>
            </div>
        </form>
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
</script>
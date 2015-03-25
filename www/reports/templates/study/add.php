<h1>Add Study Page</h1>
<hr>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Page Type</label>
                <select name="type" class="form-control">
                    <option value="">Choose Type</option>
                    <?php if($types): ?>
                        <?php foreach($types as $type): ?>
                            <option value="<?php echo $type['id']; ?>" <?php if($type['id'] == 1) echo 'selected'; ?>><?php echo $type['type_name']; ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="form">
            <?php if($_GET['id']): ?>
                <?php foreach($page['elements'] as $element): ?>
                    <?php if(file_exists(ROOT_DIR . 'templates' . DS . 'study' . DS . 'form_templates' . DS . $element['form_template'] . '.php')): ?>
                        <?php require_once(ROOT_DIR . 'templates' . DS . 'study' . DS . 'form_templates' . DS . $element['form_template'] . '.php'); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <button class="btn btn-info" name="add_page_btn"><?php echo ($_GET['id'] ?  'Save Page' : 'Add page'); ?></button>
        </div>
    </div>
</form>

<script type="text/javascript" src="../../js/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    //CKEDITOR.replace( 'ckeditor' );
    $ = jQuery.noConflict();
    $(document).ready(function()
    {
        $("select[name='type']").change(function()
        {
            var val = $(this).val();
            var params = {
                action: 'get_form',
                values: {'type': val},
                callback: function(msg) {
                    $("#form").html(msg);
                }
            };
            ajax(params);
//            $(".page_type").addClass('hidden');
//            $("#type_" + val).removeClass('hidden');
        });
    });
</script>
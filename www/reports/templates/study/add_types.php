<script type="text/javascript" src="<?php echo R_SITE_DIR; ?>js/jquery.nestable.js">
</script>
<h1><?php echo ($_GET['id'] ? 'Edit' : 'Add'); ?> Page Type</h1>
<hr>
<div class="row">
    <div class="col-md-6">
        <form method="post" action="">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="type_name" value="<?php echo $type['type_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description"><?php echo $type['description']; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="dd" style="width: 325px;">
                            <ol class="dd-list">
                                <?php if($type['elements']): ?>
                                    <?php $i = 0; ?>
                                    <?php foreach($type['elements'] as $id => $v): ?>
                                        <?php if($v): ?>
                                            <?php foreach($v as $field): ?>
                                                <li class="dd-item" data-id="<?php echo $i; ?>">
                                                    <div class="dd-handle">
                                                        <?php echo $field['name']; ?>
                                                    </div>
                                                    <a class="btn btn-default btn-icon delete_spreadsheet" data-toggle="modal" role="button" style="position: absolute; left: 330px; top: 0;" data-id="<?php echo $id; ?>" href="#delete_modal">
                                                        <span class="text-danger glyphicon glyphicon-remove-circle"></span>
                                                    </a>
                                                    <input id="pos_<?php echo $i; ?>" name="position[<?php echo $id; ?>][]" type="hidden" value="<?php echo $i; ?>">
                                                </li>
                                                <?php $i ++; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input name="save_changes_btn" value="Save" class="btn btn-primary" type="submit" />
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <h3>Add an Element</h3>
        <ul class="list-group">
            <?php foreach($elements as $element): ?>
            <li class="list-group-item add_element" data-id="<?php echo $element['id']; ?>" style="cursor: pointer;">
                <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="el_name"> <?php echo $element['name']; ?></span>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<div class="modal fade" id="delete_modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete Element</h4>
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

        $('.dd').nestable({maxDepth:1});
        $('.dd').nestable('collapseAll');
        $('.dd').on('change', function(){
            var order = $('.dd').nestable('serialize');
            console.log(order);
            for(var i in order) {
                $("#pos_" + i).val(order[i]['id']);
                $("#pos_" + i).attr('id', 'pos_' + order[i]['id']);
            }
        });
    });

    $('body').on('click', '.add_element', function()
    {
        var id = $(this).attr('data-id');
        var name = $(this).find('.el_name').html();
        var pos = $(".dd-list").children('.dd-item').length;
        var position = pos ? pos : 0;
        $(".dd-list").append('' +
            '<li class="dd-item" data-id="' + position + '">' +
            '   <div class="dd-handle">' +
                    name +
            '   </div>' +
            '   <a class="btn btn-default btn-icon delete_spreadsheet" data-toggle="modal" role="button" style="position: absolute; left: 330px; top: 0px;" data-id="' + id + '" href="#delete_modal">' +
            '       <span class="text-danger glyphicon glyphicon-remove-circle"></span>' +
            '   </a>' +
            '   <input id="pos_' + position + '" name="position[' + id + '][]" type="hidden" value="' + position + '">' +
            '</li>');
    });

    $("body").on("click", ".delete_spreadsheet", function()
    {
        var id = $(this).attr('data-id');
        $("#delete_input").val(id);
    });
</script>

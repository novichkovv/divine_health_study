<h1>Add Study Page</h1>
<hr>
<?php print_r($page); ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Page Type</label>
                <select name="type" class="form-control">
                    <option value="">Choose Type</option>
                    <option value="1">Text Page</option>
                    <option value="2">Video Page</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="form">

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <button class="btn btn-info" name="add_page_btn">Add page</button>
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
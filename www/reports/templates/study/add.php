<h1>Add Study Page</h1>
<hr>
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
<!--        <div id="type_1" class="hidden page_type">-->
<!--            <div class="col-md-6">-->
<!--                <div class="form-group">-->
<!--                    <label>Title*</label>-->
<!--                    <input type="text" value="" class="form-control" name="element[1][title]">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label>-->
<!--                        Load Image-->
<!--                        <input class="form-control" type="file" name="image">-->
<!--                    </label>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-10">-->
<!--                <div class="form-group">-->
<!--                    <label>Description</label>-->
<!--                    <textarea name="element[5][description]" class="ckeditor"></textarea>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <div id="type_2" class="hidden page_type">

        </div>
        <div id="type_3" class="hidden page_type">

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
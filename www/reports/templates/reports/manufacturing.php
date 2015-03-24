<h1>Product Manufacturing Time</h1>
<hr>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Product Manufacturing Time Table</h3>
            </div>
            <div class="panel-body">
                <div class="table">
                    <table class="table table-bordered" id="data_table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Manufacturing Time</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($products as $product): ?>
                                <tr>
                                    <td><?php echo $product['id'] ?></td>
                                    <td><?php echo $product['name'] ?></td>
                                    <td id="td_<?php echo $product['id'] ?>" class="td_editable inactive"><?php echo $product['days'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function()
    {
        $('body').click(function(e)
        {
            if(!$(e.target).hasClass('input_editable') && $(".input_editable").length) {
                var val = $(".input_editable").val();
                var td_id = $(".input_editable").attr('id').substr(6);
                var params = {
                    action: 'save_td',
                    values: {value: val, td_id: td_id},
                    callback: function(msg){}
                };
                ajax(params);
                if(val == '&nbsp;') val = '';
                $("#td_" + td_id).html(val);
                $("#td_" + td_id).addClass('inactive');
            }
        });

        $(".td_editable.inactive").click(function()
        {
            var td = $(this);
            setTimeout(function() {
                var td_id = $(td).attr('id').substr(3);
//                var tr = $(td).closest('tr');
//                var tr_id = $(tr).attr('id').substr(3);
                $(td).removeClass('inactive');
                if(!$(td).children('input').length) {
                    var val = $(td).html();
                    $(td).html('<input class="input_editable" id="input_' + td_id + '" name="days[' + td_id + ']" value="' + val + '" />');
                    $('#input_' + td_id).focus();
                }
            },100);
        });
    });

</script>
<h1>Spreadsheets</h1>
<hr>
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            <?php $i = true; ?>
            <?php foreach($tabs as $k => $tab): ?>
            <li class="<?php if($i) echo 'active'; ?>"><a href="#<?php echo $tab['id']; ?>" data-toggle="tab"><?php echo $tab['name']; ?></a></li>
            <?php $i = null; ?>
            <?php endforeach; ?>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <?php $i = true; ?>
            <?php foreach($tabs as $k => $tab): ?>
            <div class="tab-pane <?php if($i) echo 'active'; ?>" id="<?php echo $tab['id']; ?>">
                <br />
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <?php foreach($tab['fields'] as $field): ?>
                                <th>
                                    <?php echo $field['field']['field']; ?>
                                </th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($tab['fields'] as $key => $row): ?>
                        <tr id="tr_<?php echo $i; ?>">
                            <?php foreach($row['content'] as $field): ?>
                                <td class="td_editable inactive" id="td_<?php echo $i; ?>_<?php echo $field; ?>">
                                    <?php echo $field; ?>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                    <?php for($i = 1; $i < 10; $i ++): ?>
                        <tr id="tr_<?php echo $i; ?>">
                            <?php foreach($tab['fields'] as $field): ?>
                                <td class="td_editable inactive" id="td_<?php echo $i; ?>_<?php echo $field['field']['id_field']; ?>">
                                    &nbsp;
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endfor; ?>
                    </tbody>
                </table>
            </div>
            <?php $i = null; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function()
    {
        $('body').click(function(e)
        {
            if(!$(e.target).hasClass('textarea_editable') && $(".textarea_editable").length) {
                var val = $(".textarea_editable").val();
                var td_id = $(".textarea_editable").attr('id').substr(9);
                var params = {
                    action: 'save_td',
                    values: {value: val, td_id: td_id},
                    callback: function(msg){}
                };
                ajax(params);
                $("#td_" + td_id).html(val);
                $("#td_" + td_id).addClass('inactive');
            }
        });

        $(".td_editable.inactive").click(function()
        {
            var td = $(this);
            setTimeout(function() {
                var td_id = $(td).attr('id').substr(3);
                var tr = $(td).closest('tr');
                var tr_id = $(tr).attr('id').substr(3);
                $(td).removeClass('inactive');
                if(!$(td).children('textarea').length) {
                    $(td).html('<textarea class="textarea_editable" id="textarea_' + td_id + '" name="text[' + tr_id + '][' + td_id + ']"></textarea>');
                    $('#textarea_' + td_id + '').focus();
                }
            },100);
        });


    });
</script>




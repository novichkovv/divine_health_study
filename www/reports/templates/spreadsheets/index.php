<h1>Spreadsheets</h1>
<hr>
<div class="row">
    <div class="col-md-4 col-md-offset-8">
        <table border="0" id="color-grid">
            <tr>
                <td>
                    <div class="color" id="color-grey"></div>
                </td>
                <td> Split Order</td>
            </tr>
            <tr>
                <td>
                    <div class="color" id="color-red"></div>
                </td>
                <td> Cancel Order</td>
            </tr>
            <tr>
                <td>
                    <div class="color" id="color-yellow"></div>
                </td>
                <td> Customer Gives Compliment</td>
            </tr>
            <tr>
                <td>
                    <div class="color" id="color-blue"></div>
                </td>
                <td> Product Estimated Time to Arrive</td>
            </tr>
            <tr>
                <td>
                    <div class="color" id="color-green"></div>
                </td>
                <td> Suggestion Box</td>
            </tr>

        </table>
    </div>
</div>
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
                                    <?php echo $field; ?>
                                </th>
                            <?php endforeach; ?>
                            <th style="width: 170px;">Row color</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($tab['content']): ?>
                    <?php foreach($tab['content'] as $tr => $fields): ?>
                        <tr id="tr_<?php echo $tr; ?>" style="background-color: <?php echo $fields['color']; ?>">
                            <?php foreach($fields as $id_field => $field): ?>
                                <?php if(!is_array($field)) continue; ?>
                                <td class="td_editable inactive" id="td_<?php echo $tr . '_' . $id_field; ?>">
                                    <?php echo $field['content']; ?>
                                </td>
                            <?php endforeach; ?>
                            <td>
                                <div class="color" id="color-grey" data-color="#ccc"></div>
                                <div class="color" id="color-red" data-color="#ff4411"></div>
                                <div class="color" id="color-yellow" data-color="#cacc48"></div>
                                <div class="color" id="color-blue" data-color="#70a4cc"></div>
                                <div class="color" id="color-green" data-color="#67cc7a"></div>
                                <div class="color" id="color-white" data-color="#fff"></div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php for($i = $tr + 1; $i < $tr + 10; $i ++): ?>
                        <tr id="tr_<?php echo $i; ?>">
                            <?php foreach($tab['fields'] as $id_field => $field): ?>
                                <td class="td_editable inactive" id="td_<?php echo $i; ?>_<?php echo $id_field; ?>"></td>
                            <?php endforeach; ?>
                            <td>
                                <div class="color" id="color-grey" data-color="#ccc"></div>
                                <div class="color" id="color-red" data-color="#ff4411"></div>
                                <div class="color" id="color-yellow" data-color="#cacc48"></div>
                                <div class="color" id="color-blue" data-color="#70a4cc"></div>
                                <div class="color" id="color-green" data-color="#67cc7a"></div>
                                <div class="color" id="color-white" data-color="#fff"></div>
                            </td>
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
                var tr = $(td).closest('tr');
                var tr_id = $(tr).attr('id').substr(3);
                $(td).removeClass('inactive');
                if(!$(td).children('textarea').length) {
                    var val = $(td).html();
                    $(td).html('<textarea class="textarea_editable" id="textarea_' + td_id + '" name="text[' + tr_id + '][' + td_id + ']">' + val + '</textarea>');
                    //$('#textarea_' + td_id + '').val(val);
                    setCaretPosition(document.getElementById('textarea_' + td_id), 0);
                }
            },100);
        });

        $('body').on('click', '.color', function()
        {
            var color = $(this).attr('data-color');
            var position = $(this).closest('tr').attr('id').substr(3);
            var id = $(this).closest('.tab-pane').attr('id');
            $(this).closest('tr').css('background-color', color);
            var params = {
                action: 'save_color',
                values: {id: id, color: color, 'position': position },
                callback: function(msg){}
            };
            ajax(params);
        })


    });
    function setCaretPosition(ctrl, pos)
    {

        if(ctrl.setSelectionRange)
        {
            ctrl.focus();
            ctrl.setSelectionRange(pos,pos);
        }
        else if (ctrl.createTextRange) {
            var range = ctrl.createTextRange();
            range.collapse(true);
            range.moveEnd('character', pos);
            range.moveStart('character', pos);
            range.select();
        }
    }
</script>




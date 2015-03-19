/**
 * Created by novichkov on 25.02.15.
 */
var ajax = function ajax(params)
{
    if(!params.values)params.values = new Object;
    params.values.ajax = true;
    params.values.action = params.action;
    if(params.get_from_form)
    {
        $("#" + params.get_from_form + " input, #" + params.get_from_form + " textarea").each(function()
        {
            params.values[$(this).attr('name')] = $(this).val();
        });
    }

    $.ajax(
        {

            url: params.ulr ? params.url : '',
            type: 'post',
            data: params.values,
            success: function(result)
            {
                params.callback(result);
            }
        }
    )
};
$ = jQuery.noConflict();
$(document).ready(function()
{
    var body = $('body');
    $("#customers_by_products").keyup(function()
    {
        var value = $(this).val();
        var params = {
            action: 'product_suggest',
            values: {value: value},
            callback: function(msg)
            {
                $("#customers_by_products_suggest").html('');
                var result = JSON.parse(msg);
                for(var i in result) {
                    $("#customers_by_products_suggest").append('' +
                        '<div class="suggest_result" data-id="' + result[i]['id'] + '">' + result[i]['value'] + '</div>' +
                        '');
                }
            }
        };
        ajax(params);
        body.on('click', '.suggest_result', function()
        {
            $("#customers_by_products").val($(this).html());
            $("#product_id").val($(this).attr('data-id'));
            $("#customers_by_products_suggest").html('');
//            setTimeout(function() {$("#customers_by_products_form").submit()}, 200);
        });
        $(body).on('mouseover', '.suggest_result', function()
        {
            $(this).css({'background-color': '#eee'});
        });
        $(body).on('mouseout', '.suggest_result', function()
        {
            $(this).css({'background-color': '#fff'});
        });
    });


});


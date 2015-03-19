<h1>Reviews</h1>
<hr />
<div id="pre_loader">
    <img src="<?php echo R_SITE_DIR; ?>images/712.GIF">
</div>
<div id="post_loader">
    <div class="row">
        <div class="col-md-10col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Customer reviews</h3>
                </div>
                <div class="panel-body">
                    <div class="table">
                        <table class="table table-bordered" id="data_table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Rate</th>
                                <th>Review</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($reviews as $row): ?>
                                <tr id="tr_<?php echo $row['id']; ?>" class="show_review <?php if(!$row['read_mark']) echo 'new'; ?>">
                                    <td>
                                        <?php echo $row['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['rate']; ?>
                                    </td>
                                    <td>
                                        <?php echo substr($row['review'], 0, 10) . '&rarr;'; ?>
                                    </td>
                                    <td>
                                        <?php echo date('M d, Y H:i', strtotime($row['create_date'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="row">-->
<!--        <div class="col-md-8 col-md-offset-2 col-md-offset-1 col-sm-10">-->
<!--            <form action="" method="post">-->
<!--                <button class="btn btn-lg btn-default" type="submit" name="export"><i class="glyphicon glyphicon-download-alt"></i> Export in CSV</button>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
</div>
<div class="modal fade" id="review_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Review Text</h4>
            </div>
            <div class="modal-body">
                <p id="review_text">
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function()
    {
        var table = $('#data_table').DataTable({
            "aaSorting" : [],
            fnDrawCallback: function () {
                $("#post_loader").show();
                $("#pre_loader").hide();
            }
        });
        $(".show_review").click(function()
        {
            var id = $(this).attr('id').substr(3);
            var params = {
                'action': 'show_review',
                'values': {'id': id},
                'callback': function(msg)
                {
                    $("#review_text").html(msg);
                    $("#tr_" + id).removeClass('new');
                    var c = parseInt($("#new_reviews_badge").html()) - 1;
                    $("#new_reviews_badge").html(c ? c : '');
                }

            };
            ajax(params);
            $("#review_modal").modal("show");
        });


    });
</script>
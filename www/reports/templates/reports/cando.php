<h1>Can Do Challenge Subscribers</h1>
<hr />
<div id="pre_loader">
    <img src="<?php echo R_SITE_DIR; ?>images/712.GIF">
</div>
<div id="post_loader">
    <div class="row">
        <div class="col-md-10col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Can Do Challenge Subscribers</h3>
                </div>
                <div class="panel-body">
                    <div class="table">
                        <table class="table table-bordered" id="data_table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Emails sent</th>
                                <th>Sign Up Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($res as $row): ?>
                                <tr>
                                    <td>
                                        <?php echo $row['ID']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['user_nicename']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['user_email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['sent']; ?>
                                    </td>
                                    <td>
                                        <?php echo date('M d, Y H:i', strtotime($row['sdate'])); ?>
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
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-md-offset-1 col-sm-10">
            <form action="" method="post">
                <button class="btn btn-lg btn-default" type="submit" name="export"><i class="glyphicon glyphicon-download-alt"></i> Export in CSV</button>
            </form>
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
});
</script>
<h1>Customers By Products Statistics</h1>
<hr>
<form id="customers_by_products_form" method="post" action="">
<div class="row">
    <div class="col-sm-6">


            <div class="form-group">
                <label for="customers_by_products_search">Enter Product Name</label>
                <div class="row">
                    <div class="col-xs-10">
                        <input type="text" id="customers_by_products" name="name"
                               class="form-control" autocomplete="off" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                        <div id="customers_by_products_suggest">

                        </div>
                    </div>
                    <div class="col-xs-2">
                        <input type="submit" name="customers_by_products_btn" value="search" class="btn btn-primary">
                    </div>
                </div>
                <input type="hidden" id="product_id" name="product_id" value="<?php echo htmlspecialchars($_POST['product_id']); ?>">

            </div>
    </div>
</div>
<?php if($res): ?>
<div class="row">
    <div class="col-md-10 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $_POST['name']; ?> Customers</h3>
            </div>
            <div class="panel-body">
                <div class="table">
                    <table class="table table-bordered" id="data_table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($res as $row): ?>
                        <tr>
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                            <td>
                                <?php echo $row['email']; ?>
                            </td>
                            <td>
                                <?php echo $row['address']; ?>
                            </td>
                            <td>
                                <?php echo $row['phone']; ?>
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
<script type="text/javascript">
    jQuery(document).ready(function()
    {
        jQuery('#data_table').DataTable({
            "aaSorting" : []
        });
    });
</script>
<?php endif; ?>
</form>

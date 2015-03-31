<h1>Low Inventory Stock Products List</h1>
<h3><div class="text-danger"><?php echo $warning; ?></div> </h3>
<div class="row">
    <div class="form-group">
        <form method="get">
            <label>Show with quantity less than:</label>
            <div class="row">
                <div class="col-xs-4 col-sm-2">
                    <select name="quantity" class="form-control">
                        <?php for($i = 1; $i <= 10; $i ++): ?>
                            <option value="<?php echo $i; ?>" <?php if((!isset($_GET['quantity']) && $i == 3) || $_GET['quantity'] == $i ) echo 'selected'; ?>>
                                <?php echo $i; ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-xs-4">
                    <input type="submit" class="btn btn-info" value="Show">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Low Inventory Stock Products List</h3>
            </div>
            <div class="panel-body">
                <div class="table">
                    <table class="table table-bordered" id="data_table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>SKU</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Min Stock</th>
                            <th>Manufacturer</th>
                            <th>Contact Name</th>
                            <th>Contact #</th>
                            <th>Contact Email</th>
                            <th>Cost</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($products as $v): ?>
                            <tr>
                                <th><?php echo $v['product_id']; ?></th>
                                <th><?php echo $v['sku']; ?></th>
                                <th><?php echo $v['name']; ?></th>
                                <th><?php echo ceil($v['m']);?></th>
                                <th><?php echo $v['minimum']; ?></th>
                                <th><?php echo $v['manufacturer']; ?></th>
                                <th><?php echo $v['contact_name']; ?></th>
                                <th><?php echo $v['contact_phone']; ?></th>
                                <th><?php echo $v['contact_email']; ?></th>
                                <th><?php echo $v['cost']; ?></th>
                                <th>
                                    <a target="_blank" class="btn btn-icon btn-default" href="<?php echo SITE_DIR . 'index.php/admin/catalog_product/edit/id/' . $v['product_id']; ?>/">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                </th>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
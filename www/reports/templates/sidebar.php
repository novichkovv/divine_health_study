<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li <?php if($this->controller_name == 'index') echo 'class="active"'; ?>>
            <a href="<?php echo R_SITE_DIR; ?>">Dashboard</a>
        </li>
        <li <?php if($this->action_name == 'customers_by_products') echo 'class="active"'; ?>>
            <a href="<?php echo R_SITE_DIR; ?>reports/customers_by_products/">Customers By Product</a>
        </li>

        <li <?php if($this->action_name == 'detox') echo 'class="active"'; ?>>
            <a href="<?php echo R_SITE_DIR; ?>reports/detox/">21 Day Detox</a>
        </li>
        <li <?php if($this->action_name == 'cando') echo 'class="active"'; ?>>
            <a href="<?php echo R_SITE_DIR; ?>reports/cando/">Can Do Challenge</a>
        </li>
        <li <?php if($this->action_name == 'low_stock') echo 'class="active"'; ?>>
            <a href="<?php echo R_SITE_DIR; ?>reports/low_stock/">Low Inventory Products</a>
        </li>
    </ul>
    <ul class="nav nav-sidebar">
        <li <?php if($this->action_name == 'slider') echo 'class="active"'; ?>>
            <a href="<?php echo R_SITE_DIR; ?>tools/slider/">Slider Tools</a>
        </li>
        <li <?php if($this->controller_name == '') echo 'class="active"'; ?>>
            <a href="<?php echo R_SITE_DIR; ?>reports/signature/">Signature Creator</a>
        </li>
        <li>
            <a target="_blank" href="https://secure-wms.com/PresentationTier/LoginForm.aspx?3pl=%7b6064ea56-7ff3-4dbc-a382-35e9cf769d4c%7d">Planet Fulfillment Backend</a>
        </li>
        <li>
            <a target="_blank" href="https://docs.google.com/spreadsheets/d/1S0h5O7bG1wVVWwwQ3TKY3U0f7SZhcRQ0gaXFMF-yh5k/edit?usp=sharing">Planet Fulfillment Customer Service Requests</a>
        </li>
    </ul>
</div>
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
        <li <?php if($this->action_name == 'manufacturing') echo 'class="active"'; ?>>
            <a href="<?php echo R_SITE_DIR; ?>reports/manufacturing/">Product Manufacturing Times</a>
        </li>
    </ul>
    <ul class="nav nav-sidebar">
        <li <?php if($this->action_name == 'slider') echo 'class="active"'; ?>>
            <a href="<?php echo R_SITE_DIR; ?>tools/slider/">Slider Tools</a>
        </li>
        <li <?php if($this->controller_name == 'signature') echo 'class="active"'; ?>>
            <a href="<?php echo R_SITE_DIR; ?>reports/signature/">Signature Creator</a>
        </li>
        <li <?php if($this->controller_name == 'index') echo 'class="active"'; ?>>
            <a href="<?php echo R_SITE_DIR; ?>reviews/index/">Reviews &nbsp;&nbsp;&nbsp; <span class="badge" id="new_reviews_badge"><?php echo registry::get('new_reviews'); ?></span></a>
        </li>
        <li>
            <a target="_blank" href="https://secure-wms.com/PresentationTier/LoginForm.aspx?3pl=%7b6064ea56-7ff3-4dbc-a382-35e9cf769d4c%7d">Planet Fulfillment Backend</a>
        </li>
        <li>
            <a target="_blank" href="https://docs.google.com/spreadsheets/d/1S0h5O7bG1wVVWwwQ3TKY3U0f7SZhcRQ0gaXFMF-yh5k/edit?usp=sharing">Planet Fulfillment Customer Service Requests</a>
        </li>
    </ul>
    <ul class="nav nav-sidebar">
        <li <?php if($this->action_name == 'list') echo 'class="active"'; ?>>
            <a href="<?php echo R_SITE_DIR; ?>study/">Tutor Pages</a>
        </li>
        <li <?php if($this->controller_name == 'add') echo 'class="active"'; ?>>
            <a href="<?php echo R_SITE_DIR; ?>study/add/">Add Page</a>
        </li>
        <li <?php if($this->controller_name == 'quiz') echo 'class="active"'; ?>>
            <a target="_blank" href="">Add Quiz</a>
        </li>
    </ul>
    <ul class="nav nav-sidebar">
        <li <?php if($this->controller_name == 'spreadsheets' && $this->action_name == '') echo 'class="active"'; ?>>
            <a href="<?php echo R_SITE_DIR; ?>spreadsheets/">Spreadsheets</a>
        </li>
        <li <?php if($this->controller_name == 'spreadsheets' && $this->action_name == 'add') echo 'class="active"'; ?>>
            <a href="<?php echo R_SITE_DIR; ?>spreadsheets/add/">Add Spreadsheet</a>
        </li>
        <li <?php if($this->controller_name == 'spreadsheets' && $this->action_name == 'manage') echo 'class="active"'; ?>>
            <a href="<?php echo R_SITE_DIR; ?>spreadsheets/manage/">Manage Spreadsheet</a>
        </li>
    </ul>
</div>
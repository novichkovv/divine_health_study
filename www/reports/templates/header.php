<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Divine Health Reports</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Dashboard</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo R_SITE_DIR; ?>settings/low_stock/">Low Inventory</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" onclick="document.getElementById('logout-form').submit();">Log Out</a></li>
                    </ul>
                </li>
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</div>
<form id="logout-form" method="post" action="<?php echo R_SITE_DIR; ?>">
    <input type="hidden" name="logout" value="1">
</form>
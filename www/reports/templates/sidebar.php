<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <?php foreach($sidebar as $k => $v): ?>
            <li class="<?php if($_REQUEST['route'] == $v['route'] && !$v['children'])echo 'active'; ?>">
                <a href="<?php if(!$v['external']) echo R_SITE_DIR; ?><?php echo $v['route']; ?>"
                   class="<?php if(!$v['route'])echo "parent"; ?> <?php if($v['children']) echo 'sidebar_parent'; ?>">
                    <?php echo $v['route_name']; ?><?php if($v['children']) echo '<span class="pull-right glyphicon glyphicon-chevron-down text-muted"></span>'; ?>
                </a>
                <?php if($v['children']): ?>
                    <ul style="list-style-type: none; display: none;" class="sidebar_children nav">
                        <?php foreach($v['children'] as $child): ?>
                            <li class="<?php if($_REQUEST['route'] == $child['route'])echo 'active_child'; ?> sidebar_child">
                                <a href="<?php if(!$child['external']) echo R_SITE_DIR; ?><?php echo $child['route']; ?>"><?php echo $child['route_name']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function() {
        $(".sidebar_parent").click(function(e) {
            e.preventDefault();
            $(this).parent().find('.sidebar_children').slideToggle(100);
        })
    });
    if($(".active_child").length) {
        $(".active_child").closest('.sidebar_children').show();
    }
</script>

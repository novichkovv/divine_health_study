<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <?php foreach($sidebar as $k => $v): ?>
            <li>
                <a href="<?php if(!$v['external']) echo R_SITE_DIR; ?><?php echo $v['route']; ?>" class="<?php if(!$v['route'])echo "parent"; ?>"><?php echo $v['route_name']; ?></a>
                <?php if($v['children']): ?>
                    <ul>
                        <?php foreach($v['children'] as $child): ?>
                            <li>
                                <a href="<?php if(!$child['external']) echo R_SITE_DIR; ?><?php echo $child['route']; ?>"><?php echo $child['route_name']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

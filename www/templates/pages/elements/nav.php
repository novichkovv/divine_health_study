<?php
    $page_number = 10;
?>
<section>
    <div class="row nav-row">
        <div class="nav-container" style="width: <?php echo ($page_number*24 + 140); ?>px">
            <?php if($_GET['number'] == 1): ?>
                <div class="nav-part previous-inactive-nav"></div>
            <?php endif; ?>
            <?php if($_GET['number'] != 1): ?>
                <a href="<?php echo SITE_DIR; ?>page/?number=<?php echo ($_GET['number'] - 1); ?>" class="nav-part previous-nav"></a>
            <?php endif; ?>
            <?php for($i = 1; $i <= $page_number; $i ++ ): ?>
                <?php if($_GET['number'] == $i): ?>
                    <div class="nav-part active-nav"></div>
                <?php endif; ?>
                <?php if($_GET['number'] != $i): ?>
                    <a href="<?php echo SITE_DIR; ?>page/?number=<?php echo $i; ?>" class="nav-part inactive-nav"></a>
                <?php endif; ?>
            <?php endfor; ?>
            <?php if($_GET['number'] == $page_number): ?>
                <div class="nav-part next-inactive-nav"></div>
            <?php endif; ?>
            <?php if($_GET['number'] != $page_number): ?>
                <a href="<?php echo SITE_DIR; ?>page/?number=<?php echo ($_GET['number'] + 1); ?>" class="nav-part next-nav"></a>
            <?php endif; ?>
        </div>
    </div>
</section>
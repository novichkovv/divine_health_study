<section id="intro" class="intro-small" xmlns="http://www.w3.org/1999/html">
</section>
<section>
    <div class="container main-content">
        <div class="row">
            <div class="col-md-10">
                <?php foreach($elements as $element): ?>
                    <?php if(file_exists(ROOT_DIR . 'templates' . DS . 'pages' . DS . 'elements' . DS . $element['template'] . '.php')): ?>
                        <?php require_once('elements' . DS . $element['template'] . '.php'); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php require_once(TEMPLATE_DIR . 'pages' . DS . 'elements' . DS . 'nav.php'); ?>

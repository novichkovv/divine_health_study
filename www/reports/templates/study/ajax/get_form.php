<?php foreach($elements as $element): ?>
    <?php foreach($elements as $element): ?>
        <?php if(file_exists(ROOT_DIR . 'templates' . DS . 'study' . DS . 'form_templates' . DS . $element['form_template'] . '.php')): ?>
            <?php require_once(ROOT_DIR . 'templates' . DS . 'study' . DS . 'form_templates' . DS . $element['form_template'] . '.php'); ?>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach;
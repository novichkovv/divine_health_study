<?php if($type['elements']): ?>
    <?php foreach($type['elements'] as $els): ?>
        <?php if($els): ?>
        <?php foreach($els as $element): ?>
            <?php if(file_exists(ROOT_DIR . 'templates' . DS . 'study' . DS . 'form_templates' . DS . $element['form_template'] . '.php')): ?>
                <?php require_once(ROOT_DIR . 'templates' . DS . 'study' . DS . 'form_templates' . DS . $element['form_template'] . '.php'); ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif;
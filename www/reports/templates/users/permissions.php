<h1>User Permissions</h1>
<hr>
<form method="post" action="">
<div class="row">
    <?php foreach($result as $id_group => $v): ?>
        <div class="col-md-4 col-sm-6">
            <h3><?php echo $v['group_name']; ?></h3>
            <ul>
                <?php foreach($v['routes'] as $route): ?>
                    <li>
                        <label class="checkbox">
                            <input type="checkbox" class="parent_perm" name="permission[<?php echo $id_group; ?>][]" value="<?php echo $route['id']; ?>" <?php if($route['checked']) echo 'checked'; ?>>
                            <?php echo $route['route_name']; ?>
                        </label>
                        <?php if($route['children']): ?>
                            <ul>
                                <?php foreach($route['children'] as $child): ?>
                                    <li>
                                        <input type="checkbox" class="child_perm" name="permission[<?php echo $id_group; ?>][]" value="<?php echo $child['id']; ?>" <?php if($child['checked']) echo 'checked'; ?>>
                                        <?php echo $child['route_name']; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endforeach; ?>
</div>
<div class="row">
    <div class="col-md-5">
        <input class="btn btn-primary" type="submit" name="save_permissions_btn" value="Save">
    </div>
</div>
</form>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function(){
          $(".parent_perm").change(function(){
              if(!$(this).prop('checked')) {
                  $(this).closest('li').find('.child_perm').each(function()
                  {
                      $(this).prop('checked', false);
                  })
              } else {
                  $(this).closest('li').find('.child_perm').each(function()
                  {
                      $(this).prop('checked', true);
                  })
              }
          });
        $('.child_perm').change(function() {
            if($(this).prop('checked')) {
//                if($(this).closest('li').closest('li').find('.parent_perm').prop('checked', false)) {
                    $(this).closest('ul').closest('li').find('.parent_perm').prop('checked', true);
//                }
            }
        });
    });
</script>
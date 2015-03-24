<script type="text/javascript" src="<?php echo R_SITE_DIR; ?>js/jquery.nestable.js">
</script>
<h1>Study Pages</h1>
<hr>

<div class="row">
   <div class="col-md-6">
       <div class="dd">
           <form id="pages_form">
               <ol class="dd-list">
                   <?php foreach($pages as $k => $page): ?>
                       <li class="dd-item" data-id="<?php echo $k; ?>">
                           <div class="dd-handle">
                               <?php echo $page['title']; ?>

                           </div>
                           <a style="position: relative; left: 320px; top: -28px;" href="<?php echo R_SITE_DIR . 'study/add/?id=' . $page['id']; ?>"><span class="glyphicon glyphicon-pencil"></span> </a>

                           <ol class="dd-list">
                               <li class="dd-item" data-id="<?php echo $k; ?>">
                                   <input type="text" class="form-control"  placeholder="Page title" name="old[<?php echo $page['id']; ?>][title]" value="<?php echo $page['title']; ?>">
                                   <input type="hidden" id="pos_<?php echo $k; ?>" name="old[<?php echo $page['id']; ?>][position]" value="<?php echo $page['position']; ?>">
                               </li>
                           </ol>
                       </li>
                   <?php endforeach; ?>
               </ol>
           </form>
       </div>
   </div>
</div>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function()
    {
        $('.dd').nestable({maxDepth:2});
        $('.dd').nestable('collapseAll');
        $('.dd').on('change', function(){
            var order = $('.dd').nestable('serialize');
            for(var i in order) {
                $("#pos_" + i).val(order[i]['id']);
                var params = {
                    action: 'change_pages_position',
                    get_from_form: 'pages_form',
                    callback: function(msg) {}
                };
                ajax(params);
            }
        });
    });
</script>
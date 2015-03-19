<h1>Slideshow Tool</h1>
<hr>
<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-xs-12">
            <a href="#add_slide_modal" role="button" data-toggle="modal" class="btn btn-info">
                <span class="glyphicon glyphicon-plus"></span> Add Slide
            </a>
            <input type="submit" class="btn btn-primary" name="save_slideshow_btn" value="Save All" />
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-12">
            <?php foreach($slider as $slide): ?>
                <div class="panel panel-success with-padding">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Active</label>
                                        <div >
                                            <label class="radio-inline">
                                                <input type="radio" name="slide[<?php echo $slide['banner7_id']; ?>][status]" value="1" <?php if($slide['status'] == 1)echo 'checked'; ?> />
                                                Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="slide[<?php echo $slide['banner7_id']; ?>][status]" value="2" <?php if($slide['status'] == 2)echo 'checked'; ?> />
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Order</label>
                                        <input type="text" value="<?php echo $slide['order']; ?>" name="slide[<?php echo $slide['banner7_id']; ?>][order]" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="slide[<?php echo $slide['banner7_id']; ?>][title]" value="<?php echo $slide['title']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="slide[<?php echo $slide['banner7_id']; ?>][link]" value="<?php echo $slide['link']; ?>" />
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <label>Image</label><br>
                            <?php echo str_replace(array('yoururl', '"80px"'), array(SITE_DIR . 'media', '"120px"'), $slide['image']); ?>
                            <div class="form-group">
                                <label>Change Image</label>
                                <input class="form-control" type="file" name="image[<?php echo $slide['banner7_id']; ?>]" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="#delete_slide_modal" data-id="<?php echo $slide['banner7_id']; ?>" data-toggle="modal" class="delete_slide btn btn-warning btn-icon" role="button">
                                <span class="glyphicon glyphicon-remove"></span> Delete Slide
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="modal fade" id="add_slide_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Slide</h4>
                </div>
                <div class="modal-body with-padding">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Image</label>
                                <input class="form-control" type="file" name="image[0]" />
                            </div>
                            <div class="form-group">
                                <label>Active</label>
                                <div >
                                    <label class="radio-inline">
                                        <input type="radio" name="slide[0][status]" value="1" checked />
                                        Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="slide[0][status]" value="2" />
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Order</label>
                                <input type="text" value="" name="slide[0][order]" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="slide[0][title]" value="" />
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control" name="slide[0][link]" value="" />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="save_slideshow_btn" value="Save All" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="modal fade" id="delete_slide_modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete Slide</h4>
            </div>
            <div class="modal-body with-padding">
                Are You sure You want to delete the Slide?
            </div>
            <form method="post" action="">
                <div class="modal-footer">
                    <input type="hidden" id="slide_to_delete" name="slide_id" value="" />
                    <input type="submit" class="btn btn-primary" name="delete_slide_btn" value="Delete" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function()
    {
        $(".delete_slide").click(function()
        {
            var id = $(this).attr('data-id');
            $("#slide_to_delete").val(id);
        });
    });
</script>


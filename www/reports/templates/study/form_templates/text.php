<div class="col-md-10">
    <div class="form-group">
        <label>Description</label>
        <textarea name="element[5][description]" id="ckeditor" class="ckeditor"><?php echo $element['text']; ?></textarea>
    </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace( 'ckeditor' );
</script>
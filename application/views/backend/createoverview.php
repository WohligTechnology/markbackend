<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Create overview</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createoverviewsubmit");?>' enctype= 'multipart/form-data'>
<div class="row">
<div class="input-field col s12">
<textarea name="content" class="materialize-textarea" length="400"><?php echo set_value( 'content');?></textarea>
<label>content</label>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
<a href="<?php echo site_url("site/viewoverview"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
</div>
</div>
</form>
</div>

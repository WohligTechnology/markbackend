<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Create brand</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createbrandsubmit");?>' enctype= 'multipart/form-data'>
<div class="row">
<div class="input-field col s6">
<label for="name">name</label>
<input type="text" id="name" name="name" value='<?php echo set_value('name');?>'>
</div>
</div>
<div class="row">
<div class="input-field col s12">
<textarea name="about" class="materialize-textarea" length="400"><?php echo set_value( 'about');?></textarea>
<label>about</label>
</div>
</div>
<div class="row">
<div class="input-field col s12">
<textarea name="salonexp" class="materialize-textarea" length="400"><?php echo set_value( 'salonexp');?></textarea>
<label>salonexp</label>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="mainimage">mainimage</label>
<input type="text" id="mainimage" name="mainimage" value='<?php echo set_value('mainimage');?>'>
</div>
</div>
<div class="row">
<div class="input-field col s12">
<textarea name="collectionname" class="materialize-textarea" length="400"><?php echo set_value( 'collectionname');?></textarea>
<label>collectionname</label>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="content">content</label>
<input type="text" id="content" name="content" value='<?php echo set_value('content');?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="videourl">videourl</label>
<input type="text" id="videourl" name="videourl" value='<?php echo set_value('videourl');?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="type">type</label>
<input type="text" id="type" name="type" value='<?php echo set_value('type');?>'>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
<a href="<?php echo site_url("site/viewbrand"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
</div>
</div>
</form>
</div>

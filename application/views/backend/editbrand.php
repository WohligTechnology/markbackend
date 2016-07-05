<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Edit brand</h4>
</div>
</div>
<div class="row">
<form class='col s12' method='post' action='<?php echo site_url("site/editbrandsubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<div class="row">
<div class="input-field col s6">
<label for="name">name</label>
<input type="text" id="name" name="name" value='<?php echo set_value('name',$before->name);?>'>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<label>about</label>
<textarea name="about" placeholder="Enter text ..."><?php echo set_value( 'about',$before->about);?></textarea>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<label>salonexp</label>
<textarea name="salonexp" placeholder="Enter text ..."><?php echo set_value( 'salonexp',$before->salonexp);?></textarea>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="mainimage">mainimage</label>
<input type="text" id="mainimage" name="mainimage" value='<?php echo set_value('mainimage',$before->mainimage);?>'>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<label>collectionname</label>
<textarea name="collectionname" placeholder="Enter text ..."><?php echo set_value( 'collectionname',$before->collectionname);?></textarea>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="content">content</label>
<input type="text" id="content" name="content" value='<?php echo set_value('content',$before->content);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="videourl">videourl</label>
<input type="text" id="videourl" name="videourl" value='<?php echo set_value('videourl',$before->videourl);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="type">type</label>
<input type="text" id="type" name="type" value='<?php echo set_value('type',$before->type);?>'>
</div>
</div>
<div class="row">
<div class="col s6">
<button type="submit" class="btn btn-primary waves-effect waves-light  blue darken-4">Save</button>
<a href='<?php echo site_url("site/viewbrand"); ?>' class='btn btn-secondary waves-effect waves-light red'>Cancel</a>
</div>
</div>
</form>
</div>

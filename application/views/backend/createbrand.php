<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Create brand</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createbrandsubmit");?>' enctype= 'multipart/form-data'>
<div class="row">
<div class="input-field col s6">
<label for="name">Brand Name</label>
<input type="text" id="name" name="name" value='<?php echo set_value('name');?>'>
</div>
</div>
<div class="row"><label>About</label>
<div class="input-field col s12">
<textarea id="some-textarea" name="about" class="materialize-textarea" length="400"><?php echo set_value( 'about');?></textarea>

</div>
</div>
<div class="row"><label>Salon Experience</label>
<div class="input-field col s12">
<textarea id="some-textarea" name="salonexp" class="materialize-textarea" length="400"><?php echo set_value( 'salonexp');?></textarea>

</div>
</div>
<div class="row">
			<div class="file-field input-field col m6 s12">
				<div class="btn blue darken-4">
					<span>Image</span>
					<input name="image" type="file" multiple>
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image');?>">
				</div>
			</div>
		</div>
		<div class="row">
    <div class="input-field col s6">
    <label for="videourl">Collection Name</label>
    <input type="text" id="collectionname" name="collectionname" value='<?php echo set_value('collectionname');?>'>
    </div>
    </div>
<div class="row"><label>Collection Content</label>
<div class="input-field col s12">
<textarea id="some-textarea" name="content" class="materialize-textarea" length="400"><?php echo set_value( 'content');?></textarea>

</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="videourl">Video url</label>
<input type="text" id="videourl" name="videourl" value='<?php echo set_value('videourl');?>'>
</div>
</div>
<div class=" row" style="display:block">
<div class=" input-field col s6">
<?php echo form_dropdown("type",$type,set_value('type',$this->input->get('id')));?>
<label>type</label>
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

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
<textarea id="some-textarea" name="about" placeholder="Enter text ..."><?php echo set_value( 'about',$before->about);?></textarea>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<label>salonexp</label>
<textarea id="some-textarea" name="salonexp" placeholder="Enter text ..."><?php echo set_value( 'salonexp',$before->salonexp);?></textarea>
</div>
</div>
<div class="row">
			<div class="file-field input-field col m6 s12">
				<span class="img-center big">
								                    	<?php if($before->mainimage == "") { } else {
									                    ?><img src="<?php echo base_url('uploads')."/".$before->mainimage; ?>">
															<?php } ?>
															</span>
				<div class="btn blue darken-4">
					<span>Image</span>
					<input name="image" type="file" multiple>
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image',$before->mainimage);?>">
				</div>
			</div>
			<!-- <span style=" display: block;
    padding-top: 30px;">640 X 410</span> -->
		</div>
    <div class="row">
    <div class="input-field col s6">
    <label for="videourl">collectionname</label>
    <input type="text" id="collectionname" name="collectionname" value='<?php echo set_value('collectionname',$before->collectionname);?>'>
    </div>
    </div>
<div class="row">
<div class="col s12 m6">
<label>content</label>
<textarea id="some-textarea" name="content" placeholder="Enter text ..."><?php echo set_value( 'content',$before->content);?></textarea>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="videourl">videourl</label>
<input type="text" id="videourl" name="videourl" value='<?php echo set_value('videourl',$before->videourl);?>'>
</div>
</div>
<div class=" row">
<div class=" input-field col s6">
<?php echo form_dropdown("type",$type,set_value('type',$before->type));?>
<label>Type</label>
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

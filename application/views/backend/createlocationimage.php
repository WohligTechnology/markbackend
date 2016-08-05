<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Create locationimage</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createlocationimagesubmit");?>' enctype= 'multipart/form-data'>
  <div class="row" style="display:none">
             <div class="input-field col s12 m8">
                 <?php echo form_dropdown('location', $location, set_value('location',$this->input->get("id"))); ?>
                  <label> Location</label>
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
			<span style=" display: block;
		padding-top: 30px;">1215px X 561px</span>
		</div>
<div class="row">
<div class="input-field col s6">
<label for="order">order</label>
<input type="text" id="order" name="order" value='<?php echo set_value('order');?>'>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
<a href="<?php echo site_url("site/viewlocationimage"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
</div>
</div>
</form>
</div>

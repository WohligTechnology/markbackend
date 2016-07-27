<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Create brandimages</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createbrandimagessubmit");?>' enctype= 'multipart/form-data'>
	<div class="row" style="display:none">
             <div class="input-field col s12 m8">
                 <?php echo form_dropdown('brand', $brand, set_value('brand',$this->input->get("id"))); ?>
                  <label> Brand</label>
             </div>
         </div>
<div class="row">
			<div class="file-field input-field col m6 s12">
				<div class="btn blue darken-4">
					<span>Image 1</span>
					<input name="image1" type="file" multiple>
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image1');?>">
				</div>
			</div>
			<span style=" display: block;
		padding-top: 30px;">355px X 431px</span>
		</div>
<div class="row">
			<div class="file-field input-field col m6 s12">
				<div class="btn blue darken-4">
					<span>Image 2</span>
					<input name="image2" type="file" multiple>
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image2');?>">
				</div>
			</div>
			<span style=" display: block;
    padding-top: 30px;">355px X 487px</span>
		</div>
<div class="row">
			<div class="file-field input-field col m6 s12">
				<div class="btn blue darken-4">
					<span>Image 3</span>
					<input name="image3" type="file" multiple>
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image3');?>">
				</div>
			</div>
			<span style=" display: block;
		padding-top: 30px;">544px X 521px</span>
		</div>
<div class="row">
			<div class="file-field input-field col m6 s12">
				<div class="btn blue darken-4">
					<span>Image 4</span>
					<input name="image4" type="file" multiple>
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image4');?>">
				</div>
			</div>
			<span style=" display: block;
		padding-top: 30px;">544px X 391px</span>
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
<a href="<?php echo site_url("site/viewbrandimages?id=").$this->input->get("id");?>" class="waves-effect waves-light btn red">Cancel</a>
</div>
</div>
</form>
</div>

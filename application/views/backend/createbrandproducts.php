<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Create brandproducts</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createbrandproductssubmit");?>' enctype= 'multipart/form-data'>
  <div class="row" style="display:none">
             <div class="input-field col s12 m8">
                 <?php echo form_dropdown('brand', $brand, set_value('brand',$this->input->get("id"))); ?>
                  <label> Brand</label>
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
      padding-top: 30px;">400px X 224px</span>
  		</div>
<div class="row">
<div class="input-field col s6">
<label for="name">name</label>
<input type="text" id="name" name="name" value='<?php echo set_value('name');?>'>
</div>
</div>
<div class="row"><label>content</label>
<div class="input-field col s12">
<textarea id="some-textarea" name="content" class="materialize-textarea" length="400"><?php echo set_value( 'content');?></textarea>
</div>
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
<a href="<?php echo site_url("site/viewbrandproducts?id=").$this->input->get("id");?>" class="waves-effect waves-light btn red">Cancel</a>
</div>
</div>
</form>
</div>

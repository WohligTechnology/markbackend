<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Create brandlocation</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createbrandlocationsubmit");?>' enctype= 'multipart/form-data'>
<div class="row">
  <div class="input-field col s6">
      <?php echo form_dropdown('brand', $brand, set_value('brand',$this->input->get("id"))); ?>
       <label> Brand</label>
  </div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="location">location</label>
<input type="text" id="location" name="location" value='<?php echo set_value('location');?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="order">order</label>
<input type="text" id="order" name="order" value='<?php echo set_value('order');?>'>
</div>
</div>
<div class="row"><label>Address</label>
<div class="input-field col s12">
<textarea id="some-textarea" name="address" class="materialize-textarea" length="400"><?php echo set_value( 'address');?></textarea>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="contact">contact</label>
<input type="text" id="contact" name="contact" value='<?php echo set_value('contact',$before->contact);?>'>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
<a href="<?php echo site_url("site/viewbrandlocation"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
</div>
</div>
</form>
</div>

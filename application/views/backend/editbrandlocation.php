<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Edit brandlocation</h4>
</div>
</div>
<div class="row">
<form class='col s12' method='post' action='<?php echo site_url("site/editbrandlocationsubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<div class="row">
  <div class="input-field col s6">
      <?php echo form_dropdown('brand', $brand, set_value('brand',$before->brand)); ?>
       <label> Brand</label>
  </div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="location">location</label>
<input type="text" id="location" name="location" value='<?php echo set_value('location',$before->location);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="order">order</label>
<input type="text" id="order" name="order" value='<?php echo set_value('order',$before->order);?>'>
</div>
</div>
<div class="row">
<div class="col s6">
<button type="submit" class="btn btn-primary waves-effect waves-light  blue darken-4">Save</button>
<a href='<?php echo site_url("site/viewbrandlocation"); ?>' class='btn btn-secondary waves-effect waves-light red'>Cancel</a>
</div>
</div>
</form>
</div>

<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Edit brandimages</h4>
</div>
</div>
<div class="row">
<form class='col s12' method='post' action='<?php echo site_url("site/editbrandimagessubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<div class="row" style="display:none">
            <div class="input-field col s12 m8">
                <?php echo form_dropdown('brand', $brand, set_value('brand',$before->brand)); ?>
                 <label> Brand</label>
            </div>
        </div>
<div class="row">
			<div class="file-field input-field col m6 s12">
				<span class="img-center big image1">
                   			<?php if ($before->image1 == '') {
} else {
    ?><img src="<?php echo base_url('uploads').'/'.$before->image1;
    ?>">
						<?php
} ?></span>
				<div class="btn blue darken-4">
					<span>Image1</span>
					<input name="image1" type="file" multiple>
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate image11" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image1', $before->image1);?>">
				</div>
			</div>
      <span style=" display: block;
    padding-top: 30px;">355px X 431px</span>
		</div>
    <div class="row">
			<div class="file-field input-field col m6 s12">
				<span class="img-center big image1">
                   			<?php if ($before->image2 == '') {
} else {
    ?><img src="<?php echo base_url('uploads').'/'.$before->image2;
    ?>">
						<?php
} ?></span>
				<div class="btn blue darken-4">
					<span>Image2</span>
					<input name="image2" type="file" multiple>
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate image21" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image2', $before->image2);?>">
				</div>
<!--				<div class="md4"><a class="waves-effect waves-light btn red clearimg input-field ">Clear Image</a></div>-->
			</div>
      <span style=" display: block;
    padding-top: 30px;">544px X 521px</span>
		</div>

    <div class="row">
    			<div class="file-field input-field col m6 s12">
    				<span class="img-center big image3">
                       			<?php if ($before->image3 == '') {
    } else {
        ?><img src="<?php echo base_url('uploads').'/'.$before->image3;
        ?>">
    						<?php
    } ?></span>
    				<div class="btn blue darken-4">
    					<span>Image1</span>
    					<input name="image3" type="file" multiple>
    				</div>
    				<div class="file-path-wrapper">
    					<input class="file-path validate image31" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image3', $before->image3);?>">
    				</div>
    <!--				<div class="md4"><a class="waves-effect waves-light btn red clearimg input-field ">Clear Image</a></div>-->
    			</div>
          <span style=" display: block;
        padding-top: 30px;">355px X 487px</span>
    		</div>
        <div class="row">
    			<div class="file-field input-field col m6 s12">
    				<span class="img-center big image1">
                       			<?php if ($before->image4 == '') {
    } else {
        ?><img src="<?php echo base_url('uploads').'/'.$before->image4;
        ?>">
    						<?php
    } ?></span>
    				<div class="btn blue darken-4">
    					<span>Image2</span>
    					<input name="image4" type="file" multiple>
    				</div>
    				<div class="file-path-wrapper">
    					<input class="file-path validate image41" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image4', $before->image4);?>">
    				</div>
    <!--				<div class="md4"><a class="waves-effect waves-light btn red clearimg input-field ">Clear Image</a></div>-->
    			</div>
          <span style=" display: block;
        padding-top: 30px;">544px X 391px</span>
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
<a href="<?php echo site_url("site/viewbrandimages?id=").$this->input->get("id");?>" class="waves-effect waves-light btn red">Cancel</a>
</div>
</div>
</form>
</div>

<section class="panel">
    <div class="panel-body">
        <ul id="nav-mobile">
            <li><a class="waves-effect waves-light <?php if ($this->uri->segment(2) == 'editLocation') {
    echo 'active';
} ?>" href="<?php echo site_url('site/editbrandlocation?id=').$before1; ?>">Go to Brand</a></li>
            <li><a class="waves-effect waves-light <?php if ($this->uri->segment(2) == 'viewGalleryImage' || $this->uri->segment(2) == 'editGalleryImage'  || $this->uri->segment(2) == 'createGalleryImage') {
    echo 'active';
} ?>" href="<?php echo site_url('site/viewlocationimage?id=').$before2; ?>">Location Images</a></li>

    </ul>
    </div>
</section>

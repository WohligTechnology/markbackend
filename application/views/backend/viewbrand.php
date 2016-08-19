<div class="row">
<div class="col s12">
<div class="row">
<div class="col s12 drawchintantable">
<?php $this->chintantable->createsearch("List Of Brands");?>
<table class="highlight responsive-table">
<thead>
<tr>
<th data-field="id">id</th>
<th data-field="name">name</th>
<th data-field="collectionname">collectionname</th>
<th data-field="videourl">videourl</th>
<th data-field="type">type</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
<?php $this->chintantable->createpagination();?>
<div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light blue darken-4 tooltipped" href="<?php echo site_url("site/createbrand"); ?>"data-position="top" data-delay="50" data-tooltip="Create"><i class="material-icons">add</i></a></div>
</div>
</div>
<script>
function drawtable(resultrow) {
  if(resultrow.type==1)
  {
    var type = "image"
  }
  if(resultrow.type==2)
  {
    var type = "product"
  }

return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><<td>" + resultrow.collectionname + "</td><td>" + resultrow.videourl + "</td><td>" + type + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/editbrand?id=');?>"+resultrow.id+"' data-position='top' data-delay='50' data-tooltip='Edit'><i class='fa fa-pencil propericon'></i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>

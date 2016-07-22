<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class media_model extends CI_Model
{
public function create($image,$order,$status,$type)
{
$data=array("image" => $image,"order" => $order,"status" => $status,"type" => $type);
$query=$this->db->insert( "mark_media", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("mark_media")->row();
return $query;
}
function getsinglemedia($id){
$this->db->where("id",$id);
$query=$this->db->get("mark_media")->row();
return $query;
}
public function edit($id,$image,$order,$status,$type)
{
if($image=="")
{
$image=$this->media_model->getimagebyid($id);
$image=$image->image;
}
$data=array("image" => $image,"order" => $order,"status" => $status,"type" => $type);
$this->db->where( "id", $id );
$query=$this->db->update( "mark_media", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `mark_media` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `mark_media` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `mark_media` ORDER BY `id`
                    ASC")->result();
$return=array(
"" => "Select Option"
);
foreach($query as $row)
{
$return[$row->id]=$row->name;
}
return $return;
}

public function gettypedropdown()
{

$return=array(
"" => "Select type",
"1" => "HAIR & MAKEUP",
"2" => "EDITORIALS"
);

return $return;
}

public function getMedia($type)
{
  if(!empty($type))
  {
    $query = $this->db->query("SELECT `id`, `image` FROM `mark_media` WHERE `type`='$type' ORDER BY `order`")->result();
    return $query;
  }
  else {
  $obj = new stdClass();
  $obj->value = "Please Enter type";
  return $obj;
  }
}
}
?>

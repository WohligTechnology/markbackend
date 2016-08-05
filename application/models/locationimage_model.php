<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class locationimage_model extends CI_Model
{
public function create($location,$image,$order)
{
$data=array("location" => $location,"image" => $image,"order" => $order);
$query=$this->db->insert( "location_locationimage", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("location_locationimage")->row();
return $query;
}
function getsinglelocationimage($id){
$this->db->where("id",$id);
$query=$this->db->get("location_locationimage")->row();
return $query;
}
public function edit($id,$location,$image,$order)
{
if($image=="")
{
$image=$this->locationimage_model->getimagebyid($id);
$image=$image->image;
}
$data=array("location" => $location,"image" => $image,"order" => $order);
$this->db->where( "id", $id );
$query=$this->db->update( "location_locationimage", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `location_locationimage` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `location_locationimage` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `location_locationimage` ORDER BY `id`
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
}
?>

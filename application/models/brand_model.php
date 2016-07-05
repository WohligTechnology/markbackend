<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class brand_model extends CI_Model
{
public function create($name,$about,$salonexp,$image,$collectionname,$content,$videourl,$type)
{
$data=array("name" => $name,"about" => $about,"salonexp" => $salonexp,"mainimage" => $image,"collectionname" => $collectionname,"content" => $content,"videourl" => $videourl,"type" => $type);
$query=$this->db->insert( "mark_brand", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("mark_brand")->row();
return $query;
}
function getsinglebrand($id){
$this->db->where("id",$id);
$query=$this->db->get("mark_brand")->row();
return $query;
}
public function edit($id,$name,$about,$salonexp,$image,$collectionname,$content,$videourl,$type)
{
if($image=="")
{
$image=$this->brand_model->getimagebyid($id);
$image=$image->image;
}
$data=array("name" => $name,"about" => $about,"salonexp" => $salonexp,"mainimage" => $image,"collectionname" => $collectionname,"content" => $content,"videourl" => $videourl,"type" => $type);
$this->db->where( "id", $id );
$query=$this->db->update( "mark_brand", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `mark_brand` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `mainimage` as 'image' FROM `mark_brand` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `mark_brand` ORDER BY `id`
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
"1" => "Image",
"2" => "Product"
);

return $return;
}
}
?>

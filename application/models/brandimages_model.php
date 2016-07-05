<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class brandimages_model extends CI_Model
{
public function create($brand,$image,$order)
{
$data=array("brand" => $brand,"image" => $image,"order" => $order);
$query=$this->db->insert( "mark_brandimages", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("mark_brandimages")->row();
return $query;
}
function getsinglebrandimages($id){
$this->db->where("id",$id);
$query=$this->db->get("mark_brandimages")->row();
return $query;
}
public function edit($id,$brand,$image,$order)
{
if($image=="")
{
$image=$this->brandimages_model->getimagebyid($id);
$image=$image->image;
}
$data=array("brand" => $brand,"image" => $image,"order" => $order);
$this->db->where( "id", $id );
$query=$this->db->update( "mark_brandimages", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `mark_brandimages` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `mark_brandimages` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `mark_brandimages` ORDER BY `id` 
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

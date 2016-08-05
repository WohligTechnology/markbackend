<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class brandlocation_model extends CI_Model
{
public function create($brand,$location,$order)
{
$data=array("brand" => $brand,"location" => $location,"order" => $order);
$query=$this->db->insert( "location_brandlocation", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("location_brandlocation")->row();
return $query;
}
function getsinglebrandlocation($id){
$this->db->where("id",$id);
$query=$this->db->get("location_brandlocation")->row();
return $query;
}
public function edit($id,$brand,$location,$order)
{
// if($image=="")
// {
// $image=$this->brandlocation_model->getimagebyid($id);
// $image=$image->image;
// }
$data=array("brand" => $brand,"location" => $location,"order" => $order);
$this->db->where( "id", $id );
$query=$this->db->update( "location_brandlocation", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `location_brandlocation` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
// $query=$this->db->query("SELECT `image` FROM `location_brandlocation` WHERE `id`='$id'")->row();
// return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `location_brandlocation` ORDER BY `id`
                    ASC")->result();
$return=array(
"" => "Select Option"
);
foreach($query as $row)
{
$return[$row->id]=$row->location;
}
return $return;
}
}
?>

<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class brandimages_model extends CI_Model
{
public function create($brand,$image1,$image2,$image3,$image4,$order)
{
$data=array("brand" => $brand,"image1" => $image1,"image2" => $image2,"image3" => $image3,"image4" => $image4,"order" => $order);
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
public function edit($id,$brand,$image1,$image2,$image3,$image4,$order)
{
if($image1=="")
{
$image1=$this->brandimage1s_model->getimage1byid($id);
$image1=$image1->image1;
}
if($image4=="")
{
$image4=$this->brandimage4s_model->getimage4byid($id);
$image4=$image4->image4;
}
if($image2=="")
{
$image2=$this->brandimage2s_model->getimage2byid($id);
$image2=$image2->image2;
}
if($image3=="")
{
$image3=$this->brandimage3s_model->getimage3byid($id);
$image3=$image3->image3;
}
$data=array("brand" => $brand,"image1" => $image1,"image2" => $image2,"image3" => $image3,"image4" => $image4,"order" => $order);
$this->db->where( "id", $id );
$query=$this->db->update( "mark_brandimages", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `mark_brandimages` WHERE `id`='$id'");
return $query;
}
public function getimage1byid($id)
{
$query=$this->db->query("SELECT `image1` FROM `mark_brandimages` WHERE `id`='$id'")->row();
return $query;
}
public function getimage2byid($id)
{
$query=$this->db->query("SELECT `image2` FROM `mark_brandimages` WHERE `id`='$id'")->row();
return $query;
}
public function getimage3byid($id)
{
$query=$this->db->query("SELECT `image3` FROM `mark_brandimages` WHERE `id`='$id'")->row();
return $query;
}
public function getimage4byid($id)
{
$query=$this->db->query("SELECT `image4` FROM `mark_brandimages` WHERE `id`='$id'")->row();
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

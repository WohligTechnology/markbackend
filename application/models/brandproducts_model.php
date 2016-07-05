<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class brandproducts_model extends CI_Model
{
public function create($image,$name,$content,$order)
{
$data=array("image" => $image,"name" => $name,"content" => $content,"order" => $order);
$query=$this->db->insert( "mark_brandproducts", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("mark_brandproducts")->row();
return $query;
}
function getsinglebrandproducts($id){
$this->db->where("id",$id);
$query=$this->db->get("mark_brandproducts")->row();
return $query;
}
public function edit($id,$image,$name,$content,$order)
{
if($image=="")
{
$image=$this->brandproducts_model->getimagebyid($id);
$image=$image->image;
}
$data=array("image" => $image,"name" => $name,"content" => $content,"order" => $order);
$this->db->where( "id", $id );
$query=$this->db->update( "mark_brandproducts", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `mark_brandproducts` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `mark_brandproducts` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `mark_brandproducts` ORDER BY `id` 
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

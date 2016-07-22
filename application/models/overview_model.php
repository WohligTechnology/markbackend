<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class overview_model extends CI_Model
{
public function create($content)
{
$data=array("content" => $content);
$query=$this->db->insert( "mark_overview", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("mark_overview")->row();
return $query;
}
function getsingleoverview($id){
$this->db->where("id",$id);
$query=$this->db->get("mark_overview")->row();
return $query;
}
public function edit($id,$content)
{
if($image=="")
{
$image=$this->overview_model->getimagebyid($id);
$image=$image->image;
}
$data=array("content" => $content);
$this->db->where( "id", $id );
$query=$this->db->update( "mark_overview", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `mark_overview` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `mark_overview` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `mark_overview` ORDER BY `id`
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

public function getOverview()
{
  $query = $this->db->query("SELECT `id`, `content` FROM `mark_overview` WHERE 1")->result();
  return $query;
}
}
?>

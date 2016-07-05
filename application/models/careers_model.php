<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class careers_model extends CI_Model
{
public function create($title,$experience,$ctc,$position,$location,$mailat,$order)
{
$data=array("title" => $title,"experience" => $experience,"ctc" => $ctc,"position" => $position,"location" => $location,"mailat" => $mailat,"order" => $order);
$query=$this->db->insert( "mark_careers", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("mark_careers")->row();
return $query;
}
function getsinglecareers($id){
$this->db->where("id",$id);
$query=$this->db->get("mark_careers")->row();
return $query;
}
public function edit($id,$title,$experience,$ctc,$position,$location,$mailat,$order)
{
if($image=="")
{
$image=$this->careers_model->getimagebyid($id);
$image=$image->image;
}
$data=array("title" => $title,"experience" => $experience,"ctc" => $ctc,"position" => $position,"location" => $location,"mailat" => $mailat,"order" => $order);
$this->db->where( "id", $id );
$query=$this->db->update( "mark_careers", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `mark_careers` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `mark_careers` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `mark_careers` ORDER BY `id` 
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

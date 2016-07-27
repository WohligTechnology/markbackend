<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class contactus_model extends CI_Model
{
public function create($name,$email,$phone,$message)
{
$data=array("name" => $name,"email" => $email,"phone" => $phone,"message" => $message);
$query=$this->db->insert( "mark_contactus", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("mark_contactus")->row();
return $query;
}
function getsinglecontactus($id){
$this->db->where("id",$id);
$query=$this->db->get("mark_contactus")->row();
return $query;
}
public function edit($id,$name,$email,$phone,$message)
{
if($image=="")
{
$image=$this->contactus_model->getimagebyid($id);
$image=$image->image;
}
$data=array("name" => $name,"email" => $email,"phone" => $phone,"message" => $message);
$this->db->where( "id", $id );
$query=$this->db->update( "mark_contactus", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `mark_contactus` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `mark_contactus` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `mark_contactus` ORDER BY `id`
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

public function contactSubmit($name, $telephone, $email, $message)
{
  if(!empty($email))
  {
    $this->db->query("INSERT INTO `mark_contactus`(`name`,`email`,`phone`,`message`) VALUE('$name','$email','$telephone','$message')");
    $object = new stdClass();
    $object->value = true;
  }
  else
   {
    $object = new stdClass();
    $object->value = false;
    $object->message = "Please Enter Email";
    }
    return $object;
}
}
?>

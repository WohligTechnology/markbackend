<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class franchise_model extends CI_Model
{
public function create($name, $telephone, $email, $company,$franchise)
{
$data=array("name" => $name,"email" => $email,"phone" => $telephone,"company" => $company,"franchise" => $franchise);
$query=$this->db->insert( "mark_franchise", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("mark_franchise")->row();
return $query;
}
function getsinglefranchise($id){
$this->db->where("id",$id);
$query=$this->db->get("mark_franchise")->row();
return $query;
}
public function edit($id,$name, $telephone, $email, $company,$franchise)
{
$data=array("name" => $name,"email" => $email,"phone" => $telephone,"company" => $company,"franchise" => $franchise);
$this->db->where( "id", $id );
$query=$this->db->update( "mark_franchise", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `mark_franchise` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `mark_franchise` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `mark_franchise` ORDER BY `id`
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

public function franchiseSubmit($name, $telephone, $email, $company,$franchise)
{
  if(!empty($email))
  {
    $this->db->query("INSERT INTO `mark_franchise`(`name`,`email`,`phone`,`company`,`franchise`) VALUE('$name','$email','$telephone','$company','$franchise')");
    $msg = "<html><body><div id=':1fn' class='a3s adM' style='overflow: hidden;'>
    <p style='color:#000;font-family:Roboto;font-size:14px'>Name : $name <br/>
  Phone : $telephone <br/>
  Email : $email <br/>
  Company : $company<br/>
  Franchise For : $franchise
    </p>
  </div></body></html>";
    $this->email_model->emailer($msg,'Franchise Form Submission',$email,'');
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

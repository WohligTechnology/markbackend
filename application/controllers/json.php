<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller
{function getallcareers()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`mark_careers`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`mark_careers`.`title`";
$elements[1]->sort="1";
$elements[1]->header="title";
$elements[1]->alias="title";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`mark_careers`.`experience`";
$elements[2]->sort="1";
$elements[2]->header="experience";
$elements[2]->alias="experience";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`mark_careers`.`ctc`";
$elements[3]->sort="1";
$elements[3]->header="ctc";
$elements[3]->alias="ctc";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`mark_careers`.`position`";
$elements[4]->sort="1";
$elements[4]->header="position";
$elements[4]->alias="position";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`mark_careers`.`location`";
$elements[5]->sort="1";
$elements[5]->header="location";
$elements[5]->alias="location";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`mark_careers`.`mailat`";
$elements[6]->sort="1";
$elements[6]->header="mailat";
$elements[6]->alias="mailat";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`mark_careers`.`order`";
$elements[7]->sort="1";
$elements[7]->header="order";
$elements[7]->alias="order";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `mark_careers`");
$this->load->view("json",$data);
}
public function getsinglecareers()
{
$id=$this->input->get_post("id");
$data["message"]=$this->careers_model->getsinglecareers($id);
$this->load->view("json",$data);
}
function getalloverview()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`mark_overview`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`mark_overview`.`content`";
$elements[1]->sort="1";
$elements[1]->header="content";
$elements[1]->alias="content";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `mark_overview`");
$this->load->view("json",$data);
}
public function getsingleoverview()
{
$id=$this->input->get_post("id");
$data["message"]=$this->overview_model->getsingleoverview($id);
$this->load->view("json",$data);
}
function getallmedia()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`mark_media`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`mark_media`.`image`";
$elements[1]->sort="1";
$elements[1]->header="image";
$elements[1]->alias="image";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`mark_media`.`order`";
$elements[2]->sort="1";
$elements[2]->header="order";
$elements[2]->alias="order";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`mark_media`.`status`";
$elements[3]->sort="1";
$elements[3]->header="status";
$elements[3]->alias="status";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`mark_media`.`type`";
$elements[4]->sort="1";
$elements[4]->header="type";
$elements[4]->alias="type";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `mark_media`");
$this->load->view("json",$data);
}
public function getsinglemedia()
{
$id=$this->input->get_post("id");
$data["message"]=$this->media_model->getsinglemedia($id);
$this->load->view("json",$data);
}
function getallcontactus()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`mark_contactus`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`mark_contactus`.`name`";
$elements[1]->sort="1";
$elements[1]->header="name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`mark_contactus`.`email`";
$elements[2]->sort="1";
$elements[2]->header="email";
$elements[2]->alias="email";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`mark_contactus`.`phone`";
$elements[3]->sort="1";
$elements[3]->header="phone";
$elements[3]->alias="phone";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`mark_contactus`.`message`";
$elements[4]->sort="1";
$elements[4]->header="message";
$elements[4]->alias="message";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `mark_contactus`");
$this->load->view("json",$data);
}
public function getsinglecontactus()
{
$id=$this->input->get_post("id");
$data["message"]=$this->contactus_model->getsinglecontactus($id);
$this->load->view("json",$data);
}
function getallbrand()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`mark_brand`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`mark_brand`.`name`";
$elements[1]->sort="1";
$elements[1]->header="name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`mark_brand`.`about`";
$elements[2]->sort="1";
$elements[2]->header="about";
$elements[2]->alias="about";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`mark_brand`.`salonexp`";
$elements[3]->sort="1";
$elements[3]->header="salonexp";
$elements[3]->alias="salonexp";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`mark_brand`.`mainimage`";
$elements[4]->sort="1";
$elements[4]->header="mainimage";
$elements[4]->alias="mainimage";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`mark_brand`.`collectionname`";
$elements[5]->sort="1";
$elements[5]->header="collectionname";
$elements[5]->alias="collectionname";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`mark_brand`.`content`";
$elements[6]->sort="1";
$elements[6]->header="content";
$elements[6]->alias="content";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`mark_brand`.`videourl`";
$elements[7]->sort="1";
$elements[7]->header="videourl";
$elements[7]->alias="videourl";

$elements=array();
$elements[8]=new stdClass();
$elements[8]->field="`mark_brand`.`type`";
$elements[8]->sort="1";
$elements[8]->header="type";
$elements[8]->alias="type";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `mark_brand`");
$this->load->view("json",$data);
}
public function getsinglebrand()
{
$id=$this->input->get_post("id");
$data["message"]=$this->brand_model->getsinglebrand($id);
$this->load->view("json",$data);
}
function getallbrandimages()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`mark_brandimages`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`mark_brandimages`.`brand`";
$elements[1]->sort="1";
$elements[1]->header="brand";
$elements[1]->alias="brand";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`mark_brandimages`.`image`";
$elements[2]->sort="1";
$elements[2]->header="image";
$elements[2]->alias="image";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`mark_brandimages`.`order`";
$elements[3]->sort="1";
$elements[3]->header="order";
$elements[3]->alias="order";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `mark_brandimages`");
$this->load->view("json",$data);
}
public function getsinglebrandimages()
{
$id=$this->input->get_post("id");
$data["message"]=$this->brandimages_model->getsinglebrandimages($id);
$this->load->view("json",$data);
}
function getallbrandproducts()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`mark_brandproducts`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`mark_brandproducts`.`image`";
$elements[1]->sort="1";
$elements[1]->header="image";
$elements[1]->alias="image";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`mark_brandproducts`.`name`";
$elements[2]->sort="1";
$elements[2]->header="name";
$elements[2]->alias="name";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`mark_brandproducts`.`content`";
$elements[3]->sort="1";
$elements[3]->header="content";
$elements[3]->alias="content";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`mark_brandproducts`.`order`";
$elements[4]->sort="1";
$elements[4]->header="order";
$elements[4]->alias="order";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `mark_brandproducts`");
$this->load->view("json",$data);
}
public function getsinglebrandproducts()
{
$id=$this->input->get_post("id");
$data["message"]=$this->brandproducts_model->getsinglebrandproducts($id);
$this->load->view("json",$data);
}

public function getAllBrands()
{
$data["message"]=$this->brand_model->getAllBrands();
$this->load->view("json",$data);
}
public function getOverview()
{
$data["message"]=$this->overview_model->getOverview();
$this->load->view("json",$data);
}
public function getAllCareer()
{
$data["message"]=$this->careers_model->getAllCareer();
$this->load->view("json",$data);
}
public function getBrand()
{
$id=$this->input->get_post("id");
$data["message"]=$this->brand_model->getBrand($id);
$this->load->view("json",$data);
}
public function getMedia()
{
$type=$this->input->get_post("type");
$data["message"]=$this->media_model->getMedia($type);
$this->load->view("json",$data);
}

public function contactSubmit()
{
    $data = json_decode(file_get_contents('php://input'), true);
    $name = $data['name'];
    $email = $data['email'];
    $telephone = $data['telephone'];
    $message = $data['message'];
    $data['message'] = $this->contactus_model->contactSubmit($name, $telephone, $email, $message);
    $this->load->view('json', $data);
}


} ?>

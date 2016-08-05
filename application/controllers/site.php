<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller
{
	public function __construct( )
	{
		parent::__construct();

		$this->is_logged_in();
	}
	function is_logged_in( )
	{
		$is_logged_in = $this->session->userdata( 'logged_in' );
		if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
			redirect( base_url() . 'index.php/login', 'refresh' );
		} //$is_logged_in !== 'true' || !isset( $is_logged_in )
	}
	function checkaccess($access)
	{
		$accesslevel=$this->session->userdata('accesslevel');
		if(!in_array($accesslevel,$access))
			redirect( base_url() . 'index.php/site?alerterror=You do not have access to this page. ', 'refresh' );
	}
    public function getOrderingDone()
    {
        $orderby=$this->input->get("orderby");
        $ids=$this->input->get("ids");
        $ids=explode(",",$ids);
        $tablename=$this->input->get("tablename");
        $where=$this->input->get("where");
        if($where == "" || $where=="undefined")
        {
            $where=1;
        }
        $access = array(
            '1',
        );
        $this->checkAccess($access);
        $i=1;
        foreach($ids as $id)
        {
            //echo "UPDATE `$tablename` SET `$orderby` = '$i' WHERE `id` = `$id` AND $where";
            $this->db->query("UPDATE `$tablename` SET `$orderby` = '$i' WHERE `id` = '$id' AND $where");
            $i++;
            //echo "/n";
        }
        $data["message"]=true;
        $this->load->view("json",$data);

    }
	public function index()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data[ 'page' ] = 'dashboard';
		$data[ 'title' ] = 'Welcome';
		$this->load->view( 'template', $data );
	}
	public function createuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
        $data['gender']=$this->user_model->getgenderdropdown();
//        $data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createuser';
		$data[ 'title' ] = 'Create User';
		$this->load->view( 'template', $data );
	}
	function createusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
            $data['gender']=$this->user_model->getgenderdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
            $data[ 'page' ] = 'createuser';
            $data[ 'title' ] = 'Create User';
            $this->load->view( 'template', $data );
		}
		else
		{
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $accesslevel=$this->input->post('accesslevel');
            $status=$this->input->post('status');
            $socialid=$this->input->post('socialid');
            $logintype=$this->input->post('logintype');
            $json=$this->input->post('json');
            $firstname=$this->input->post('firstname');
            $lastname=$this->input->post('lastname');
            $phone=$this->input->post('phone');
            $billingaddress=$this->input->post('billingaddress');
            $billingcity=$this->input->post('billingcity');
            $billingstate=$this->input->post('billingstate');
            $billingcountry=$this->input->post('billingcountry');
            $billingpincode=$this->input->post('billingpincode');
            $billingcontact=$this->input->post('billingcontact');

            $shippingaddress=$this->input->post('shippingaddress');
            $shippingcity=$this->input->post('shippingcity');
            $shippingstate=$this->input->post('shippingstate');
            $shippingcountry=$this->input->post('shippingcountry');
            $shippingpincode=$this->input->post('shippingpincode');
            $shippingcontact=$this->input->post('shippingcontact');
            $shippingname=$this->input->post('shippingname');
            $currency=$this->input->post('currency');
            $credit=$this->input->post('credit');
            $companyname=$this->input->post('companyname');
            $registrationno=$this->input->post('registrationno');
            $vatnumber=$this->input->post('vatnumber');
            $country=$this->input->post('country');
            $fax=$this->input->post('fax');
            $gender=$this->input->post('gender');

            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

			if($this->user_model->create($name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$firstname,$lastname,$phone,$billingaddress,$billingcity,$billingstate,$billingcountry,$billingpincode,$billingcontact,$shippingaddress,$shippingcity,$shippingstate,$shippingcountry,$shippingpincode,$shippingcontact,$shippingname,$currency,$credit,$companyname,$registrationno,$vatnumber,$country,$fax,$gender)==0)
			$data['alerterror']="New user could not be created.";
			else
			$data['alertsuccess']="User created Successfully.";
			$data['redirect']="site/viewusers";
			$this->load->view("redirect",$data);
		}
	}
    function viewusers()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['page']='viewusers';
        $data['base_url'] = site_url("site/viewusersjson");

		$data['title']='View Users';
		$this->load->view('template',$data);
	}
    function viewusersjson()
	{
		$access = array("1");
		$this->checkaccess($access);


        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`user`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";


        $elements[1]=new stdClass();
        $elements[1]->field="`user`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";

        $elements[2]=new stdClass();
        $elements[2]->field="`user`.`email`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";

        $elements[3]=new stdClass();
        $elements[3]->field="`user`.`socialid`";
        $elements[3]->sort="1";
        $elements[3]->header="SocialId";
        $elements[3]->alias="socialid";

        $elements[4]=new stdClass();
        $elements[4]->field="`user`.`logintype`";
        $elements[4]->sort="1";
        $elements[4]->header="Logintype";
        $elements[4]->alias="logintype";

        $elements[5]=new stdClass();
        $elements[5]->field="`user`.`json`";
        $elements[5]->sort="1";
        $elements[5]->header="Json";
        $elements[5]->alias="json";

        $elements[6]=new stdClass();
        $elements[6]->field="`accesslevel`.`name`";
        $elements[6]->sort="1";
        $elements[6]->header="Accesslevel";
        $elements[6]->alias="accesslevelname";

        $elements[7]=new stdClass();
        $elements[7]->field="`statuses`.`name`";
        $elements[7]->sort="1";
        $elements[7]->header="Status";
        $elements[7]->alias="status";


        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }

        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }

        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `user` LEFT OUTER JOIN `logintype` ON `logintype`.`id`=`user`.`logintype` LEFT OUTER JOIN `accesslevel` ON `accesslevel`.`id`=`user`.`accesslevel` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`user`.`status`");

		$this->load->view("json",$data);
	}


	function edituser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
        $data["before1"]=$this->input->get('id');
        $data["before2"]=$this->input->get('id');
        $data["before3"]=$this->input->get('id');
        $data["before4"]=$this->input->get('id');
        $data["before5"]=$this->input->get('id');
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data['gender']=$this->user_model->getgenderdropdown();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['page']='edituser';
		$data['page2']='block/userblock';
		$data['title']='Edit User';
		$this->load->view('templatewith2',$data);
	}
	function editusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);

		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data['gender']=$this->user_model->getgenderdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
			$data['before']=$this->user_model->beforeedit($this->input->post('id'));
			$data['page']='edituser';
//			$data['page2']='block/userblock';
			$data['title']='Edit User';
			$this->load->view('template',$data);
		}
		else
		{

            $id=$this->input->get_post('id');
            $name=$this->input->get_post('name');
            $email=$this->input->get_post('email');
            $password=$this->input->get_post('password');
            $accesslevel=$this->input->get_post('accesslevel');
            $status=$this->input->get_post('status');
            $socialid=$this->input->get_post('socialid');
            $logintype=$this->input->get_post('logintype');
            $json=$this->input->get_post('json');
//            $category=$this->input->get_post('category');
            $firstname=$this->input->post('firstname');
            $lastname=$this->input->post('lastname');
            $phone=$this->input->post('phone');
            $billingaddress=$this->input->post('billingaddress');
            $billingcity=$this->input->post('billingcity');
            $billingstate=$this->input->post('billingstate');
            $billingcountry=$this->input->post('billingcountry');
            $billingpincode=$this->input->post('billingpincode');
            $billingcontact=$this->input->post('billingcontact');

            $shippingaddress=$this->input->post('shippingaddress');
            $shippingcity=$this->input->post('shippingcity');
            $shippingstate=$this->input->post('shippingstate');
            $shippingcountry=$this->input->post('shippingcountry');
            $shippingpincode=$this->input->post('shippingpincode');
            $shippingcontact=$this->input->post('shippingcontact');
            $shippingname=$this->input->post('shippingname');
            $currency=$this->input->post('currency');
            $credit=$this->input->post('credit');
            $companyname=$this->input->post('companyname');
            $registrationno=$this->input->post('registrationno');
            $vatnumber=$this->input->post('vatnumber');
            $country=$this->input->post('country');
            $fax=$this->input->post('fax');
            $gender=$this->input->post('gender');
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

            if($image=="")
            {
            $image=$this->user_model->getuserimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }

			if($this->user_model->edit($id,$name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$firstname,$lastname,$phone,$billingaddress,$billingcity,$billingstate,$billingcountry,$billingpincode,$billingcontact,$shippingaddress,$shippingcity,$shippingstate,$shippingcountry,$shippingpincode,$shippingcontact,$shippingname,$currency,$credit,$companyname,$registrationno,$vatnumber,$country,$fax,$gender)==0)
			$data['alerterror']="User Editing was unsuccesful";
			else
			$data['alertsuccess']="User edited Successfully.";

			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);

		}
	}

	function deleteuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->deleteuser($this->input->get('id'));
//		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="User Deleted Successfully";
		$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
	function changeuserstatus()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->changestatus($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="Status Changed Successfully";
		$data['redirect']="site/viewusers";
        $data['other']="template=$template";
        $this->load->view("redirect",$data);
	}
    public function viewcart()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewcart";
    $data["before1"]=$this->input->get('id');
        $data["before2"]=$this->input->get('id');
        $data["before3"]=$this->input->get('id');
        $data["before4"]=$this->input->get('id');
        $data["before5"]=$this->input->get('id');
$data['page2']='block/userblock';
$data["base_url"]=site_url("site/viewcartjson?id=").$this->input->get('id');
$data["title"]="View cart";
$this->load->view("templatewith2",$data);
}
function viewcartjson()
{
    $id=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_cart`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`fynx_cart`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";
$elements[2]=new stdClass();
$elements[2]->field="`fynx_cart`.`quantity`";
$elements[2]->sort="1";
$elements[2]->header="Quantity";
$elements[2]->alias="quantity";
$elements[3]=new stdClass();
$elements[3]->field="`fynx_cart`.`product`";
$elements[3]->sort="1";
$elements[3]->header="Product";
$elements[3]->alias="product";
$elements[4]=new stdClass();
$elements[4]->field="`fynx_cart`.`timestamp`";
$elements[4]->sort="1";
$elements[4]->header="Timestamp";
$elements[4]->alias="timestamp";

$elements[5]=new stdClass();
$elements[5]->field="`fynx_cart`.`size`";
$elements[5]->sort="1";
$elements[5]->header="Size";
$elements[5]->alias="size";

$elements[6]=new stdClass();
$elements[6]->field="`fynx_cart`.`color`";
$elements[6]->sort="1";
$elements[6]->header="Color";
$elements[6]->alias="color";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_cart`","WHERE `fynx_cart`.`user`='$id'");
$this->load->view("json",$data);
}
    public function viewwishlist()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewwishlist";
    $data["before1"]=$this->input->get('id');
        $data["before2"]=$this->input->get('id');
        $data["before3"]=$this->input->get('id');
        $data["before4"]=$this->input->get('id');
        $data["before5"]=$this->input->get('id');
$data['page2']='block/userblock';
$data["base_url"]=site_url("site/viewwishlistjson?id=".$this->input->get('id'));
$data["title"]="View wishlist";
$this->load->view("templatewith2",$data);
}
function viewwishlistjson()
{
    $user=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_wishlist`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`fynx_wishlist`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";
$elements[2]=new stdClass();
$elements[2]->field="`fynx_wishlist`.`product`";
$elements[2]->sort="1";
$elements[2]->header="Product";
$elements[2]->alias="product";
$elements[3]=new stdClass();
$elements[3]->field="`fynx_wishlist`.`timestamp`";
$elements[3]->sort="1";
$elements[3]->header="Timestamp";
$elements[3]->alias="timestamp";

$elements[4]=new stdClass();
$elements[4]->field="`fynx_product`.`name`";
$elements[4]->sort="1";
$elements[4]->header="Product Name";
$elements[4]->alias="productname";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_wishlist` LEFT OUTER JOIN `fynx_product` ON `fynx_product`.`id`=`fynx_wishlist`.`product`","WHERE `fynx_wishlist`.`user`='$user'");
$this->load->view("json",$data);
}



    public function viewcareers()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewcareers";
$data["base_url"]=site_url("site/viewcareersjson");
$data["title"]="View careers";
$this->load->view("template",$data);
}
function viewcareersjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`mark_careers`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`mark_careers`.`title`";
$elements[1]->sort="1";
$elements[1]->header="title";
$elements[1]->alias="title";
$elements[2]=new stdClass();
$elements[2]->field="`mark_careers`.`experience`";
$elements[2]->sort="1";
$elements[2]->header="experience";
$elements[2]->alias="experience";
$elements[3]=new stdClass();
$elements[3]->field="`mark_careers`.`ctc`";
$elements[3]->sort="1";
$elements[3]->header="ctc";
$elements[3]->alias="ctc";
$elements[4]=new stdClass();
$elements[4]->field="`mark_careers`.`position`";
$elements[4]->sort="1";
$elements[4]->header="position";
$elements[4]->alias="position";
$elements[5]=new stdClass();
$elements[5]->field="`mark_careers`.`location`";
$elements[5]->sort="1";
$elements[5]->header="location";
$elements[5]->alias="location";
$elements[6]=new stdClass();
$elements[6]->field="`mark_careers`.`mailat`";
$elements[6]->sort="1";
$elements[6]->header="mailat";
$elements[6]->alias="mailat";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `mark_careers`");
$this->load->view("json",$data);
}

public function createcareers()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createcareers";
$data["title"]="Create careers";
$this->load->view("template",$data);
}
public function createcareerssubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("title","title","trim");
$this->form_validation->set_rules("experience","experience","trim");
$this->form_validation->set_rules("ctc","ctc","trim");
$this->form_validation->set_rules("position","position","trim");
$this->form_validation->set_rules("location","location","trim");
$this->form_validation->set_rules("mailat","mailat","trim");
$this->form_validation->set_rules("order","order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createcareers";
$data["title"]="Create careers";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$title=$this->input->get_post("title");
$experience=$this->input->get_post("experience");
$ctc=$this->input->get_post("ctc");
$position=$this->input->get_post("position");
$location=$this->input->get_post("location");
$mailat=$this->input->get_post("mailat");
$order=$this->input->get_post("order");
if($this->careers_model->create($title,$experience,$ctc,$position,$location,$mailat,$order)==0)
$data["alerterror"]="New careers could not be created.";
else
$data["alertsuccess"]="careers created Successfully.";
$data["redirect"]="site/viewcareers";
$this->load->view("redirect",$data);
}
}
public function editcareers()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editcareers";
$data["title"]="Edit careers";
$data["before"]=$this->careers_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editcareerssubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","id","trim");
$this->form_validation->set_rules("title","title","trim");
$this->form_validation->set_rules("experience","experience","trim");
$this->form_validation->set_rules("ctc","ctc","trim");
$this->form_validation->set_rules("position","position","trim");
$this->form_validation->set_rules("location","location","trim");
$this->form_validation->set_rules("mailat","mailat","trim");
$this->form_validation->set_rules("order","order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editcareers";
$data["title"]="Edit careers";
$data["before"]=$this->careers_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$title=$this->input->get_post("title");
$experience=$this->input->get_post("experience");
$ctc=$this->input->get_post("ctc");
$position=$this->input->get_post("position");
$location=$this->input->get_post("location");
$mailat=$this->input->get_post("mailat");
$order=$this->input->get_post("order");
if($this->careers_model->edit($id,$title,$experience,$ctc,$position,$location,$mailat,$order)==0)
$data["alerterror"]="New careers could not be Updated.";
else
$data["alertsuccess"]="careers Updated Successfully.";
$data["redirect"]="site/viewcareers";
$this->load->view("redirect",$data);
}
}
public function deletecareers()
{
$access=array("1");
$this->checkaccess($access);
$this->careers_model->delete($this->input->get("id"));
$data["redirect"]="site/viewcareers";
$this->load->view("redirect",$data);
}
public function viewoverview()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewoverview";
$data["base_url"]=site_url("site/viewoverviewjson");
$data["title"]="View overview";
$this->load->view("template",$data);
}
function viewoverviewjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`mark_overview`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `mark_overview`");
$this->load->view("json",$data);
}

public function createoverview()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createoverview";
$data["title"]="Create overview";
$this->load->view("template",$data);
}
public function createoverviewsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("content","content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createoverview";
$data["title"]="Create overview";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$content=$this->input->get_post("content");
if($this->overview_model->create($content)==0)
$data["alerterror"]="New overview could not be created.";
else
$data["alertsuccess"]="overview created Successfully.";
$data["redirect"]="site/viewoverview";
$this->load->view("redirect",$data);
}
}
public function editoverview()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editoverview";
$data["title"]="Edit overview";
$data["before"]=$this->overview_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editoverviewsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","id","trim");
$this->form_validation->set_rules("content","content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editoverview";
$data["title"]="Edit overview";
$data["before"]=$this->overview_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$content=$this->input->get_post("content");
if($this->overview_model->edit($id,$content)==0)
$data["alerterror"]="New overview could not be Updated.";
else
$data["alertsuccess"]="overview Updated Successfully.";
$data["redirect"]="site/viewoverview";
$this->load->view("redirect",$data);
}
}
public function deleteoverview()
{
$access=array("1");
$this->checkaccess($access);
$this->overview_model->delete($this->input->get("id"));
$data["redirect"]="site/viewoverview";
$this->load->view("redirect",$data);
}
public function viewmedia()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewmedia";
$data["base_url"]=site_url("site/viewmediajson");
$data["title"]="View media";
$this->load->view("template",$data);
}
function viewmediajson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`mark_media`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`mark_media`.`image`";
$elements[1]->sort="1";
$elements[1]->header="image";
$elements[1]->alias="image";
$elements[2]=new stdClass();
$elements[2]->field="`mark_media`.`order`";
$elements[2]->sort="1";
$elements[2]->header="order";
$elements[2]->alias="order";
$elements[3]=new stdClass();
$elements[3]->field="`mark_media`.`status`";
$elements[3]->sort="1";
$elements[3]->header="status";
$elements[3]->alias="status";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `mark_media`");
$this->load->view("json",$data);
}

public function createmedia()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createmedia";
$data["type"]=$this->media_model->gettypedropdown();
$data["title"]="Create media";
$this->load->view("template",$data);
}
public function createmediasubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("image","image","trim");
$this->form_validation->set_rules("order","order","trim");
$this->form_validation->set_rules("status","status","trim");
$this->form_validation->set_rules("type","type","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createmedia";
$data["title"]="Create media";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
// $image=$this->input->get_post("image");
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$type=$this->input->get_post("type");
$image=$this->menu_model->createImage();
if($this->media_model->create($image,$order,$status,$type)==0)
$data["alerterror"]="New media could not be created.";
else
$data["alertsuccess"]="media created Successfully.";
$data["redirect"]="site/viewmedia";
$this->load->view("redirect",$data);
}
}
public function editmedia()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editmedia";
$data["type"]=$this->media_model->gettypedropdown();
$data["title"]="Edit media";
$data["before"]=$this->media_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editmediasubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","id","trim");
$this->form_validation->set_rules("image","image","trim");
$this->form_validation->set_rules("order","order","trim");
$this->form_validation->set_rules("status","status","trim");
$this->form_validation->set_rules("type","type","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editmedia";
$data["title"]="Edit media";
$data["before"]=$this->media_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$image=$this->input->get_post("image");
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$type=$this->input->get_post("type");
if($this->media_model->edit($id,$image,$order,$status,$type)==0)
$data["alerterror"]="New media could not be Updated.";
else
$data["alertsuccess"]="media Updated Successfully.";
$data["redirect"]="site/viewmedia";
$this->load->view("redirect",$data);
}
}
public function deletemedia()
{
$access=array("1");
$this->checkaccess($access);
$this->media_model->delete($this->input->get("id"));
$data["redirect"]="site/viewmedia";
$this->load->view("redirect",$data);
}
public function viewcontactus()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewcontactus";
$data["base_url"]=site_url("site/viewcontactusjson");
$data["title"]="View contactus";
$this->load->view("template",$data);
}
function viewcontactusjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`mark_contactus`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`mark_contactus`.`name`";
$elements[1]->sort="1";
$elements[1]->header="name";
$elements[1]->alias="name";
$elements[2]=new stdClass();
$elements[2]->field="`mark_contactus`.`email`";
$elements[2]->sort="1";
$elements[2]->header="email";
$elements[2]->alias="email";
$elements[3]=new stdClass();
$elements[3]->field="`mark_contactus`.`phone`";
$elements[3]->sort="1";
$elements[3]->header="phone";
$elements[3]->alias="phone";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `mark_contactus`");
$this->load->view("json",$data);
}

public function createcontactus()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createcontactus";
$data["title"]="Create contactus";
$this->load->view("template",$data);
}
public function createcontactussubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("name","name","trim");
$this->form_validation->set_rules("email","email","trim");
$this->form_validation->set_rules("phone","phone","trim");
$this->form_validation->set_rules("message","message","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createcontactus";
$data["title"]="Create contactus";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$email=$this->input->get_post("email");
$phone=$this->input->get_post("phone");
$message=$this->input->get_post("message");
if($this->contactus_model->create($name,$email,$phone,$message)==0)
$data["alerterror"]="New contactus could not be created.";
else
$data["alertsuccess"]="contactus created Successfully.";
$data["redirect"]="site/viewcontactus";
$this->load->view("redirect",$data);
}
}
public function editcontactus()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editcontactus";
$data["title"]="Edit contactus";
$data["before"]=$this->contactus_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editcontactussubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","id","trim");
$this->form_validation->set_rules("name","name","trim");
$this->form_validation->set_rules("email","email","trim");
$this->form_validation->set_rules("phone","phone","trim");
$this->form_validation->set_rules("message","message","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editcontactus";
$data["title"]="Edit contactus";
$data["before"]=$this->contactus_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$email=$this->input->get_post("email");
$phone=$this->input->get_post("phone");
$message=$this->input->get_post("message");
if($this->contactus_model->edit($id,$name,$email,$phone,$message)==0)
$data["alerterror"]="New contactus could not be Updated.";
else
$data["alertsuccess"]="contactus Updated Successfully.";
$data["redirect"]="site/viewcontactus";
$this->load->view("redirect",$data);
}
}
public function deletecontactus()
{
$access=array("1");
$this->checkaccess($access);
$this->contactus_model->delete($this->input->get("id"));
$data["redirect"]="site/viewcontactus";
$this->load->view("redirect",$data);
}
public function viewbrand()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewbrand";
$data["base_url"]=site_url("site/viewbrandjson");
$data["title"]="View brand";
$this->load->view("template",$data);
}
function viewbrandjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`mark_brand`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`mark_brand`.`name`";
$elements[1]->sort="1";
$elements[1]->header="name";
$elements[1]->alias="name";
$elements[2]=new stdClass();
$elements[2]->field="`mark_brand`.`about`";
$elements[2]->sort="1";
$elements[2]->header="about";
$elements[2]->alias="about";
$elements[3]=new stdClass();
$elements[3]->field="`mark_brand`.`salonexp`";
$elements[3]->sort="1";
$elements[3]->header="salonexp";
$elements[3]->alias="salonexp";
$elements[4]=new stdClass();
$elements[4]->field="`mark_brand`.`mainimage`";
$elements[4]->sort="1";
$elements[4]->header="mainimage";
$elements[4]->alias="mainimage";
$elements[5]=new stdClass();
$elements[5]->field="`mark_brand`.`collectionname`";
$elements[5]->sort="1";
$elements[5]->header="collectionname";
$elements[5]->alias="collectionname";
$elements[6]=new stdClass();
$elements[6]->field="`mark_brand`.`content`";
$elements[6]->sort="1";
$elements[6]->header="content";
$elements[6]->alias="content";
$elements[7]=new stdClass();
$elements[7]->field="`mark_brand`.`videourl`";
$elements[7]->sort="1";
$elements[7]->header="videourl";
$elements[7]->alias="videourl";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `mark_brand`");
$this->load->view("json",$data);
}

public function createbrand()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createbrand";
$data["type"]=$this->brand_model->gettypedropdown();
$data["title"]="Create brand";
$this->load->view("template",$data);
}
public function createbrandsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("name","name","trim");
$this->form_validation->set_rules("about","about","trim");
$this->form_validation->set_rules("salonexp","salonexp","trim");
$this->form_validation->set_rules("mainimage","mainimage","trim");
$this->form_validation->set_rules("collectionname","collectionname","trim");
$this->form_validation->set_rules("content","content","trim");
$this->form_validation->set_rules("videourl","videourl","trim");
$this->form_validation->set_rules("type","type","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createbrand";
$data["title"]="Create brand";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$about=$this->input->get_post("about");
$salonexp=$this->input->get_post("salonexp");
// $mainimage=$this->input->get_post("mainimage");
$collectionname=$this->input->get_post("collectionname");
$content=$this->input->get_post("content");
$videourl=$this->input->get_post("videourl");
$type=$this->input->get_post("type");
  $image=$this->menu_model->createImage();
if($this->brand_model->create($name,$about,$salonexp,$image,$collectionname,$content,$videourl,$type)==0)
$data["alerterror"]="New brand could not be created.";
else
$data["alertsuccess"]="brand created Successfully.";
$data["redirect"]="site/viewbrand";
$this->load->view("redirect",$data);
}
}
public function editbrand()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editbrand";
$data["page2"]="block/brandblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data["type"]=$this->brand_model->gettypedropdown();
$data["title"]="Edit brand";
$data["before"]=$this->brand_model->beforeedit($this->input->get("id"));
$this->load->view("templatewith2",$data);
}
public function editbrandsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","id","trim");
$this->form_validation->set_rules("name","name","trim");
$this->form_validation->set_rules("about","about","trim");
$this->form_validation->set_rules("salonexp","salonexp","trim");
// $this->form_validation->set_rules("mainimage","mainimage","trim");
$this->form_validation->set_rules("collectionname","collectionname","trim");
$this->form_validation->set_rules("content","content","trim");
$this->form_validation->set_rules("videourl","videourl","trim");
$this->form_validation->set_rules("type","type","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editbrand";
$data["title"]="Edit brand";
$data["before"]=$this->brand_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$about=$this->input->get_post("about");
$salonexp=$this->input->get_post("salonexp");
// $mainimage=$this->input->get_post("mainimage");
$collectionname=$this->input->get_post("collectionname");
$content=$this->input->get_post("content");
$videourl=$this->input->get_post("videourl");
$type=$this->input->get_post("type");
  $image=$this->menu_model->createImage();
if($this->brand_model->edit($id,$name,$about,$salonexp,$image,$collectionname,$content,$videourl,$type)==0)
$data["alerterror"]="New brand could not be Updated.";
else
$data["alertsuccess"]="brand Updated Successfully.";
$data["redirect"]="site/viewbrand";
$this->load->view("redirect",$data);
}
}
public function deletebrand()
{
$access=array("1");
$this->checkaccess($access);
$this->brand_model->delete($this->input->get("id"));
$data["redirect"]="site/viewbrand";
$this->load->view("redirect",$data);
}
public function viewbrandimages()
{
	$access=array("1");
	$this->checkaccess($access);
	$data["page"]="viewbrandimages";
	$data["page2"]="block/brandblock";
	$data["before1"]=$this->input->get('id');
	$data["before2"]=$this->input->get('id');
	$data["before3"]=$this->input->get('id');
	$data["before4"]=$this->input->get('id');
	$data["base_url"]=site_url("site/viewbrandimagesjson?id=").$this->input->get('id');
	$data["title"]="View brandproducts";
	$this->load->view("templatewith2",$data);
}
function viewbrandimagesjson()
{
$id = $this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`mark_brandimages`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`mark_brandimages`.`brand`";
$elements[1]->sort="1";
$elements[1]->header="brand";
$elements[1]->alias="brand";
$elements[2]=new stdClass();
$elements[2]->field="`mark_brandimages`.`image1`";
$elements[2]->sort="1";
$elements[2]->header="image1";
$elements[2]->alias="image1";
$elements[3]=new stdClass();
$elements[3]->field="`mark_brandimages`.`image2`";
$elements[3]->sort="1";
$elements[3]->header="image2";
$elements[3]->alias="image2";
$elements[4]=new stdClass();
$elements[4]->field="`mark_brandimages`.`image3`";
$elements[4]->sort="1";
$elements[4]->header="image3";
$elements[4]->alias="image3";
$elements[5]=new stdClass();
$elements[5]->field="`mark_brandimages`.`image4`";
$elements[5]->sort="1";
$elements[5]->header="image4";
$elements[5]->alias="image4";
$elements[6]=new stdClass();
$elements[6]->field="`mark_brandimages`.`order`";
$elements[6]->sort="1";
$elements[6]->header="order";
$elements[6]->alias="order";
$elements[7]=new stdClass();
$elements[7]->field="`mark_brandimages`.`brand`";
$elements[7]->sort="1";
$elements[7]->header="brandid";
$elements[7]->alias="brandid";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `mark_brandimages`","WHERE `mark_brandimages`.`brand`='$id'");
$this->load->view("json",$data);
}

public function createbrandimages()
{
	$access=array("1");
	$this->checkaccess($access);
	$data["page"]="createbrandimages";
	$data["before1"]=$this->input->get('id');
	$data["before2"]=$this->input->get('id');
	$data["before3"]=$this->input->get('id');
	$data["brand"]=$this->brand_model->getdropdown();
	$data["title"]="Create brandimages";
	$this->load->view("template",$data);
}
public function createbrandimagessubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("brand","brand","trim");
$this->form_validation->set_rules("image","image","trim");
$this->form_validation->set_rules("order","order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createbrandimages";
$data["title"]="Create brandimages";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$brand=$this->input->get_post("brand");
// $image=$this->input->get_post("image");
$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				$filename = 'image1';
				$image1 = '';
				if ($this->upload->do_upload($filename)) {
						$uploaddata = $this->upload->data();
						$image1 = $uploaddata['file_name'];
				}
				$filename = 'image2';
				$image2 = '';
				if ($this->upload->do_upload($filename)) {
						$uploaddata = $this->upload->data();
						$image2 = $uploaddata['file_name'];
				}
				$filename = 'image3';
								$image3 = '';
								if ($this->upload->do_upload($filename)) {
										$uploaddata = $this->upload->data();
										$image3 = $uploaddata['file_name'];
								}
								$filename = 'image4';
								$image4 = '';
								if ($this->upload->do_upload($filename)) {
										$uploaddata = $this->upload->data();
										$image4 = $uploaddata['file_name'];
								}
$order=$this->input->get_post("order");
if($this->brandimages_model->create($brand,$image1,$image2,$image3,$image4,$order)==0)
$data["alerterror"]="New brandimages could not be created.";
else
$data["alertsuccess"]="brandimages created Successfully.";
// $data["redirect"]="site/viewbrandimages";
// $this->load->view("redirect",$data);
$data["redirect"]="site/viewbrandimages?id=".$brand;
$this->load->view("redirect2",$data);
}
}
public function editbrandimages()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editbrandimages";
$data["title"]="Edit brandimages";
$data["brand"]=$this->brand_model->getdropdown();
$data["before"]=$this->brandimages_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editbrandimagessubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","id","trim");
$this->form_validation->set_rules("brand","brand","trim");
$this->form_validation->set_rules("image","image","trim");
$this->form_validation->set_rules("order","order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editbrandimages";
$data["title"]="Edit brandimages";
$data["before"]=$this->brandimages_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$brand=$this->input->get_post("brand");
// $image=$this->input->get_post("image");
$config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $filename = 'image1';
            $image1 = '';
            if ($this->upload->do_upload($filename)) {
                $uploaddata = $this->upload->data();
                $image1 = $uploaddata['file_name'];
            }
            if ($image1 == '') {
                $image1 = $this->brandimages_model->getimage1byid($id);
                    // print_r($image);
                     $image1 = $image1->image1;
            }
            $filename = 'image2';
            $image2 = '';
            if ($this->upload->do_upload($filename)) {
                $uploaddata = $this->upload->data();
                $image2 = $uploaddata['file_name'];
            }
            if ($image2 == '') {
                $image2 = $this->brandimages_model->getimage2byid($id);
                    // print_r($image);
                     $image2 = $image2->image2;
            }
						            $filename = 'image3';
						            $image3 = '';
						            if ($this->upload->do_upload($filename)) {
						                $uploaddata = $this->upload->data();
						                $image3 = $uploaddata['file_name'];
						            }
						            if ($image3 == '') {
						                $image3 = $this->brandimages_model->getimage3byid($id);
						                    // print_r($image);
						                     $image3 = $image3->image3;
						            }
						            $filename = 'image4';
						            $image4 = '';
						            if ($this->upload->do_upload($filename)) {
						                $uploaddata = $this->upload->data();
						                $image4 = $uploaddata['file_name'];
						            }
						            if ($image4 == '') {
						                $image4 = $this->brandimages_model->getimage4byid($id);
						                    // print_r($image);
						                     $image4 = $image4->image4;
						            }

$order=$this->input->get_post("order");
if($this->brandimages_model->edit($id,$brand,$image1,$image2,$image3,$image4,$order)==0)
$data["alerterror"]="New brandimages could not be Updated.";
else
$data["alertsuccess"]="brandimages Updated Successfully.";
// $data["redirect"]="site/viewbrandimages";
// $this->load->view("redirect",$data);
$data["redirect"]="site/viewbrandimages?id=".$brand;
$this->load->view("redirect2",$data);
}
}
public function deletebrandimages()
{
$access=array("1");
$this->checkaccess($access);
$this->brandimages_model->delete($this->input->get("id"));
// $data["redirect"]="site/viewbrandimages";
// $this->load->view("redirect",$data);
$data["redirect"]="site/viewbrandimages?id=".$this->input->get("brandid");
$this->load->view("redirect2",$data);
}
public function viewbrandproducts()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewbrandproducts";
$data["page2"]="block/brandblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data["before4"]=$this->input->get('id');
$data["base_url"]=site_url("site/viewbrandproductsjson?id=").$this->input->get('id');
$data["title"]="View brandproducts";
$this->load->view("templatewith2",$data);
}
function viewbrandproductsjson()
{
$id=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`mark_brandproducts`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`mark_brandproducts`.`image`";
$elements[1]->sort="1";
$elements[1]->header="image";
$elements[1]->alias="image";
$elements[2]=new stdClass();
$elements[2]->field="`mark_brandproducts`.`name`";
$elements[2]->sort="1";
$elements[2]->header="name";
$elements[2]->alias="name";
$elements[3]=new stdClass();
$elements[3]->field="`mark_brandproducts`.`content`";
$elements[3]->sort="1";
$elements[3]->header="content";
$elements[3]->alias="content";
$elements[4]=new stdClass();
$elements[4]->field="`mark_brandproducts`.`order`";
$elements[4]->sort="1";
$elements[4]->header="order";
$elements[4]->alias="order";
$elements[5]=new stdClass();
$elements[5]->field="`mark_brandproducts`.`brand`";
$elements[5]->sort="1";
$elements[5]->header="brandid";
$elements[5]->alias="brandid";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `mark_brandproducts`","WHERE `mark_brandproducts`.`brand`='$id'");
$this->load->view("json",$data);
}

public function createbrandproducts()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createbrandproducts";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data["brand"]=$this->brand_model->getdropdown();
$data["title"]="Create brandproducts";
$this->load->view("template",$data);
}
public function createbrandproductssubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("image","image","trim");
$this->form_validation->set_rules("name","name","trim");
$this->form_validation->set_rules("content","content","trim");
$this->form_validation->set_rules("order","order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createbrandproducts";
$data["title"]="Create brandproducts";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
// $image=$this->input->get_post("image");
$name=$this->input->get_post("name");
$content=$this->input->get_post("content");
$brand=$this->input->get_post("brand");
$order=$this->input->get_post("order");
$image=$this->menu_model->createImage();
if($this->brandproducts_model->create($image,$name,$brand,$content,$order)==0)
$data["alerterror"]="New brandproducts could not be created.";
else
$data["alertsuccess"]="brandproducts created Successfully.";
// $data["redirect"]="site/viewbrandproducts";
// $this->load->view("redirect",$data);
$data["redirect"]="site/viewbrandproducts?id=".$brand;
$this->load->view("redirect2",$data);
}
}
public function editbrandproducts()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editbrandproducts";
$data["brand"]=$this->brand_model->getdropdown();
$data["title"]="Edit brandproducts";
$data["before"]=$this->brandproducts_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editbrandproductssubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","id","trim");
$this->form_validation->set_rules("image","image","trim");
$this->form_validation->set_rules("name","name","trim");
$this->form_validation->set_rules("content","content","trim");
$this->form_validation->set_rules("order","order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editbrandproducts";
$data["title"]="Edit brandproducts";
$data["before"]=$this->brandproducts_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
// $image=$this->input->get_post("image");
$name=$this->input->get_post("name");
$brand=$this->input->get_post("brand");
$content=$this->input->get_post("content");
$order=$this->input->get_post("order");
  $image=$this->menu_model->createImage();
if($this->brandproducts_model->edit($id,$image,$name,$brand,$content,$order)==0)
$data["alerterror"]="New brandproducts could not be Updated.";
else
$data["alertsuccess"]="brandproducts Updated Successfully.";
// $data["redirect"]="site/viewbrandproducts";
// $this->load->view("redirect",$data);
$data["redirect"]="site/viewbrandproducts?id=".$brand;
$this->load->view("redirect2",$data);
}
}
public function deletebrandproducts()
{
$access=array("1");
$this->checkaccess($access);
$this->brandproducts_model->delete($this->input->get("id"));
// $data["redirect"]="site/viewbrandproducts";
// $this->load->view("redirect",$data);
$data["redirect"]="site/viewbrandproducts?id=".$this->input->get("brandid");
$this->load->view("redirect2",$data);
}


public function viewbrandlocation()
{
$access=array("1");
$data["page"]="viewbrandlocation";
$data["page2"]="block/locationblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data["before4"]=$this->input->get('id');
$data["base_url"]=site_url("site/viewbrandlocationjson?id=").$this->input->get('id');
$data["title"]="View brandlocations";
$this->load->view("templatewith2",$data);
}
function viewbrandlocationjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`location_brandlocation`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`location_brandlocation`.`brand`";
$elements[1]->sort="1";
$elements[1]->header="brand";
$elements[1]->alias="brand";
$elements[2]=new stdClass();
$elements[2]->field="`location_brandlocation`.`location`";
$elements[2]->sort="1";
$elements[2]->header="location";
$elements[2]->alias="location";
$elements[3]=new stdClass();
$elements[3]->field="`location_brandlocation`.`order`";
$elements[3]->sort="1";
$elements[3]->header="order";
$elements[3]->alias="order";
$elements[4]=new stdClass();
$elements[4]->field="`mark_brand`.`name`";
$elements[4]->sort="1";
$elements[4]->header="brandname";
$elements[4]->alias="brandname";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `location_brandlocation` LEFT OUTER JOIN `mark_brand` ON `location_brandlocation`.`brand`=`mark_brand`.`id`");
$this->load->view("json",$data);
}

public function createbrandlocation()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createbrandlocation";
$data["brand"]=$this->brand_model->getdropdown();
$data["title"]="Create brandlocation";
$this->load->view("template",$data);
}
public function createbrandlocationsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("brand","brand","trim");
$this->form_validation->set_rules("location","location","trim");
$this->form_validation->set_rules("order","order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createbrandlocation";
$data["title"]="Create brandlocation";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$brand=$this->input->get_post("brand");
$location=$this->input->get_post("location");
$order=$this->input->get_post("order");
if($this->brandlocation_model->create($brand,$location,$order)==0)
$data["alerterror"]="New brandlocation could not be created.";
else
$data["alertsuccess"]="brandlocation created Successfully.";
$data["redirect"]="site/viewbrandlocation";
$this->load->view("redirect",$data);
}
}
public function editbrandlocation()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editbrandlocation";
$data["page2"]="block/locationblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data["brand"]=$this->brand_model->getdropdown();
$data["title"]="Edit brandlocation";
$data["before"]=$this->brandlocation_model->beforeedit($this->input->get("id"));
$this->load->view("templatewith2",$data);
}
public function editbrandlocationsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","id","trim");
$this->form_validation->set_rules("brand","brand","trim");
$this->form_validation->set_rules("location","location","trim");
$this->form_validation->set_rules("order","order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editbrandlocation";
$data["title"]="Edit brandlocation";
$data["before"]=$this->brandlocation_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$brand=$this->input->get_post("brand");
$location=$this->input->get_post("location");
$order=$this->input->get_post("order");
if($this->brandlocation_model->edit($id,$brand,$location,$order)==0)
$data["alerterror"]="New brandlocation could not be Updated.";
else
$data["alertsuccess"]="brandlocation Updated Successfully.";
$data["redirect"]="site/viewbrandlocation";
$this->load->view("redirect",$data);
}
}
public function deletebrandlocation()
{
$access=array("1");
$this->checkaccess($access);
$this->brandlocation_model->delete($this->input->get("id"));
$data["redirect"]="site/viewbrandlocation";
$this->load->view("redirect",$data);
}
public function viewlocationimage()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewlocationimage";
$data["page2"]="block/locationblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data["before4"]=$this->input->get('id');
$data["base_url"]=site_url("site/viewlocationimagejson?id=").$this->input->get('id');
$data["title"]="View locationimage";
$this->load->view("templatewith2",$data);
}
function viewlocationimagejson()
{
$elements=array();
$id = $this->input->get('id');
$elements[0]=new stdClass();
$elements[0]->field="`location_locationimage`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`location_locationimage`.`location`";
$elements[1]->sort="1";
$elements[1]->header="location";
$elements[1]->alias="location";
$elements[2]=new stdClass();
$elements[2]->field="`location_locationimage`.`image`";
$elements[2]->sort="1";
$elements[2]->header="image";
$elements[2]->alias="image";
$elements[3]=new stdClass();
$elements[3]->field="`location_locationimage`.`order`";
$elements[3]->sort="1";
$elements[3]->header="order";
$elements[3]->alias="order";
$elements[4]=new stdClass();
$elements[4]->field="`location_locationimage`.`location`";
$elements[4]->sort="1";
$elements[4]->header="locationid";
$elements[4]->alias="locationid";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `location_locationimage`","WHERE `location_locationimage`.`location`='$id'");
$this->load->view("json",$data);
}

public function createlocationimage()
{
$access=array("1");
$this->checkaccess($access);
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["before3"]=$this->input->get('id');
$data["location"]=$this->brandlocation_model->getdropdown();
$data["page"]="createlocationimage";
$data["title"]="Create locationimage";
$this->load->view("template",$data);
}
public function createlocationimagesubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("location","location","trim");
$this->form_validation->set_rules("image","image","trim");
$this->form_validation->set_rules("order","order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createlocationimage";
$data["title"]="Create locationimage";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$location=$this->input->get_post("location");
// $image=$this->input->get_post("image");
$image=$this->menu_model->createImage();
$order=$this->input->get_post("order");
if($this->locationimage_model->create($location,$image,$order)==0)
$data["alerterror"]="New locationimage could not be created.";
else
$data["alertsuccess"]="locationimage created Successfully.";
$data["redirect"]="site/viewlocationimage?id=".$location;
$this->load->view("redirect2",$data);
}
}
public function editlocationimage()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editlocationimage";
$data["title"]="Edit locationimage";
$data["location"]=$this->brandlocation_model->getdropdown();
$data["before"]=$this->locationimage_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editlocationimagesubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","id","trim");
$this->form_validation->set_rules("location","location","trim");
$this->form_validation->set_rules("image","image","trim");
$this->form_validation->set_rules("order","order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editlocationimage";
$data["title"]="Edit locationimage";
$data["before"]=$this->locationimage_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$location=$this->input->get_post("location");
// $image=$this->input->get_post("image");
$image=$this->menu_model->createImage();
$order=$this->input->get_post("order");
if($this->locationimage_model->edit($id,$location,$image,$order)==0)
$data["alerterror"]="New locationimage could not be Updated.";
else
$data["alertsuccess"]="locationimage Updated Successfully.";
$data["redirect"]="site/viewlocationimage?id=".$location;
$this->load->view("redirect2",$data);
}
}
public function deletelocationimage()
{
$access=array("1");
$this->checkaccess($access);
$this->locationimage_model->delete($this->input->get("id"));
// $data["redirect"]="site/viewlocationimage";
// $this->load->view("redirect",$data);
$data["redirect"]="site/viewlocationimage?id=".$this->input->get("locationid");
$this->load->view("redirect2",$data);
}

}
?>

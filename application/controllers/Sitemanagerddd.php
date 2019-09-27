<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemanager extends CI_Controller {

	function __construct(){

		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Sitemodel','sitemodel');
		$this->load->model('Blogmodel','blogmodel');
	}
	public function index()
	{
		$data=array();
		$data['metaInfo']=$this->getMetaDetails(1);
		//$this->load->view('front/home',$data);

		$this->template->load('default','front/home',$data);
	}
	public function contact(){
		$data=array();
		$data['metaInfo']=$this->getMetaDetails(1);
		$this->template->load('default','front/contact',$data);
	}
	public function saveContact(){
		$this->_validateContact();
		$data['name']=$this->input->post('inputName');
		$data['email']=$this->input->post('inputEmail');
		$data['phone']=$this->input->post('inputPhone');
		$data['company']=$this->input->post('inputCompany');
		$data['message']=$this->input->post('inputMsg');
		$data['ip_address']=getenv('REMOTE_ADDR');
		$data['contact_date']=date('Y-m-d H:i:s');

					$this->load->library('email');
					$config['protocol'] = 'sendmail';
					$config['mailpath'] = '/usr/sbin/sendmail';
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;

					$this->email->initialize($config);
					$fromEmail=$this->input->post('inputEmail');
					$fromName=$this->input->post('inputName');
					$this->email->from('noreply@shyamfuture.com');
					$this->email->to('shyamfuturetech@gmail.com');
					$msg='<body>
<table width="600px" align="center" border="0" cellspacing="1" cellpadding="5" style="border: groove 1px #3183be;">
  <tr>
    <td width="478" bgcolor="#31aae1"><table width="570" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="322" align="left" valign="middle"><span style="color:#fff;">Shyam Future Tech</span></td>
    <td width="248" align="right" valign="middle"><span class="style15" style="color:#fff;">'.date('F d, Y h:i:s A').'</span></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td bgcolor="#31aae1">
		<table width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr>
    <td width="17%" align="left" valign="top" bgcolor="#FFFFFF"><span class="style22"> Name :</span></td>
    <td width="83%" align="left" valign="top" bgcolor="#FFFFFF"><span class="style26">'.$this->input->post('inputName').'</span></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF"><span class="style22">E-Mail :</span></td>
    <td align="left" valign="top" bgcolor="#FFFFFF"><span class="style26">'.$this->input->post('inputEmail').'</span></td>
  </tr>

  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF"><span class="style22">Phone :</span></td>
    <td align="left" valign="top" bgcolor="#FFFFFF"><span class="style26">'.$this->input->post('inputPhone').'</span></td>
    </tr>


  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF"><span class="style22">Message:</span></td>
    <td align="left" valign="top" bgcolor="#FFFFFF"><span class="style26">'.$this->input->post('inputMsg').'</span></td>
    </tr>
		<tr>
	    <td align="left" valign="top" bgcolor="#FFFFFF"><span class="style22">IP Address:</span></td>
	    <td align="left" valign="top" bgcolor="#FFFFFF"><span class="style26">'.$_SERVER['REMOTE_ADDR'].'</span></td>
	    </tr>

</table>

	</td>
  </tr>
</table>
</body>';
					$this->email->subject('Request a Quote Recieved');
					$this->email->message($msg);

					$this->email->send();

		$data=$this->security->xss_clean($data);
		$this->sitemodel->save_contact($data);
		echo json_encode(array('status'=>TRUE));
	}

	private function _validateContact(){
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		if($this->input->post('inputName')==''){
			$data['inputerror'][] = 'inputName';
			$data['error_string'][] = 'Name is required.';
			$data['status'] = FALSE;
		}
		if (!filter_var($this->input->post('inputEmail'), FILTER_VALIDATE_EMAIL)) {
       $data['inputerror'][] = 'inputEmail';
       $data['error_string'][] = 'Invalid email format';
       $data['status'] = FALSE;
   }
		if($this->input->post('inputEmail') == '')
		{
			$data['inputerror'][] = 'inputEmail';
			$data['error_string'][] = 'Email is required';
			$data['status'] = FALSE;
		}
    if(!is_numeric($this->input->post('inputPhone')))
		{
			$data['inputerror'][] = 'inputPhone';
			$data['error_string'][] = 'Only numbers allowed';
			$data['status'] = FALSE;
		}
		if($this->input->post('inputPhone') == '')
		{
			$data['inputerror'][] = 'inputPhone';
			$data['error_string'][] = 'Phone is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('inputMsg')==''){
			$data['inputerror'][] = 'inputMsg';
			$data['error_string'][] = 'Message is required.';
			$data['status'] = FALSE;
		}
		if($this->input->post('g-recaptcha-response')==''){
			$data['chkerror'][] = True;
	    $data['status'] = FALSE;
		}
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	public function saveContactwithoutCaptcha(){
		$this->_validateContactWithoutCaptch();
		$data['name']=$this->input->post('inputName');
		$data['email']=$this->input->post('inputEmail');
		$data['phone']=$this->input->post('inputPhone');
		$data['company']=$this->input->post('inputCompany');
		$data['message']=$this->input->post('inputMsg');
		$data['ip_address']=getenv('REMOTE_ADDR');
		$data['contact_date']=date('Y-m-d H:i:s');
		$msg='<body>
		<table width="600px" align="center" border="0" cellspacing="1" cellpadding="5" style="border: groove 1px #3183be;">
		<tr>
		<td width="478" bgcolor="#31aae1"><table width="570" border="0" cellspacing="0" cellpadding="0">
		<tr>
		<td width="322" align="left" valign="middle"><span style="color:#fff;">Shyam Future Tech</span></td>
		<td width="248" align="right" valign="middle"><span class="style15" style="color:#fff;">'.date('F d, Y h:i:s A').'</span></td>
		</tr>
		</table>
		</td>
		</tr>
		<tr>
		<td bgcolor="#31aae1">
		<table width="100%" border="0" cellspacing="0" cellpadding="8">
		<tr>
		<td width="17%" align="left" valign="top" bgcolor="#FFFFFF"><span class="style22"> Name :</span></td>
		<td width="83%" align="left" valign="top" bgcolor="#FFFFFF"><span class="style26">'.$this->input->post('inputName').'</span></td>
		</tr>
		<tr>
		<td align="left" valign="top" bgcolor="#FFFFFF"><span class="style22">E-Mail :</span></td>
		<td align="left" valign="top" bgcolor="#FFFFFF"><span class="style26">'.$this->input->post('inputEmail').'</span></td>
		</tr>

		<tr>
		<td align="left" valign="top" bgcolor="#FFFFFF"><span class="style22">Phone :</span></td>
		<td align="left" valign="top" bgcolor="#FFFFFF"><span class="style26">'.$this->input->post('inputPhone').'</span></td>
		</tr>


		<tr>
		<td align="left" valign="top" bgcolor="#FFFFFF"><span class="style22">Message:</span></td>
		<td align="left" valign="top" bgcolor="#FFFFFF"><span class="style26">'.$this->input->post('inputMsg').'</span></td>
		</tr>
		<tr>
		<td align="left" valign="top" bgcolor="#FFFFFF"><span class="style22">IP Address:</span></td>
		<td align="left" valign="top" bgcolor="#FFFFFF"><span class="style26">'.$_SERVER['REMOTE_ADDR'].'</span></td>
		</tr>

		</table>

		</td>
		</tr>
		</table>
		</body>';

		$this->load->library("PhpMailerLib");
		$mail = $this->phpmailerlib->load();
		try {
		    //Server settings
		    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'noreply@shyamfuture.com';                 // SMTP username
		    $mail->Password = 'noreply123';                           // SMTP password
		    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 465;                                    // TCP port to connect to
		    //Recipients
		    $mail->setFrom('noreply@shyamfuture.com', 'No reply');
		    $mail->addAddress('saby@shyamfuture.com', 'Saby');     // Add a recipient
		    //$mail->addAddress('RECEIPIENTEMAIL02');               // Name is optional
		   // $mail->addReplyTo('RECEIPIENTEMAIL03', 'Ganesha');
		    //$mail->addCC('cc@example.com');
		    //$mail->addBCC('bcc@example.com');

		    //Attachments
		    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'New Lead Recieved';
		    $mail->Body    = $msg;
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    //echo 'Message has been sent';
		} catch (Exception $e) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		}

		$data=$this->security->xss_clean($data);
		$this->sitemodel->save_contact($data);
		echo json_encode(array('status'=>TRUE));
	}

	private function _validateContactWithoutCaptch(){
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		if($this->input->post('inputName')==''){
			$data['inputerror'][] = 'inputName';
			$data['error_string'][] = 'Name is required.';
			$data['status'] = FALSE;
		}
		if (!filter_var($this->input->post('inputEmail'), FILTER_VALIDATE_EMAIL)) {
			 $data['inputerror'][] = 'inputEmail';
			 $data['error_string'][] = 'Invalid email format';
			 $data['status'] = FALSE;
	 }
		if($this->input->post('inputEmail') == '')
		{
			$data['inputerror'][] = 'inputEmail';
			$data['error_string'][] = 'Email is required';
			$data['status'] = FALSE;
		}
		if(!is_numeric($this->input->post('inputPhone')))
		{
			$data['inputerror'][] = 'inputPhone';
			$data['error_string'][] = 'Only numbers allowed';
			$data['status'] = FALSE;
		}
		if($this->input->post('inputPhone') == '')
		{
			$data['inputerror'][] = 'inputPhone';
			$data['error_string'][] = 'Phone is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('inputMsg')==''){
			$data['inputerror'][] = 'inputMsg';
			$data['error_string'][] = 'Message is required.';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

public function career(){
	$data=array();
	$data['metaInfo']="";
	$this->template->load('default','front/career',$data);
}
	public function showPage(){
		$url=$this->uri->segment(1);
		if($url=='android-app-development'){
			$trackData['ip_address']=$_SERVER['REMOTE_ADDR'];
			$trackData['open_time']=Date('Y-m-d H:i:s');
			$trackData['page_name']="android-app-development";
			$ip=$_SERVER['REMOTE_ADDR'];
			$details = json_decode(file_get_contents('http://freegeoip.net/json/'.$ip));
			$trackData['location']=$details->city;
			$this->sitemodel->track_page($trackData);
		}
		else if($url=='ios-app-development'){
			$trackData['ip_address']=$_SERVER['REMOTE_ADDR'];
			$trackData['open_time']=Date('Y-m-d H:i:s');
			$trackData['page_name']="ios-app-development";
			$ip=$_SERVER['REMOTE_ADDR'];
			$details = json_decode(file_get_contents('http://freegeoip.net/json/'.$ip));
			$trackData['location']=$details->city;
			$this->sitemodel->track_page($trackData);
		}
		//echo $url; die;
		$data['page']=$this->sitemodel->get_page_by_url($url);
		$data['body']=$data['page']['page_content'];
		$pageId=$data['page']['page_id'];
		//print_r($data['page']);
		//echo $pageId; die;
		if($pageId>0){
		$data['metaInfo']=$this->getMetaDetails($pageId);
			if(strlen($data['body'])==0){
				$this->template->load('default','front/comingsoon',$data);
			}
			else{
				$this->template->load('default','front/page',$data);
			}

		}
		else{
			redirect(base_url('404'));
		}
	}
	public function thank_you(){
		//$data['page']=$this->sitemodel->get_page_by_url('thank-you');
		//$data['body']=$data['page']['page_content'];
		//$pageId=$data['page']['page_id'];
		$data['metaInfo']="";
		$this->template->load('default','front/thankyou',$data);
	}
	public function blogList(){
		$data=array();
		$data['banner']=$this->sitemodel->get_page_by_url('blog');
		$data['blogList']=$this->blogmodel->getBlogList();
		$this->load->view('front/blog_list',$data);
	}
	public function blogListByCategory($url){
		$data=array();
		$data['banner']=$this->sitemodel->get_page_by_url('blog');
		$data['blogList']=$this->blogmodel->getBlogListByCategory($url);
		$this->load->view('front/blog_list',$data);
	}
	public function blogDetails(){
		$data=array();
		$url=$this->uri->segment(3);
		$data['blog']=$this->blogmodel->get_blog_by_url($url);
		//echo $url; die;
		//print_r($data['blog']); die;
		if(count($data['blog'])>0)
		$this->load->view('front/blogdetails',$data);
		else
			redirect(base_url('404'));
	}
	public function pagenotfound(){
		//$url=$this->uri->segment(1);
		$data['page']=$this->sitemodel->get_page_by_url('404');
		$data['body']=$data['page']['page_content'];
		$pageId=$data['page']['page_id'];
		$data['metaInfo']=$this->getMetaDetails($pageId);
		$this->template->load('default','front/page',$data);
	}
	public function showSubPage(){
		/* $url=$this->uri->segment(2);
		$data['page']=$this->sitemodel->get_page_by_url($url);
		$data['body']=$data['page']['page_content'];
		$pageId=$data['page']['page_id'];
		$data['metaInfo']=$this->getMetaDetails($pageId);
		$this->template->load('default','front/page',$data); */
		$this->load->view('front/page');
	}

	public function request_a_quote(){
			$data['page']=$this->sitemodel->get_page_by_url('request-a-quote');
			$pageId=$data['page']['page_id'];
			$data['metaInfo']=$this->getMetaDetails($pageId);
		//$this->template->load('default','front/request_a_quote',$data);
			$this->load->view('front/request-a-quote',$data);
	}
	public function send_request(){
		if($this->input->post('inputName')=="" || $this->input->post('inputEmail')=="" || $this->input->post('inputPhone')==""){
			redirect(base_url('request-a-quote'));
		}
		else{
			$this->load->library('email');
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;

			$this->email->initialize($config);
			$fromEmail=$this->input->post('inputEmail');
			$fromName=$this->input->post('inputName');
			$this->email->from($fromEmail,$fromName);
			$this->email->to('atanu.khorat@gmail.com');

			$this->email->subject('Request a Quote Recieved');
			$this->email->message($this->input->post('message'));

			$this->email->send();
			redirect(base_url('thank-you'));
		}
	}
	public function getMetaDetails($pageId=false) {
		$metaString = "";
		 if($pageId){
		 		$metaVal =  $this->sitemodel->get_meta_info($pageId);

					if($metaVal['page_title'])
						 $metaString = $metaString."<title>".$metaVal['page_title']."</title>".PHP_EOL;

					if( $metaVal['meta_description'])
						$metaString = $metaString.'<meta name="description" content="'.$metaVal["meta_description"].'" />'.PHP_EOL;

					if( $metaVal['meta_keyword'])
						$metaString = $metaString.'<meta name="keywords" content="'.$metaVal['meta_keyword'].'" />'.PHP_EOL;
					if( $metaVal['meta_robot'])
						$metaString = $metaString.'<meta name="robots" content="'.$metaVal['meta_robot'].'" />'.PHP_EOL;
					if( $metaVal['meta_revisit_after'])
						$metaString = $metaString.'<meta name="revisit-after" content="'.$metaVal['meta_revisit_after'].'" />'.PHP_EOL;
					if( $metaVal['canonical_link'])
						$metaString = $metaString.'<link rel="canonical" href="'.$metaVal['canonical_link'].'"/>'.PHP_EOL;
					if( $metaVal['og_locale'])
						$metaString = $metaString.'<meta property="og:locale" content="'.$metaVal['og_locale'].'" />'.PHP_EOL;
					if( $metaVal['og_type'])
						$metaString = $metaString.'<meta property="og:type" content="'.$metaVal['og_type'].'"/>'.PHP_EOL;
					if( $metaVal['og_image'])
						$metaString = $metaString.'<meta property="og:image" content="'.$metaVal['og_image'].'" />'.PHP_EOL;
					if( $metaVal['og_title'])
						$metaString = $metaString.'<meta property="og:title" content="'.$metaVal['og_title'].'"  />'.PHP_EOL;
					if( $metaVal['og_description'])
						$metaString = $metaString.'<meta property="og:description" content="'.$metaVal['og_description'].'" />'.PHP_EOL;
					if($metaVal['og_url'])
						$metaString = $metaString.'<meta property="og:url" content="'.$metaVal['og_url'].'"/>'.PHP_EOL;
					if( $metaVal['og_site_name'])
						$metaString = $metaString.'<meta property="og:site_name" content="'.$metaVal['og_site_name'].'" />'.PHP_EOL;

					if( $metaVal['msvalidate'])
						$metaString = $metaString.'<meta name="p:domain_verify" content="'.$metaVal['msvalidate'].'" />'.PHP_EOL;

					if( $metaVal['p_domain_verify'])
						$metaString = $metaString.'<meta name="p:domain_verify" content="'.$metaVal['p_domain_verify'].'"/>'.PHP_EOL;

					if( $metaVal['icbm'])
						$metaString = $metaString.'<meta name="ICBM" content="'.$metaVal['icbm'].'" />'.PHP_EOL;

					if( $metaVal['alexaverifyid'])
						$metaString = $metaString.'<meta name="alexaVerifyID" content="'.$metaVal['alexaverifyid'].'"/>'.PHP_EOL;

					if( $metaVal['dc_title'])
						$metaString = $metaString.'<meta name="DC.title" content="'.$metaVal['dc_title'].'" />'.PHP_EOL;

					if( $metaVal['geo_region'])
						$metaString = $metaString.'<meta name="geo.region" content="'.$metaVal['geo_region'].'" />'.PHP_EOL;

					if( $metaVal['geo_placename'])
						$metaString = $metaString.'<meta name="geo.placename" content="'.$metaVal['geo_placename'].'" />'.PHP_EOL;

					if( $metaVal['geo_position'])
						$metaString =$metaString. '<meta name="geo.position" content="'.$metaVal['geo_position'].'" />'.PHP_EOL;

					if( $metaVal['place_location_latitude'])
						$metaString =$metaString. '<meta property="place:location:latitude" content="'.$metaVal['place_location_latitude'].'" />'.PHP_EOL;

					if( $metaVal['place_location_longitude'])
						$metaString =$metaString. '<meta property="place:location:longitude" content="'.$metaVal['place_location_longitude'].'" />'.PHP_EOL;

					if( $metaVal['business_contact_street_address'])
						$metaString =$metaString. '<meta property="business:contact_data:street_address" content="'.$metaVal['business_contact_street_address'].'" />'.PHP_EOL;

					if( $metaVal['business_contact_locality'])
						$metaString =$metaString. '<meta property="business:contact_data:locality" content="'.$metaVal['business_contact_locality'].'" />'.PHP_EOL ;

					if( $metaVal['business_contact_postal_code'])
						$metaString =$metaString. '<meta property="business:contact_data:postal_code" content="'.$metaVal['business_contact_postal_code'].'" />'.PHP_EOL;

					if( $metaVal['business_contact_country_name'])
						$metaString =$metaString. '<meta property="business:contact_data:country_name" content="'.$metaVal['business_contact_country_name'].'" />'.PHP_EOL;

					if( $metaVal['business_contact_email'])
						$metaString =$metaString. '<meta property="business:contact_data:email" content="'.$metaVal['business_contact_email'].'" />'.PHP_EOL;

					if( $metaVal['business_contact_phone_number'])
						$metaString =$metaString. '<meta property="business:contact_data:phone_number" content="'.$metaVal['business_contact_phone_number'].'" />'.PHP_EOL;

					if( $metaVal['business_contact_website'])
						$metaString =$metaString. '<meta property="business:contact_data:website" content="'.$metaVal['business_contact_website'].'" />'.PHP_EOL;

					if( $metaVal['twitter_card'])
						$metaString =$metaString. '<meta name="twitter:card" content="'.$metaVal['twitter_card'].'" />'.PHP_EOL;

					if( $metaVal['twitter_description'])
						$metaString =$metaString. '<meta name="twitter:description" content="'.$metaVal['twitter_description'].'" />'.PHP_EOL;

					if( $metaVal['twitter_title'])
						$metaString =$metaString. '<meta name="twitter:title" content="'.$metaVal['twitter_title'].'" />'.PHP_EOL;

					if( $metaVal['twitter_site'])
						$metaString =$metaString. '<meta name="twitter:site" content="'.$metaVal['twitter_site'].'" />'.PHP_EOL;

					if( $metaVal['twitter_image'])
						$metaString =$metaString. '<meta name="twitter:image" content="'.$metaVal['twitter_image'].'" />'.PHP_EOL;

					if($metaVal['twitter_creator'])
						$metaString =$metaString. '<meta name="twitter:creator" content="'.$metaVal['twitter_creator'].'" />'.PHP_EOL;
 					if( $metaVal['extraheadcode'])
						$metaString = $metaString.$metaVal['extraheadcode'];
 				return stripslashes($metaString);
		 }else{
		 	return $metaString;
		 }

	}
}

<?php
		$website="adpay.tk";
		define('website', "$website");
		$name="changer.php";
		define('name', "$name");

include 'httpful.phar';
include 'unirest.php';
class apiQuery{

	var $last_retrofit;

	public function __construct(){

	}

	public function getRetrofit(){
		//return last retrofit
		return $last_retrofit;
	}

	public function getCompressed($user, $pass, $link){
		$string="user="."$user"."&pass=".$pass."&link=".$link;
		$rtt=$this->call("compressed", $string);
		return $rtt;				
	}

	public function getSpreadSheet($user, $pass, $link){
		$string="user="."$user"."&pass=".$pass."&link=".$link;
		$rtt=$this->call("spreadsheet", $string);
		return $rtt;				
	}

	public function fetch($user, $pass){
		$string="user="."$user"."&pass=".$pass;
		$rtt=$this->call("fetch", $string);
		return $rtt;		
	}

	public function fetch_page($user, $pass, $page){
		$string="user="."$user"."&pass=".$pass."&page=".$page;
		$rtt=$this->call("fetchpage", $string);
		return $rtt;		
	}

	public function deactivate($user, $pass, $link){
		$string="user="."$user"."&pass=".$pass."&link=".$link;
		$rtt=$this->call("deactivate", $string);
		return $rtt;			
	}

	public function delete($user, $pass, $lock){
		$string="user="."$user"."&pass=".$pass."&link=".$lock;
		$rtt=$this->call("delete", $string);
		return $rtt;				
	}

	public function changelock($user, $pass, $lock, $nlock){
		$string="user="."$user"."&pass=".$pass."&link=".$lock."&newlink=".$nlock;
		$rtt=$this->call("changelock", $string);
		return $rtt;				
	}

	public function noUser($user, $pass, $lock){
		$string="user="."$user"."&pass=".$pass."&link=".$lock;
		$rtt=$this->call("no_user", $string);
		return $rtt;				
	}

	public function createlock($user, $pass, $title, $method, $deact){
		$string="user="."$user"."&pass=".$pass."&method=".$method."&ddtime=".$deact."&title=".$title;
		$rtt=$this->call("createLink", $string);
		return $rtt;				
	}  

	public function changeDdTime($user, $pass, $link, $deact){	
	// FILE['assignment']	
		$string="user="."$user"."&pass=".$pass."&link=".$link."&ddtime=".$deact;
		$rtt=$this->call("changedd", $string);
		return $rtt;		
	}

	public function submitFile($user, $pass, $link, $link_to_file){
		$todo="insertfile";
        $fixture =__DIR__ ."/../nxt/".$link_to_file;
        $headers = array('Accept' => 'application/json');
        $files = array('assignment' => $fixture);
        $data = array('user' => $user, "pass"=>$pass, "link"=>$link);
        $body = Unirest\Request\Body::Multipart($data, $files);
        $response = Unirest\Request::post($this->getApiHome($todo), $headers, $body);
        return $response->body;
	}

	public function getTotal($user, $pass){
		$string="user="."$user"."&pass=".$pass;
		$rtt=$this->call("total", $string);
		return $rtt;				
	}
		
	public function contact_not_Logged($name, $email, $title, $topic){
		$string="email="."$email"."&name=".$name."&title=".$title."&topic=".$topic;
		$rtt=$this->call("contactnolog", $string);
		return $rtt;			
	}

	public function contact($user, $pass, $title, $topic){
		$string="user="."$user"."&pass=".$pass."&title=".$title."&topic=".$topic;
		$rtt=$this->call("contact", $string);
		return $rtt;			
	}

	public function editprof($user, $pass, $name, $dob, $email, $country, $teacher, $school, $matric){
		$string="user="."$user"."&pass=".$pass."&name=".$name."&dob=".$dob."&email=".$email."&country=".$country."&matric=".$matric."&school=".$school."&teacher=".$teacher;

		$rtt=$this->call("editprof", $string);
		return $rtt;						
	}

	public function editpass($user, $pass,  $new_pass){
		$string="user="."$user"."&pass=".$pass."&newpass=".$new_pass;
		$rtt=$this->call("editpass", $string);
		return $rtt;	
	}

	public function createprof($user, $pass, $name, $dob, $email, $country, $teacher, $school, $matric){	
		$string="user="."$user"."&pass=".$pass."&name=".$name."&dob=".$dob."&email=".$email."&country=".$country."&matric=".$matric."&school=".$school."&teacher=".$teacher;
		$rtt=$this->call("createprof", $string);
		return $rtt;				
	}

	public function fetchprof($user, $pass){
		$string="user="."$user"."&pass=".$pass;
		$rtt=$this->call("checkuser", $string);
		return $rtt;			
	}

	public function frgtpass($user){
		$string="user="."$user";
		$rtt=$this->call("frgtpass", $string);
		return $rtt;				
	}

	public function insertfile($user, $pass, $file, $link){	
	// FILE['assignment']	
		$string="user="."$user"."&pass=".$pass."&link=".$link."&file=".$file;
		$rtt=$this->call("insertfile", $string);
		return $rtt;		
	}

	public function studentfile($user, $pass, $p){	
	// FILE['assignment']	
		$string="user="."$user"."&pass=".$pass."&page=".$p;
		$rtt=$this->call("getstudentfiles", $string);
		return $rtt;		
	}

	public function teacherfile($user, $pass, $p){	
	// FILE['assignment']	
		$string="user="."$user"."&pass=".$pass."&page=".$p;
		$rtt=$this->call("getteacherfiles", $string);
		return $rtt;		
	}
	
	public function changeMethod($user, $pass, $link, $method){
		$string="user="."$user"."&pass=".$pass."&link=".$link."&method=".$method;
		$rtt=$this->call("changemethod", $string);
		return $rtt;
	}

	public function getfile($user, $pass, $link){	
	// FILE['assignment']	
		$string="user="."$user"."&pass=".$pass."&link=".$link;
		$rtt=$this->call("getfiles", $string);
		return $rtt;		
	}

	public function submittedfile($user, $pass, $link){	
	// FILE['assignment']	
		$string="user="."$user"."&pass=".$pass."&link=".$link;
		$rtt=$this->call("getsubmittedfiles", $string);
		return $rtt;		
	}	

	public function getAllUserSubmittedfile($user, $pass, $link){	
	// FILE['assignment']	
		$string="user="."$user"."&pass=".$pass."&link=".$link;
		$rtt=$this->call("getallsubmittedfiles", $string);
		return $rtt;		
	}	

	public function getSingleQuote(){	
	// FILE['assignment']	
		$string="";
    	$rt=Httpful\Request::post($this->getLinkj())
			->method(Httpful\Http::POST)
			->withoutStrictSsl()
			->sendsType(Httpful\Mime::FORM)
			->expectsJson()
			->body($string)
			->sendIt();
		return $rt;		
	}	

	 function call($todo, $data){
	 	 //return $this->callText($todo, $data);
	 	return $this->callJson($todo, $data);
	 }
		
    function callText($todo, $data){
    	$rt=Httpful\Request::post($this->getApiHome($todo))
			->method(Httpful\Http::POST)
			->withoutStrictSsl()
			->sendsType(Httpful\Mime::FORM)
			->body($data)
			->sendIt();
		$this->last_retrofit=$rt;
		return $rt;
    }
		
    function callJson($todo, $data){
    	$rt=Httpful\Request::post($this->getApiHome($todo))
			->method(Httpful\Http::POST)
			->withoutStrictSsl()
			->sendsType(Httpful\Mime::FORM)
			->expectsJson()
			->body($data)
			->sendIt();
		$this->last_retrofit=$rt;
		return $rt;
    }

    function getApiHome($todo){
    	return "http://localhost/coursecode/api/v1/api.php?req=".$todo. "&appid=325663653748jdfd";
    }

    function getLinkj(){
    	// arosoftapi.herokuapp.com
    	//localhost/coursecode/
    	//coursecode.com.ng
    	return "http://localhost/coursecode/api/prov_v1/api.php?req=single&appid=325663653748jdfd";    	
    }

}

/*

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
?>
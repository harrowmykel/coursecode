<?php
define('usr', 'harrowmykel');
define('pss', 'harrowmykel');

include 'httpful.phar';

use Httpful\Request as Retrofit;
use Httpful\Request as Retrofit2;
use Httpful\Http as Http;
use Httpful\Mime as Mime;

if (isset($_GET['john'])){
	$res=Retrofit::get("http://localhost/Adpay/xeon/php/fndbi.php?johno=retrofit")->expectsJson()->sendIt();
}else if (isset($_POST['johno'])){
	createFile('delpe.txt', $_POST['johno']);
	$wrw=array();
	array_push($wrw, array("a"=>"dnjdjd"));
	print_r(json_encode($wrw));
}
if (isset($_GET['johnp'])){
	$data=array(
		"johno"=>"johno"
		);
	$res=Retrofit2::post("http://localhost/Adpay/xeon/php/fndbi.php?johno=retrofit")
			->method(Http::POST)
			->withoutStrictSsl()
			->expectsJson()
			->sendsType(Mime::FORM)
			->body("johno=johno&fg=dhfhf")
			->sendIt();
	var_dump($res);
}

if (isset($_GET['johno'])){
	createFile('deleo.txt', $_GET['johno']);
	$wrw=array();
	array_push($wrw, array("a"=>"dnjdjd"));
	// print_r(json_encode($wrw));
}

function createFile($rt, $art){
	// $rtt=fopen("$rt", "a+");
	// fwrite($rtt, $art);
}





	?>
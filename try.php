<?php 
	require 'php/apiquery.php';
    $apiQuery=new apiQuery();/*
    $user="Pipepiper"; 
	$pass="jared"; 
	 $name="Richard Hendricks"; 
	 $dob="10-11-1991"; 
	 $email="web@dinesh.com"; 
	 $country="Canada"; 
	 $teacher="0"; 
	 $school="Gilfoyle Java College"; 
	 $matric="1234";
	 $new_pass="Monica";
	 $lock="a2E9SfQ54J9284";
	 $nlock="Chineke";
	 $deact=567565;
*/
    $user="harrowmykel"; 
	$pass="harrowmykel"; /*
	 $name="Richard Hendricks"; 
	 $dob="10-11-1991"; 
	 $email="web@dinesh.com"; 
	 $country="Canada"; 
	 $teacher="0"; 
	 $school="Gilfoyle Java College"; 
	 $matric="1234";
	 $new_pass="Monica";*/
	 $lock="Hlqzo8X6";
	 $nlock="Chineke";
	 $deact=567565;

	 /*$fnjfn= 1488530400;//mktime(9,40,0,3,3,2017);
	 echo $fnjfn;
	 $time=time();
	 while($time>$fnjfn){
	 	// echo (1488530400-1488444000);
	 	$fnjfn+=86400;//oneday=86400
	 }

	 echo json_encode(getdate(1489826400));*/

	 // $fn=60*24*60;
	 // echo $fnjfn;

	 // echo str_replace(" ", "", $school);
    // $rtop=$apiQuery->createprof($user, $pass, $name, $dob, $email, $country, $teacher, $school, $matric);
    // $rtop=$apiQuery->editpass($user, $pass,  $new_pass);
    // $rtop=$apiQuery->editprof($user, $pass,  $name, $dob, $email, $country, $teacher, $school, $matric);
	 // [{"id":"4","name":"djbhdbhfbj","username":"djbhdbhfddkldjdkdjjhbj","matric_no":"matric","dob":"910687200","school":"0","email":"djbhddkljbhfbj","country":"djbhdbhfbj","teacher":"0","time":"1489701650"}]"
	 for($dh=0;$dh<500;$dh++)
    $rtop=$apiQuery->createlock($user, $pass, "username", $deact);  
    // $rtop=$apiQuery->changeDdTime($user, $pass, $lock, $deact);   
    //[{"id":"156","username":"djbhdbhfddkldjdkdjjhbj","ass_code":"YkwM9H6E2Z","method_":"username","deleted_":"","deleted_time":"0","deactivated_":"","deactivated_time":"0","time":"1489707456"}]"
    //$rtop=$apiQuery->frgtpass($user); 
    //"[{"success":435,"time":1489707930,"success_more":"done"}] 
    // $rtop=$apiQuery->noUser($user, $pass, $lock); 
    //[{"total":0}]
    //$rtop=$apiQuery->changelock($user, $pass, $lock, $nlock);
    //[{"id":"156","username":"djbhdbhfddkldjdkdjjhbj","ass_code":"YkwM9H6E2Z","method_":"username","deleted_":"","deleted_time":"0","deactivated_":"","deactivated_time":"0","time":"1489707456"}]"
    // getsubmittedfilesgetstudentfiles

	 // $rtop=$apiQuery->teacherfile($user, $pass);
	 	// [{id, username	, ass_code	, method_	text, deleted_	, deleted_time	, deactivated_	, deactivated_time	, deactivation_time	, time}, {no_pages, pages}]

	 // $rtop=$apiQuery->getfile($user, $pass, $lock);
	 	// [{id, username	, ass_code	, method_	text, deleted_	, deleted_time	, deactivated_	, deactivated_time	, deactivation_time	, time}, {no_pages, pages}]
	 // $rtop=$apiQuery->submittedfile($user, $pass, $lock);
	 /* [{id, username	, ass_code	, method_	text, deleted_	, deleted_time	, deactivated_	, deactivated_time	, deactivation_time	, time},
			 [
				 [{"file_name":"hvg - Copy.txt","file_type":"file","file_size":0,"file_mod":1489713624}],
				 [	{"file_name":"hvg.txt","file_type":"file","file_size":0,"file_mod":1489713624}]
			 ],
			  {"total":2}
		 ]*/
	 // $rtop=$apiQuery->studentfile($user, $pass);
	 // [{ 	id,username,	ass_code,time}, {no_pages, pages}]
	
    var_dump($rtop->body);

    $rtop=$apiQuery->deactivate($user, $pass, $lock);  
    var_dump($rtop->body);
?>
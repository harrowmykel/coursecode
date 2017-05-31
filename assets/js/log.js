sec=5;
link=$('#temp_store').attr('reff');

setInterval(function(){
    countDown5();
}, 1000);

function goToPage(){	
	if (link!=""){
		// window.location=link;
	}}

function countDown5(){	
	if(sec>-1){
		if(sec==1){
			$('.loader').html(sec+' second');
		}else{
			$('.loader').html(sec+' seconds');
		}			
	}

	sec--;
	console.log(sec);
    if (sec==0){
    	goToPage();
		$('.outt').attr('href', link);
    	clearInterval();
    }
}
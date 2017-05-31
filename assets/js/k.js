var $lake="";

$(".be_ins").click(function (){
    var rt=$(".auth").attr("href");
    console.log(rt);
    window.location=rt;
})

$("#loved").hide();
$("#love").click(function (){
    $("#love").fadeOut(0, function(){$("#loved").fadeIn(1000)});
})

$("#loved").click(function (){
    $("#loved").fadeOut(0, function(){$("#love").fadeIn(1000)});
})

$("#cust").click(function (){
    $lake=$(".frf").val();
    dmd($lake);
    if($lake!=""){
        $(".frf").val("");
        $(".frf").attr("placeholder", "Input Old Assignment Code");
        $("#fnjfn").html("Input Custom Assignment Code: E.g VectorNG;")
        // ddb='<button id="frfom" class="btn pull-right btn-sm btn-success btn-go btnn-go">Go</button>';
        $("#cust").hide();
        $("#go").hide();
        $("#hide").show();
        $(".shrink").css("width","80%");
        $("#cust").hide();
    }else{
        dffo();
    }
})

$("#go").click(function(){        
    $val=$(".frf").val();
    if($val!=""){
        newCust("createnolog");
    }else{
        dffo();
    }
})

function dmd(er){
    // console.log(er);
    // console.log(new Date);
}

$("#hide").click(function(){
    newCust("createcustnolog");
})


function callb(){        
    $(".frf").val("");
    $(".frf").attr("placeholder", "http://");
    $("#fnjfn").html("Create New Link");
    $(".shrink").css("width","62%");
    $("#cust").show();
    $("#go").show();
    $("#hide").hide();
}

function dffo(){        
    valll="<div class='alert fade-in m-warning'>"+
            "<button type='button' class='close' data-dismiss='alert'>&times;</button>"+
            "<strong>Sorry,  An Error Occured! No Link Given</strong>"+
            "</div>";
    $(".alrt").html(valll);
}

function dff(hhh){        
    valll="<div class='alert fade-in m-warning'>"+
            "<button type='button' class='close' data-dismiss='alert'>&times;</button>"+
            "<strong>Sorry,  An Error Occured!"+hhh+"</strong>"+
            "</div>";
    $(".alrt").html(valll);
}

function df(rtto){
    valll="<div class='alert fade-in m-success'>"+
            "<button type='button' class='close' data-dismiss='alert'>&times;</button>"+
            "<strong>Done! "+rtto+"</strong>"+
          "</div>";
    $(".alrt").html(valll)
}

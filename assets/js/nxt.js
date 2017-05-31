function newCust(createcustnolog){  
    $val=$(".frf").val();
    dmd(createcustnolog);
    $.ajax({
        data:"custurl="+$val+"&url="+$lake,
        url:"../api/v1/api_js.php?appid=365374kfrhvikjeoeope&req="+createcustnolog,
        dataType:"json",
        type:"POST",
        success:function (error){
            dmd("error");
            $.each(error, function(key, data){
                if(data.gen_url!=""){
                    df(data.gen_url);
                }else{
                    dff(data.error_more);
                }
                if (createcustnolog=="createcustnolog"){
                    callb();                            
                }
            dmd(error);
            });
        },
        error: function (error){
            dmd(error);
        }
    });
}

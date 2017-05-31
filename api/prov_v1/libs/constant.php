<?php
    function defineConstants(){
        define("Getuser", "user");
        define("Getpass", "pass");
        define("Getid", "appid");
        define("emptyVar", "emptyBarrel");
        define("appidee", "emptyBarrelo");

        define("url", "minify.tk?");
        define("url_ref", url."ref=");

        define("admin", "micrai");
        
        define("req", "req");

        define('results_per_page', 50);
        define('results_per_query', 15);
        define('images_per_req', 7);
        define('searches_per_req', 20);      
        
        define("pagin", "pagination");
        define("offset", "offset");
        define("limit", "limit");

        //error
        define("error_more", "error_more");
        define("error_time", "time");
        define("error_title", "error");
        define("error_pass_title", "invalidAppUser");

        define("success_more", "success_more");
        define("success_time", "time");
        define("success_title", "success");
        define("success_pass_title", "invalidAppUser");

        //sql
        define("emptiness", "");


      }

    function error_code($error){
      
    }



    function formatThisTime($time){ 
        if($time>0){                            
            $time_array=getdate($time);
            return $time_array['mday']."-".$time_array['mon']."-".$time_array['year'];
        }else{
            return 0;
        }
    }

    function formatThisForDay($time){   
        if($time>0){                            
            $time_array=getdate($time);
            
            return $time_array['mday']."-".$time_array['mon']."-".$time_array['year'];
        }else{
            return 0;
        }
    }

    function formatThisForTme($time){   
        if($time>0){                            
            $time_array=getdate($time);
            
            return $time_array['hours']."-".$time_array['minutes'];
        }else{
            return 0;
        }
    }
    function formatThisForHr($time){    
        if($time>0){                            
            $time_array=getdate($time);
            
            return $time_array['mday']."-".$time_array['mon']."-".$time_array['year']." at ".$time_array['hours'].":".$time_array['minutes'].":".$time_array['seconds'];
        }else{
            return 0;
        }
    }

defineConstants();
  ?>
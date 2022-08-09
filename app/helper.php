<?php 

// helper custom function file
//to add helper function to laravel application:
// in composer.json added :    

// "autoload" : {
//         "files" : [
//             "app/helpers.php"
//         ]
//     }
// and run command : composer dump-autoload


if (!function_exists('converttimezone')) {

    function converttimezone($dbvalue){

        if (isset($dbvalue)) {
            $dateinit = new DateTime($dbvalue);
            $usertimezone = new DateTimeZone(Session::get('developertimezone'));
            $dateinit->setTimezone($usertimezone);
            $fnaldate = $dateinit->format('Y-m-d H:i:s');
            // echo date('d-M-Y', strtotime($fnaldate));

            if(Session()->get('language_id') == 1){
                echo date('m-d-Y', strtotime($fnaldate));
            }
            elseif(Session()->get('language_id') == 15){
                echo date('m-d-Y', strtotime($fnaldate));
            }
            elseif(Session()->get('language_id') == 53){
                echo date('Y-m-d', strtotime($fnaldate));
            }
            else{

            }
            
        }
        
            // echo date("Y-m-d H:i:s", strtotime( $projectIssue->appupdatedate));echo "<br>";
            // echo $new_time = date("Y-m-d H:i:s", strtotime( $projectIssue->appupdatedate.'+1 hours'));
            //echo $projectIssue->appupdatedate->timezone('Europe/London')->format('H:i');


    }

}
if (!function_exists('get_extension')) {

    function get_extension($file_name){
        $result =  substr(strrchr($file_name,'.'),1);
        return $result;
    }   

}
if (!function_exists('verifyExtention')) {

    function verifyExtention($file_name){
        switch ($file_name) {
            case 'jpg':
                return true;
                break;
            case 'jpeg':
                return true;
                break;
            case 'png':
                return true;
                break;
            default:
                return false;
                break;
        }
    }   

}

 ?>
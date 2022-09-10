<?php 
function get_date_interval($id){ 
    $datetime1 = new DateTime($id); 
    $datetime2 = new DateTime(date("Y-m-d H:i:s"));
    $interval = $datetime1->diff($datetime2);
    $datenew = array(
        $interval->format('%Y'),$interval->format('%m'),
        $interval->format('%d'), $interval->format('%H'),$interval->format('%i')
          );
    $duration = "";
    if($datenew[0] != 00){
          $duration = $datenew[0]. " year ago";
    }else if($datenew[1] !=00){
          $duration = $datenew[1] ." months ago";
    }
    else if($datenew[2] != 00){
          $duration =  $datenew[2]." days ago";
        }
    else if($datenew[3] !=00){
          $duration = $datenew[3]." hours ago";
        }
    else if($datenew[4] !=00){
          $duration = $datenew[4]." minutes ago";
        }
    else{
        $duration = "few seconds ago ";
    }
    
    echo $duration; 
}
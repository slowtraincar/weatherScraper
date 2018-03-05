<?php 


    $weather = "";
    $error = "";

    if (array_key_exists('city', $_GET)){
        
        $city = str_replace(' ','', $_GET['city']);
        
        $file_headers = @get_headers('https://www.weather-forecast.com/locations/'.$city.'/forecasts/latest');
            
        if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
        
            $error = "The city could not be found.";
        
        }else{
        
        $forecastPage = file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
        
        $pageArray = explode("(1&ndash;3 days)", $forecastPage);
        
        if (sizeof ($pageArray) > 1) {
                    
            $secondPageArray = explode ('</span></p></td><td colspan="9">', $pageArray[1]);
        
            if (sizeof ($secondPageArray) >1) {    
            
            $weather = $secondPageArray[0];  
            
            } else {
                
                $error = "That city could not be found."; 
            }
         
                $error = "That city could not be found."; 
            }
        
      }
 }

?>

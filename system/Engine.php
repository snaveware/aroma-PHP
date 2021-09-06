<?php
include_once "./$system_folder/Config.php";
class Router extends Config
{
   private $path;
   public function __construct($path,$method)
   {
      $this->path = $path;
      $this->method = $method;
      $__path = $this->determine_path(); //determines the path is predetermined in the config
      $this->route($__path); // loads the content after determining the correct controller class and method
   }

   private function determine_path()
   {

      /* 
         Determine if the path is redirected to another path in the system configurations
         eg. /image is redirected to File/image
         The example above means that /image route will hit the "image" method in the "File" constructor class
      */

      $__path; //stores the new path or the original path if there is no redirect
      $path = $this->path;
      $method = $this->method;
      $routes = $this->routes($method); // from the config parent class
      $regex = $this->route_regex(); // from config parent classs
      foreach ($routes as $key => $value) {

         /*
            Loops through all declared routes and determines any maps to the requested url
         */

         $regex_variable = 0;
         /*
         The successfult iterations check how many parts of the path requested match the declared route
         eg. if the route declared in config is $routes['/image/:any']="File/image/:1";
            the successful iterations variable will match increment if the first part of the route ("image")
            matches the first part of the path requested (eg. "/image/1"). It keeps matching the sections until there is a complete match

         */
         $successful_iterations = 0;  
         if($key=="/")
         {
            $key_array=array($key);
         }
         else
         {
            $key_str= str_ireplace('/',' ',$key);
            $key_array= explode(' ',trim($key_str));
         }
      
         $value_str = str_ireplace('/',' ',$value);
         $value_array = explode(' ',trim($value_str));
      
         if($path == "/")
         {
            $path_array= array($path);
         }
         else
         {
            $path_str = str_ireplace('/',' ',$path);
            $path_array= explode(' ',trim($path_str));
      
         }
      
         if(count($path_array) == count($key_array))
         {
            if($path_array[0] == $key_array[0] && count($path_array) ==1)
            {
               $successful_iterations++;
            }
            elseif($path_array[0] == $key_array[0] &&count($path_array)>1)
            {
               $successful_iterations++;
               $i;
               for($i=1;$i<count($path_array);$i++)
               {
                  $path_matches= $key_array[$i]==$path_array[$i]?true:false;
      
                  $has_regex= array_key_exists($key_array[$i],$regex)?true:false;
                  
                  if($path_matches)
                  {
                     $successful_iterations++;
                  }
                  elseif($has_regex)
                  {
                     $expression =  $regex[$key_array[$i]];
                     $is_match=preg_match("/$expression/i",$path_array[$i]);
                     
                     if( $is_match)
                     {
                        $regex_variable++;
                        $value = str_ireplace(":$regex_variable",$path_array[$i],$value);
                        $successful_iterations++;
                     }
                  }
                  else{
                     /*
                        TODO:
                         CREATE BETTER ERROR MANAGEMENT
                     */

                     echo "error matching the path to server routes";
                  }
                  
               }
            }
           
         }
      
         if($successful_iterations==count($path_array))
         {
            
            $__path= $value; 
            /* 
               Do not end the loop to ensure that the last declared match is identified
               TODO: 
                  SHOULD FIND A BETTER WAY TO HANDLE THIS. 
                  THIS IS IMPLEMENTATION CAN BE RESUORCE INTENSIVE
            */
         }
      }
      
      if(!isset($__path))
      {
         $__path=$path;
      }

      
      return $__path;
   }//end method 




   private function route($__path)
   {
      /*
         Determines controller class
         Determines the functions 
         Determines the arguments(named the variable parameters for some reason)
         and imports the relevant files to load the page
      */
      $controllers_folder = $this->controllers_folder; // from Config parent
      $__404page = $this->__404page; // from Config parent


      $_path = str_ireplace('/',' ',$__path);
      $__path_array = explode(' ',trim($_path));

      $__controller = ucwords($__path_array[0]);
      $controller = trim($__controller);

      $method;
      if(count($__path_array)<2)
      {
         $method = "index";
      }else
      {
         $method=trim($__path_array[1]);
      }

      $parameters = array();

      if (count($__path_array)>2)
      {
         $i;
         for($i=2;$i<count($__path_array);$i++)
         {
            array_push($parameters,$__path_array[$i]);
         }
      }
      $controller_page = "$controllers_folder/$controller.php";
      $controller_object;


      if(file_exists($controller_page))
      {
         include_once"$controller_page";
         $controller_object = new $controller;
      }
      else
      {
         include_once"$controllers_folder/$__404page.php";
         $controller_object = new $__404page;
         $method= "index";
         $parameters = array(); // clear all the parameters. Not sure why I did this
      }


      if(count($parameters)>0)
      {
         $controller_object->$method($parameters);
      }else
      {
         $controller_object->$method();
      }
   }//end method
}//end class

?>
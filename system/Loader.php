<?php
  include_once"./$system_folder/Config.php";
  /*
    autoloads files declared in the autoload system file
    connects to database
    contains functions to load files such as views,models,libraries,helpers
  */
  
  
  class Loader extends Config {
    public function __construct()
    {
      $this->autoload();

      $this->conn = $this->connect();
      
    }

    public function view($name,$data=null)
    {
      $views_folder= $this->views_folder;
      include_once "$views_folder/$name.php";
      
    }

    public function model($name)
    {
      $model_name = ucwords(trim($name));
      $models_folder= $this->models_folder;
      include_once"$models_folder/$model_name.php";
    }

    public function helper($name)
    {
      $helper_name = ucwords(trim($name));
      $helpers_folder=$this->helpers_folder;
      include_once"$helpers_folder/$helper_name.php";
    }

    public function library($name)
    {
      $system_folder =$this->system_folder;
      $library_name = ucwords(trim($name));
      $libraries_folder=$this->libraries_folder;
      include_once"$libraries_folder/$library_name.php";
    }

    public function is_path_absolute($path)
    {
      if(strpos($path,".php"))
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function autoload()
    {
      $_model= array();
      $_helper = array();
      $_library = array();
      $system_folder = $this->system_folder;
      include_once "./$system_folder/autoloads.php";
      $models = $_model;
      $libraries = $_library;
      $helpers = $_helper;
      if(count($models)>0)
      {
        foreach($models as $model)
      {
        $this->model($model);
      }
      }
      
      if(count($helpers)>0)
      {
        foreach($helpers as $helper)
        {
          $this->helper($helper);
        }
      }

      if(count($libraries)>0)
      {
        foreach($libraries as $library)
      {
        $this->library($library);
      }
      }
    }

    public function connect()
    {
      
      $db_configs = $this->database();

      try {
        $dns = 'mysql:host='.$db_configs['host'].';dbname='.$db_configs['name'];
      
        $conn = new PDO($dns,$db_configs['user'],$db_configs['password']);
        
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

        return $conn;

      } catch (Throwable $th) {
        echo "Unable to create database connection: ".$th.getMessage();
      }

      
    }
  }//end class
?>
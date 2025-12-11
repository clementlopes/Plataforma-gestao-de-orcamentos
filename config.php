<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'gestao');
   
   /**
    * faz ligaçao ao servidor
    * @return ligaçao
    */
   function bd(){
        $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        return $db;
   }
  
?>

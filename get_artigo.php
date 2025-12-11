 <?php  
 
 include_once'session.php';
    session_start();
    
//    var_dump($_POST["opcao"]);
//    die;
    
     if(isset($_POST["artigo"]))  
 { 
    
        if($_POST["opcao"]==1){
            
            $output = '';  
          $query = "SELECT * FROM artigos WHERE NOME LIKE '%".$_POST["artigo"]."%' LIMIT 6 ";
//          var_dump($query);
//          die;
          $result = mysqli_query(bd(), $query); 
          $output = '<ul class="lista">';  
          if(mysqli_num_rows($result) > 0)  
          {  
               while($row = mysqli_fetch_array($result))  
               {  
                    $output .= '<li class="sublista">'.$row["NOME"].'</li>';  
               }  
          }  
          else  
          {  
               $output .= '<li class="sublista">Nome desconhecido</li>';  
          }  
          $output .= '</ul>';  
          echo $output;  

        }
        else {
            
             $output = '';  
          $query = "SELECT * FROM servicos WHERE NOME LIKE '%".$_POST["artigo"]."%'LIMIT 6";  
          $result = mysqli_query(bd(), $query); 
          $output = '<ul class="lista">';  
          if(mysqli_num_rows($result) > 0)  
          {  
               while($row = mysqli_fetch_array($result))  
               {  
                    $output .= '<li class="sublista" >'.$row["NOME"].'</li>';  
               }  
          }  
          else  
          {  
               $output .= '<li class="sublista">Nome desconhecido</li>';  
          }  
          $output .= '</ul>';  
          echo $output;  

       }
 }

 
//  if(isset($_POST["artigo"]))  
// {  
//      $output = '';  
//      $query = "SELECT * FROM artigos WHERE NOME LIKE '%".$_POST["artigo"]."%'";  
//      $result = mysqli_query(bd(), $query); 
//      $output = '<ul class="list-unstyled">';  
//      if(mysqli_num_rows($result) > 0)  
//      {  
//           while($row = mysqli_fetch_array($result))  
//           {  
//                $output .= '<li>'.$row["NOME"].'</li>';  
//           }  
//      }  
//      else  
//      {  
//           $output .= '<li>Nome desconhecido</li>';  
//      }  
//      $output .= '</ul>';  
//      echo $output;  
// }  
 ?>  

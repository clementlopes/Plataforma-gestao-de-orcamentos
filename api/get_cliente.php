 <?php  
 
 include_once __DIR__ . '/../includes/session.php';
    
 
 
  if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM clientes WHERE NOME LIKE '%".$_POST["query"]."%' LIMIT 6";  
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
           $output .= '<li>Nome desconhecido</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  

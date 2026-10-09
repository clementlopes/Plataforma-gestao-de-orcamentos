 <?php  
 
 
 include_once __DIR__ . '/../includes/session.php';
    
header('Content-Type: application/json');

 
 $resposta = array();
 //if(isset($_POST["query"])) 
 if(isset($_REQUEST["cliente"]))
 {  
        
      $query = "SELECT * FROM clientes WHERE NOME LIKE '%".$_REQUEST["cliente"]."%'";  
      $result = mysqli_query(bd(), $query);
      
          $detalhe = array();
          $dados1 = mysqli_fetch_assoc($result);
          $dados1_json = json_encode($dados1);
          //var_dump($dados_json);
          //array_push($detalhe['id'], $result['ID_CLIENTES']);
      
                  
      
//        $detalhe['id'] =$result['ID_CLIENTES'];
//        $detalhe['nome'] =$result['NOME'];

        echo json_encode($dados1_json);                        
 }  
 ?>  

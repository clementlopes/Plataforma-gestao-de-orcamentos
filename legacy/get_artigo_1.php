 <?php  
 
 
 include_once'session.php';
    session_start();
    
header('Content-Type: application/json');

 
 $resposta = array();
 //if(isset($_POST["query"])) 
 if(isset($_REQUEST["nome"]))
 { 
     if($_POST['opcao']==1){
         
         $query = "SELECT * FROM artigos WHERE NOME LIKE '".$_REQUEST["nome"]."'";  
      $result = mysqli_query(bd(), $query);
      
          $detalhe = array();
          $dados = mysqli_fetch_assoc($result);
          $dados_json = json_encode($dados);
          //var_dump($dados_json);
          //array_push($detalhe['id'], $result['ID_CLIENTES']);
      
                  
      
//        $detalhe['id'] =$result['ID_CLIENTES'];
//        $detalhe['nome'] =$result['NOME'];

        echo json_encode($dados_json); 
         
     }
    else{
        
      $query = "SELECT * FROM servicos WHERE NOME LIKE '".$_REQUEST["nome"]."'";  
      $result = mysqli_query(bd(), $query);
      
          $detalhe = array();
          $dados = mysqli_fetch_assoc($result);
          $dados_json = json_encode($dados);
          //var_dump($dados_json);
          //array_push($detalhe['id'], $result['ID_CLIENTES']);
      
                  
      
//        $detalhe['id'] =$result['ID_CLIENTES'];
//        $detalhe['nome'] =$result['NOME'];

        echo json_encode($dados_json);  
    }
 }  
 ?>  

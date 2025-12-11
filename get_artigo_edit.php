 <?php  
// 
// 
// include_once'session.php';
//    session_start();
//    
//header('Content-Type: application/json');
//
// 
// $resposta = array();
// if(isset($_POST["idlinha"]))
// {  
//        
//      $query = "SELECT orc_art_ser.ID_ORC_ART_SER, orc_art_ser.ID_OAS_ARTIGOS CODIGO, artigos.NOME NOME, orc_art_ser.DESCRICAO, orc_art_ser.QUANTIDADE, 
//            orc_art_ser.PRECO, orc_art_ser.DESCONTO FROM orc_art_ser INNER JOIN artigos ON(orc_art_ser.ID_OAS_ARTIGOS=artigos.ID_ARTIGOS) WHERE ID_ORC_ART_SER =".$_REQUEST["idlinha"]."
//            UNION
//            SELECT orc_art_ser.ID_ORC_ART_SER, orc_art_ser.ID_OAS_SERVICOS CODIGO, servicos.NOME NOME, orc_art_ser.DESCRICAO, orc_art_ser.QUANTIDADE, orc_art_ser.PRECO, orc_art_ser.DESCONTO FROM orc_art_ser 
//            INNER JOIN servicos ON(orc_art_ser.ID_OAS_SERVICOS=servicos.ID_SERVICOS) WHERE ID_ORC_ART_SER =".$_REQUEST["idlinha"].";";  
//      $result = mysqli_query(bd(), $query);
//      
//          $detalhe = array();
//          $dados = mysqli_fetch_assoc($result);
//          $dados_json = json_encode($dados);
//          
//
//        echo json_encode($dados_json);                        
// }  
 ?>  



 <?php  
 
 
 include_once'session.php';
    
header('Content-Type: application/json');

 
 $resposta = array();
 if(isset($_POST["idlinha"]))
 {  
     
      $query = "SELECT orc_art_ser.ID_ORC_ART_SER ID, orc_art_ser.ID_OAS_ARTIGOS CODIGO, orc_art_ser.NOME NOME , orc_art_ser.DESCRICAO, orc_art_ser.QUANTIDADE, orc_art_ser.PRECO, orc_art_ser.DESCONTO, orc_art_ser.OAS_IVA IVA FROM orc_art_ser INNER JOIN artigos ON (orc_art_ser.ID_OAS_ARTIGOS = artigos.ID_ARTIGOS) WHERE orc_art_ser.ID_ORC_ART_SER=".$_REQUEST["idlinha"]."
            UNION
    SELECT orc_art_ser.ID_ORC_ART_SER , orc_art_ser.ID_OAS_SERVICOS, servicos.NOME NOME, orc_art_ser.DESCRICAO, orc_art_ser.QUANTIDADE, orc_art_ser.PRECO, orc_art_ser.DESCONTO, orc_art_ser.OAS_IVA FROM orc_art_ser 
    INNER JOIN servicos ON(orc_art_ser.ID_OAS_SERVICOS=servicos.ID_SERVICOS) WHERE ID_ORC_ART_SER =".$_REQUEST["idlinha"].";";  
      $result = mysqli_query(bd(), $query);
      
          $detalhe = array();
          $dados = mysqli_fetch_assoc($result);
          $dados_json = json_encode($dados);
          

        echo json_encode($dados_json);                        
 }  
 ?>  
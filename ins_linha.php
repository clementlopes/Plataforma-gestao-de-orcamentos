   


       
 <?php
    include_once'session.php';
             session_start();

             
             
   if(isset($_POST['submit_row'])){
       
       
        $empresa=$_POST['empresa'];
        $utilizador=$_POST['utilizador'];
        $data=$_POST['data'];
        $tipo=$_POST['tipo'];
        $idcliente1=$_POST['idcliente1'];
        $obs=$_POST['obs'];
        $tipoins=$_POST['tipoins'];
        $codigo=$_POST['codigo'];
        $name=$_POST['name'];
        $descricao=$_POST['descricao'];
        $preco=$_POST['preco'];
        $qtd=$_POST['qtd'];
        $desconto=$_POST['desconto'];
        $iva=$_POST['iva'];
       $cod=$_POST['cod'];
       
       
       
        if(validar_orçamento($_POST['idcliente1'])==1){
            if(validar_linha($tipoins[0], $codigo[0],$name[0], $descricao[0], $preco[0], $qtd[0], $desconto[0], $iva[0] )==1)
                    {
                
          
       
       
       
       
       
       
    
//       
//          $empresa=$_POST['empresa'];
//          $utilizador=$_POST['utilizador'];
//          $data=$_POST['data'];
//          $tipo=$_POST['tipo'];
//          $idcliente1=$_POST['idcliente1'];
//          $iva=$_POST['iva'];
//          $obs=$_POST['obs'];
            
    if($_POST['idcliente1']!="" && $_POST['cod']!="" ){
       
       
       $sql = "INSERT INTO orcamento( ID_ORC_EMPRESA, ID_ORC_UTILIZADORES, DATA, TIPO, ID_ORC_CLIENTES,  OBSERVACOES) 
               VALUES ( '".$empresa."', '".$utilizador."', '".$data."', '".$tipo."', '".$idcliente1."',  '".$obs."' );"; 
        
        mysqli_query(bd(), $sql);
        
        
//        $sql1="SELECT ROW_COUNT()as linhas ;";
//        if(verifica_exist($sql1)==1){
//        return 1; 
//        }
        
        

        
//        $tipoins=$_POST['tipoins'];
//        $codigo=$_POST['codigo'];
//        $name=$_POST['name'];
//        $descricao=$_POST['descricao'];
//        $preco=$_POST['preco'];
//        $qtd=$_POST['qtd'];
//        $desconto=$_POST['desconto'];
        
        $orc= "SELECT MAX(ID_ORCAMENTO) as MAX from orcamento";
               $rows = get_dados_one($orc);
               
              $max=$rows['MAX'];
              
               
        
           for($i=0;$i<count($name);$i++){
           
              
                   
                    if($tipoins[$i]!="" && $codigo[$i]!="" && $descricao[$i]!="" && $preco[$i]!="" && $qtd[$i]!="" && $desconto[$i]!="" && $iva[$i]!="" ){

                    //var_dump($codigo[$i], $descricao[$i], $preco[$i], $qtd[$i], $desconto[$i], $iva[$i]);
                            
                        if($tipoins[$i]==1){
                            
                        $sql= "INSERT INTO orc_art_ser ( ID_OAS_ORCAMENTO, ID_OAS_ARTIGOS, NOME, DESCRICAO, QUANTIDADE, PRECO, DESCONTO, OAS_IVA) VALUES('".$max."', '$codigo[$i]', '$name[$i]', '$descricao[$i]', '$qtd[$i]', '$preco[$i]', '$desconto[$i]', '$iva[$i]' );";	 
//                         var_dump($sql);
                         
                         mysqli_query(bd(), $sql);
                        }
                        else{
                            
                        $sql= "INSERT INTO orc_art_ser ( ID_OAS_ORCAMENTO, ID_OAS_SERVICOS, DESCRICAO, QUANTIDADE, PRECO, DESCONTO, OAS_IVA) VALUES('".$max."', '$codigo[$i]', '$descricao[$i]', '$qtd[$i]', '$preco[$i]', '$desconto[$i]', '$iva[$i]' );";	 
//                         var_dump($sql);
                         
                                mysqli_query(bd(), $sql);
                        }
                        
                    }
            } 
        
        header("location: verorcamento.php");
    }
    
    
   }
    else{
        echo '<script language="javascript">';
        echo ' window.history.back();';
        echo '</script>';
   }
   }
   else{
        echo '<script language="javascript">';
        echo ' window.history.back();';
        echo '</script>';
   }
    
    
}






//=============================================== MODAL ADICIONAR ========================================
    if(isset($_POST['addlinha'])){
        
         
                            
         $id=$_POST['id'];
         $tipoins=$_POST['tipoins'];
        $codigo=$_POST['codigo'];
        $name=$_POST['name'];
        $descricao=$_POST['descricao'];
        $preco=$_POST['preco'];
        $qtd=$_POST['qtd'];
        $desconto=$_POST['desconto'];
        $iva=$_POST['iva'];
        
        if(validar_linha($tipoins[0], $codigo[0],$name[0], $descricao[0], $preco[0], $qtd[0], $desconto[0], $iva[0] )==1){
        
           for($i=0;$i<count($name);$i++){
               

              
                   
                    if($codigo[$i]!="" && $descricao[$i]!="" && $preco[$i]!="" && $qtd[$i]!="" && $desconto[$i]!="" && $iva[$i]!="" ){

//                    var_dump($id, $codigo[$i], $descricao[$i], $preco[$i], $qtd[$i], $desconto[$i]);

                     if($tipoins[$i]==1){
                            
                        $sql= "INSERT INTO orc_art_ser ( ID_OAS_ORCAMENTO, ID_OAS_ARTIGOS, NOME, DESCRICAO, QUANTIDADE, PRECO, DESCONTO, OAS_IVA) VALUES('".$id."', '$codigo[$i]', '$name[$i]', '$descricao[$i]', '$qtd[$i]', '$preco[$i]', '$desconto[$i]', '$iva[$i]' );";	 
                         var_dump($sql);
                         mysqli_query(bd(), $sql);
                        }
                        else{
                            
                        $sql= "INSERT INTO orc_art_ser ( ID_OAS_ORCAMENTO, ID_OAS_SERVICOS, DESCRICAO, QUANTIDADE, PRECO, DESCONTO, OAS_IVA) VALUES('".$id."', '$codigo[$i]', '$descricao[$i]', '$qtd[$i]', '$preco[$i]', '$desconto[$i]', '$iva[$i]' );";	 
                         var_dump($sql);
                         mysqli_query(bd(), $sql);
                        }
           }
                    
            }
        header("location: verorcamento_1editar.php?id=$id");
       
    }
    
}



?>
   
 
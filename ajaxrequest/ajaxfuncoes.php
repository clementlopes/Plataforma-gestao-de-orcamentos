 <?php  
 
 include_once'../session.php';
    session_start();
    
    if(isset($_GET['Lar']) && isset($_GET['Cor']) ){
    
    $largura=$_GET['Lar'];
    $larguraVerifica=$_GET['Lar'];
    $larguraVerifica = $larguraVerifica-0.10;
    $cor=$_GET['Cor'];
    $alternativa=0;
    $i=0;
    
    
        $query = 'SELECT calhas.ID_CALHA, calhas.NOME, calhas.REFERENCIA, calhas.FORNECEDOR, calhas.MEDIDA, calhas.PRECO, calhas.ID_COR, cor_calha.COR '
                . 'FROM calhas INNER JOIN cor_calha ON ( calhas.ID_COR = cor_calha.ID_COR) WHERE MEDIDA >= '.$largura.' AND calhas.ID_COR = '.$cor.'  ORDER BY MEDIDA ';
        
        $result = mysqli_query(bd(), $query);
        $linha = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        $query2 = 'SELECT calhas.ID_CALHA, calhas.NOME, calhas.REFERENCIA, calhas.FORNECEDOR, calhas.MEDIDA, calhas.PRECO, calhas.ID_COR, cor_calha.COR '
                . 'FROM calhas INNER JOIN cor_calha ON ( calhas.ID_COR = cor_calha.ID_COR) WHERE MEDIDA >= '.$largura.' AND MEDIDA <= '.$linha["MEDIDA"].' AND calhas.ID_COR = '.$cor.'  ORDER BY MEDIDA ';
      
//        $result2 = mysqli_query(bd(), $query2);  
         $result2 = get_dados($query2);
        
        // verifica se tem calha mais pequna por diferença
        
        $queryVerifica = 'SELECT calhas.ID_CALHA, calhas.NOME, calhas.REFERENCIA, calhas.FORNECEDOR, calhas.MEDIDA, calhas.PRECO, calhas.ID_COR, cor_calha.COR '
                . 'FROM calhas INNER JOIN cor_calha ON ( calhas.ID_COR = cor_calha.ID_COR) WHERE MEDIDA >= '.$larguraVerifica.' AND calhas.ID_COR = '.$cor.'  ORDER BY MEDIDA ';
   
        $resultado = mysqli_query(bd(), $queryVerifica);
        $linhaVerifica = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
        
        
        if($linha["MEDIDA"] !=$linhaVerifica["MEDIDA"]){
        
        $queryVerifica2 = 'SELECT calhas.ID_CALHA, calhas.NOME, calhas.REFERENCIA, calhas.FORNECEDOR, calhas.MEDIDA, calhas.PRECO, calhas.ID_COR, cor_calha.COR '
                . 'FROM calhas INNER JOIN cor_calha ON ( calhas.ID_COR = cor_calha.ID_COR) WHERE MEDIDA >= '.$larguraVerifica.' AND MEDIDA <= '.$linhaVerifica["MEDIDA"].' AND  calhas.ID_COR = '.$cor.'  ORDER BY MEDIDA ';
      
        $resultado2 = mysqli_query(bd(), $queryVerifica2); 
        $row = mysqli_fetch_array($resultado2);
      $alternativa=1;
        }
        
        
        
        
echo "<table id='calhas' class='table table-bordered table-striped'>";
echo "<tr>";
echo "<th></th>";
echo "<th>COD</th>";
echo "<th>NOME</th>";
echo "<th>FORNECEDOR</th>";
echo "<th>REFERENCIA</th>";
echo "<th>COR</th>";
echo "<th>MEDIDA</th>";
echo "<th>PRECO</th>";
echo "<th>OPÇÃO</th>";
echo "</tr>";


 
        foreach ($result2 as $calha)
               {  
               $i= $i+1;
echo "<tr>";
echo "<th> <input class='form-control' type='text' id='ID_LINHACALHA$i'  value='$i'  >  <i class='glyphicon glyphicon-plus butao text-green'   onclick=add_calha(document.getElementById('ID_LINHACALHA$i').value); ></i> </th>";
echo "<td> <input class='form-control' type='text' id='ID_CALHA$i' name='id_calha$i' value=" .$calha["ID_CALHA"]. "  > </td>";
echo "<td><input class='form-control' type='text' id='CALHA_NOME$i'  value=" .$calha["NOME"]. "  ></td>";
echo "<td> <input class='form-control' type='text' id='CALHA_FORNECEDOR$i'  value=" .$calha["FORNECEDOR"]. "  ></td>";
echo "<td> <input class='form-control' type='text' id='CALHA_REFERENCIA$i'  value=" .$calha["REFERENCIA"]. "  ></td>";
echo "<td> <input class='form-control' type='text' id='CALHA_COR$i'  value=" .$calha["COR"]. "  ></td>";
echo "<td> <input class='form-control' type='text' id='CALHA_MEDIDA$i'  value=" .$calha["MEDIDA"]. "  ></td>";
echo "<td>  <input class='form-control' type='text' id='CALHA_PRECO$i'  value=".$calha["PRECO"]."  ></td>";
echo "<td> <input class='form-control' type='text' id='OPCAO$i'  value=" .$alternativa. "  ></td>";
echo "</tr>";
               }
echo "</table>";  
          

    }
    
    
    
    
    
    if(isset($_GET['nome_cliente'])){
        
        $i=0;
     
       
        
        $clientes = "SELECT clientes.NOME, CONCAT_WS(' ', RUA, NUMERO) AS MORADA, clientes.ID_CLIENTES, clientes.RUA, clientes.NUMERO, clientes.CIDADE, clientes.POSTAL, clientes.NIF "
                . "FROM clientes WHERE clientes.NOME LIKE '%".$_GET['nome_cliente']."%' ORDER BY NOME LIMIT 1 ";
        $cliente = get_dados($clientes);
        
        
                
echo "<table id='cliente' class='table table-bordered table-striped'>";
echo "<tr>";
echo "<th></th>";
echo "<th>NOME</th>";
echo "<th>MORADA</th>";
echo "</tr>";


 
        foreach ($cliente as $resp)
               {  
               $i= $i+1;
               $id=$resp["ID_CLIENTES"];
               $nome=$resp["NOME"];
                $morada=$resp["MORADA"];
                 $cidade=$resp["CIDADE"];
                  $postal=$resp["POSTAL"];
                   $nif=$resp["NIF"];
echo "<tr>";
echo "<th> <i class='glyphicon glyphicon-plus butao text-green'   onclick=add_cliente(document.getElementById('ID_LINHACLIENTE$i').value); ></i><input class='form-control' type='hidden' id='ID_LINHACLIENTE$i'  value='$i'  >"
        . "<input class='form-control' type='hidden' id='ID_CLIENTE$i' value='$id'  > <input class='form-control' type='hidden' id='CIDADE$i'  value='$cidade '  >"
        . "<input class='form-control' type='hidden' id='POSTAL$i'  value=$postal > <input class='form-control' type='hidden' id='NIF$i'  value='$nif'  >  </th>";

echo "<td> $nome<input class='form-control' type='hidden' id='NOME_CLIENTE$i'  value='$nome'   ></td>";
echo "<td> $morada<input class='form-control' type='hidden' id='MORADA$i'  value='$morada' ></td>";

               }
echo "</table>";  
          
        
        
    }
    
    
     if(isset($_GET['nome_aplicacao'])){
        
        $i=0;
     
       
        
        $aplicacao = "SELECT * FROM tipo_aplicacao WHERE tipo_aplicacao.NOME LIKE '%".$_GET['nome_aplicacao']."%' ORDER BY NOME LIMIT 1 ";
        $tipo_aplicacao = get_dados($aplicacao);
        
        
                
echo "<table id='cliente' class='table table-bordered table-striped'>";
echo "<tr>";
echo "<th></th>";
echo "<th>NOME</th>";
echo "</tr>";


 
        foreach ($tipo_aplicacao as $linha_aplicacao)
               {  
               $i= $i+1;
               $id=$linha_aplicacao["ID_TIPO_APLICACAO"];
               $nome=$linha_aplicacao["NOME"];
               $preco=$linha_aplicacao["PRECO"];
echo "<tr>";
echo "<th> <i class='glyphicon glyphicon-plus butao text-green'   onclick=add_aplicacao(document.getElementById('ID_LINHA_APLICACAO$i').value); ></i><input class='form-control' type='hidden' id='ID_LINHA_APLICACAO$i'  value='$i'  >"
        . "<input class='form-control' type='hidden' id='ID_TIPO_APLICACAO$i' value='$id'  ></th> <input class='form-control' type='hidden' id='PRECO_APLICACAO$i'  value='$preco'   > ";

echo "<td> $nome<input class='form-control' type='hidden' id='NOME_APLICACAO$i'  value='$nome'   ></td>";

               }
echo "</table>";  
          
        
        
    }



           ?>  

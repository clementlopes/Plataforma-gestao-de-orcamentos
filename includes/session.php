<?php

include_once __DIR__ . '/config.php';
include_once __DIR__ . '/auth.php';

/**
 * Erros de PHP so sao mostrados no browser em modo de desenvolvimento.
 * Num servidor publico isso revelaria caminhos e estrutura da base de dados,
 * por isso APP_DEBUG tem de estar a false em producao.
 */
error_reporting(APP_DEBUG ? E_ALL : E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);
ini_set('display_errors', APP_DEBUG ? '1' : '0');

auth_iniciar_sessao();

  if (empty($_SESSION['ID_UTILIZADORES'])) 
  {
    // nÃ£o existe sessÃ£o iniciada
    // o utilizador  Ã© expulso da pÃ¡gina actuaÃ§
    header('Location: ../index.php');
    exit();
  }



/**
 * get_dados devolve dados da query que envia em array assoc
 * @param type $sql
 * @return type array associativo com dados da query
 */
function get_dados_one($sql) {
    $ses_sql = mysqli_query(bd(), $sql);
    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    return $row;
}
/**
 * get_dados devolve dados da query que envia em array assoc
 * @param type $sql
 * @return type array associativo com dados da query
 */
function verifica_exist($sql) {
    $ses_sql = mysqli_query(bd(), $sql);
    if($ses_sql !=NULL){
     return 1;
    }
}

/**
 * get_dados devolve dados da query que envia em array assoc
 * @param type $sql
 * @return type array associativo com dados da query
 */
function get_dados($sql) {
//    var_dump($sql);
    $ses_sql = mysqli_query(bd(), $sql);
    $row = mysqli_fetch_all($ses_sql, MYSQLI_ASSOC);
    return $row;
}


/**
 * verifica_login
 * chamar funçao para verificar se utilizador esta logado sempre no inicio de cada 
 * pagina
 */
function verifica_login() {
    if (!isset($_SESSION['login_user'])) {
        header("location:index.php");
    }
}



/** ============================EMPRESA============================
 * 
 * 
 * insert empresa
 * recebe post do form da pagina empresa
 * 
 * retorna consulta
 */




/**
 * EMPRESA inserir
 */
function insert_empresa($name, $nome_com, $rua, $cidade, $codigo, $nif, $iban, $contato, $email, $site, $logo) {
    $sql = "INSERT INTO `empresa` ( `NOME`, `NOME_COMERCIAL`, `RUA`, `CIDADE`, `CODIGOPOSTAL`, `NIF`, `IBAN`, `CONTACTO`, `EMAIL`, `WEBSITE`) VALUES ( '".$name."', '".$nome_com."', '".$rua."', '".$cidade."', '".$codigo."', '".$nif."', '".$iban."', '".$contato."', '".$email."', '".$site."');";
    var_dump($sql);
//    die;
    mysqli_query(bd(), $sql);
//    EXECUTA SQL
   $sql1="SELECT ROW_COUNT()as linhas ;";
    if(verifica_exist($sql1)==1){
        return 1; 
    }
    
}


/**
 * empresa actualizar
 */
function actulizar_empresa($name, $nome_com, $rua, $cidade, $codigo, $nif, $iban, $contato, $email, $site, $id) {
    
   
    
    
    $sql = "UPDATE empresa SET NOME='".$name."', NOME_COMERCIAL='".$nome_com."', RUA='".$rua."', CIDADE='".$cidade."', CODIGOPOSTAL='".$codigo."', NIF='".$nif."', IBAN='".$iban."', CONTACTO='".$contato."', EMAIL='".$email."', WEBSITE='".$site."' WHERE ID_EMPRESA=".$id.';';
   
    mysqli_query(bd(), $sql);
   $sql1="SELECT ROW_COUNT()as linhas ;";
    if(verifica_exist($sql1)==1){
        return 1; 
    }
    
}



/** ===================================== CATEGORIA SERVIÇOS========================================================
 * categoria servicos inserir
 */
function insert_categorias($name) {
    $sql = "INSERT INTO categorias( NOME) VALUES ('" . $name ."');";
    mysqli_query(bd(), $sql);
   $sql1="SELECT ROW_COUNT()as linhas ;";
    if(verifica_exist($sql1)==1){
        return 1; 
    }
    
}

/**
 * categoria servicos actualizar
 */
function actulizar_categorias($name,$id) {
   
    $sql = "UPDATE categorias SET NOME='".$name."' WHERE ID_CATEGORIAS=".$id.';';
    mysqli_query(bd(), $sql);
   $sql1="SELECT ROW_COUNT()as linhas ;";
    if(verifica_exist($sql1)==1){
        return 1; 
    }
    
}









/** ===================================== CATEGORIA ARTIGOS========================================================
 * categoria artigos
 */
function actulizar_categoria($name,$id) {
    
   
   
    $sql = "UPDATE categoria SET NOME='".$name."' WHERE ID_CATEGORIA=".$id.';';
    mysqli_query(bd(), $sql);
   $sql1="SELECT ROW_COUNT()as linhas ;";
    if(verifica_exist($sql1)==1){
        return 1; 
    }
    
}


/**
 * categoria artigos inserir
 */
function insert_categoria($name) {
    $sql = "INSERT INTO categoria( NOME) VALUES ('" . $name ."');";
    mysqli_query(bd(), $sql);
   $sql1="SELECT ROW_COUNT()as linhas ;";
    if(verifica_exist($sql1)==1){
        return 1; 
    }
    
}

/**
 * categoria validar
 */
function validar_categoria($name) {
    
    if (empty(trim($name))){
                echo '<script language="javascript">';
                echo 'alert("Nome de Categoria invalido")';
                echo '</script>';
                return 0;
            }
    else{
        return 1;
    }
    
}


/**  ===================================== ARTIGOS ========================================================
 * artigos inserir
 */
function insert_artigos($name, $descricao, $preco, $quantidade, $unidade, $iva, $categoria) {
    $sql = "INSERT INTO artigos( NOME, DESCRICAO, PRECOUNITARIO, QUANTIDADE, ID_ART_UNIDADE, ID_ART_CATEGORIA, ID_ART_IVA) VALUES ( '" . $name ."', '" . $descricao ."', '" . $preco ."', '" . $quantidade ."', '" . $unidade ."', '" . $categoria ."', '" . $iva ."' );";
    
    mysqli_query(bd(), $sql);
   $sql1="SELECT ROW_COUNT()as linhas ;";
    if(verifica_exist($sql1)==1){
        return 1; 
    }
    
}




/**
 * artigos actualizar
 */
function actulizar_artigos($name,$id, $descricao, $preco, $quantidade, $unidade, $iva, $categoria) {
   
    $sql = "UPDATE artigos SET NOME='".$name."', DESCRICAO='".$descricao."', PRECOUNITARIO='".$preco."', QUANTIDADE='".$quantidade."' , ID_ART_UNIDADE='".$unidade."' , ID_ART_CATEGORIA='".$categoria."', ID_ART_IVA='".$iva."' WHERE ID_ARTIGOS=".$id.';';
    mysqli_query(bd(), $sql);
   var_dump($sql);

   $sql1="SELECT ROW_COUNT()as linhas ;";
    if(verifica_exist($sql1)==1){
        return 1; 
    }
    
}


/****
 ** VALIDAR ARTIGOS E SERVIÇOS
 ****
 */
function validar_produto($name, $preco, $quantidade, $iva, $categoria) {
    
    if (empty(trim($name))){
                echo '<script language="javascript">';
                echo 'alert("Nome invalido")';
                echo '</script>';
                return 0;
            }
            
    else if (empty(trim($preco))){
                echo '<script language="javascript">';
                echo 'alert("Preço invalido")';
                echo '</script>';
                return 0;
            }
    
    else if (empty(trim($quantidade))){
                echo '<script language="javascript">';
                echo 'alert("Quantidade invalida")';
                echo '</script>';
                return 0;
            }
    
   else if ($categoria==0){
                echo '<script language="javascript">';
                echo 'alert("Categoria invalida")';
                echo '</script>';
                return 0;
            }        
            
    else{
        return 1;
    }
    
}



/**  ===================================== SERVIÇOS ========================================================
 * serviços inserir
 */
function insert_servicos($name, $descricao, $preco, $quantidade, $unidade, $iva, $categoria) {
    $sql = "INSERT INTO servicos( NOME, DESCRICAO, PRECOUNITARIO, QUANTIDADE, ID_SER_UNIDADE, ID_SER_CATEGORIA, ID_SER_IVA) VALUES ( '" . $name ."', '" . $descricao ."', '" . $preco ."', '" . $quantidade ."', '" . $unidade ."', '" . $categoria ."', '" . $iva ."');";
    
    mysqli_query(bd(), $sql);
   $sql1="SELECT ROW_COUNT()as linhas ;";
    if(verifica_exist($sql1)==1){
        return 1; 
    }
    
}




/**
 * serviços actualizar
 */
function actulizar_servicos($name,$id, $descricao, $preco, $quantidade, $unidade, $iva, $categoria) {
   
    $sql = "UPDATE servicos SET NOME='".$name."', DESCRICAO='".$descricao."', PRECOUNITARIO='".$preco."', QUANTIDADE='".$quantidade."' , ID_SER_UNIDADE='".$unidade."' , ID_SER_CATEGORIA='".$categoria."' , ID_SER_IVA='".$iva."' WHERE ID_SERVICOS=".$id.';';
    
    mysqli_query(bd(), $sql);
    
   $sql1="SELECT ROW_COUNT()as linhas ;";
    if(verifica_exist($sql1)==1){
        return 1; 
    }
    
}



/**  ===================================== CLIENTES ========================================================
 * clientes inserir
 */
function insert_clientes($nome, $rua, $numero, $cidade, $postal, $contato, $nif, $email, $data) {
    
    $sql = "INSERT INTO clientes( NOME, RUA, NUMERO, CIDADE, POSTAL, CONTATO, NIF, EMAIL, NASCIMENTO ) 
    VALUES ( '".$nome."', '".$rua."', '".$numero."', '".$cidade."', '".$postal."', '".$contato."', '".$nif."', '".$email."', '".$data."');";
//        var_dump($sql);
//        die;
    mysqli_query(bd(), $sql);
   $sql1="SELECT ROW_COUNT()as linhas ;";
    if(verifica_exist($sql1)==1){
        return 1; 
    }
    
}




/**
 * clientes actualizar
 */
function actulizar_clientes($id, $nome, $rua,  $numero, $cidade, $postal, $contato, $nif, $email, $data) {
   
    $sql = "UPDATE clientes SET NOME='".$nome."', RUA='".$rua."', NUMERO='".$numero."', CIDADE='".$cidade."', POSTAL='".$postal."', CONTATO='".$contato."', NIF='".$nif."', EMAIL='".$email."', NASCIMENTO='".$data."' WHERE ID_CLIENTES=".$id.';';
    mysqli_query(bd(), $sql);
//    var_dump($sql);
//    die;
   $sql1="SELECT ROW_COUNT()as linhas ;";
    if(verifica_exist($sql1)==1){
        return 1; 
    }
    
}


/**  ===================================== UTILIZADORES ========================================================
 * UTILIZADORES inserir
 *
 * A senha e guardada como SHA256 com sal unico por utilizador. Devolve 1 em
 * caso de sucesso, 0 em caso de falha (a razao fica em auth_erro()).
 */
function insert_utilizadores($nome, $username, $password, $email, $tipo) {
    $nome = trim((string) $nome);
    $username = trim((string) $username);
    $email = trim((string) $email);

    if ($nome === '' || $username === '' || $email === '') {
        auth_guardar_erro('Preencha o nome, o utilizador e o email.');
        return 0;
    }

    if (!auth_validar_senha($password)) {
        auth_guardar_erro('A password deve ter pelo menos ' . AUTH_PASSWORD_MIN . ' caracteres.');
        return 0;
    }

    $senha = auth_hash_senha($password);

    $sql = "INSERT INTO utilizadores (NOME, USERNAME, PASSWORD, EMAIL, TIPO)
            VALUES (?, ?, ?, ?, ?)";

    $ligacao = bd();
    $stmt = mysqli_prepare($ligacao, $sql);

    if ($stmt === false) {
        auth_guardar_erro('Nao foi possivel criar o utilizador.');
        return 0;
    }

    mysqli_stmt_bind_param($stmt, 'ssssi', $nome, $username, $senha, $email, $tipo);

    $executado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if (!$executado || mysqli_errno($ligacao) === 1062) {
        auth_guardar_erro('Ja existe um utilizador com esse nome.');
        return 0;
    }

    if (!$executado) {
        auth_guardar_erro('Nao foi possivel criar o utilizador.');
        return 0;
    }

    return 1;
}


/**
 * UTILIZADORES actualizar
 *
 * Se a senha vier vazia, a senha actual mantem-se. Assim editar um utilizador
 * (por exemplo, para mudar o email) nao obriga a redefinir a senha.
 */
function actulizar_utilizadores($id, $nome, $username, $password, $email, $tipo) {
    $id = (int) $id;
    $nome = trim((string) $nome);
    $username = trim((string) $username);
    $email = trim((string) $email);

    if ($id <= 0) {
        auth_guardar_erro('Utilizador invalido.');
        return 0;
    }

    if ($nome === '' || $username === '' || $email === '') {
        auth_guardar_erro('Preencha o nome, o utilizador e o email.');
        return 0;
    }

    $ligacao = bd();

    if ((string) $password !== '') {
        if (!auth_validar_senha($password)) {
            auth_guardar_erro('A password deve ter pelo menos ' . AUTH_PASSWORD_MIN . ' caracteres.');
            return 0;
        }

        $senha = auth_hash_senha($password);

        $sql = "UPDATE utilizadores
                SET NOME = ?, USERNAME = ?, PASSWORD = ?, EMAIL = ?, TIPO = ?
                WHERE ID_UTILIZADORES = ?";

        $stmt = mysqli_prepare($ligacao, $sql);

        if ($stmt === false) {
            auth_guardar_erro('Nao foi possivel actualizar o utilizador.');
            return 0;
        }

        mysqli_stmt_bind_param($stmt, 'ssssii', $nome, $username, $senha, $email, $tipo, $id);
        $executado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        $sql = "UPDATE utilizadores
                SET NOME = ?, USERNAME = ?, EMAIL = ?, TIPO = ?
                WHERE ID_UTILIZADORES = ?";

        $stmt = mysqli_prepare($ligacao, $sql);

        if ($stmt === false) {
            auth_guardar_erro('Nao foi possivel actualizar o utilizador.');
            return 0;
        }

        mysqli_stmt_bind_param($stmt, 'sssii', $nome, $username, $email, $tipo, $id);
        $executado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    if (!$executado) {
        auth_guardar_erro('Nao foi possivel actualizar o utilizador.');
        return 0;
    }

    return 1;
}



/**  ===================================== ORCAMENTOS ========================================================
 * ORCAMENTOS inserir
 */



                            
function atualizar_orcamento($id, $utilizador, $tipo, $cliente, $obs ) {
                            
    $sql = "UPDATE orcamento SET ID_ORC_UTILIZADORES='".$utilizador."', TIPO='".$tipo."', ID_ORC_CLIENTES='".$cliente."', OBSERVACOES='".$obs."' WHERE ID_ORCAMENTO='".$id."' "; 
    
//        var_dump($sql);
//        die;
    mysqli_query(bd(), $sql);
   $sql1="SELECT ROW_COUNT()as linhas ;";
    if(verifica_exist($sql1)==1){
        return 1; 
    }
    
}

/**
 * VALIDAR ORCAMENTOS
 */

function validar_orçamento($cliente) {
    
    if (empty(trim($cliente))){
                echo '<script language="javascript">';
                echo 'alert("Cliente invalido")';
                echo '</script>';
                return 0;
            }
    else{
        return 1;
    }
    
}





/**  ===================================== LINHAS ========================================================
 * LINHAS editar
 */

function atualizar_linha($tipoins, $linha, $codigo, $name, $descricao, $qtd, $preco, $desconto, $iva){
//    var_dump($linha);
    if($tipoins==1){
        
        
         $sql = "UPDATE orc_art_ser SET ID_OAS_SERVICOS=null, ID_OAS_ARTIGOS='".$codigo."',  NOME='".$name."', DESCRICAO='".$descricao."', QUANTIDADE='".$qtd."', PRECO='".$preco."', DESCONTO='".$desconto."', OAS_IVA='".$iva."' WHERE ID_ORC_ART_SER='".$linha."' "; 
//        var_dump($sql);
//        die;
        mysqli_query(bd(), $sql);
        $sql1="SELECT ROW_COUNT()as linhas ;";
        if(verifica_exist($sql1)==1){
            return 1; 
        }
    }
    else{
         $sql = "UPDATE orc_art_ser SET ID_OAS_ARTIGOS=null, ID_OAS_SERVICOS='".$codigo."', DESCRICAO='".$descricao."', QUANTIDADE='".$qtd."', PRECO='".$preco."', DESCONTO='".$desconto."', OAS_IVA='".$iva."' WHERE ID_ORC_ART_SER='".$linha."' "; 
        
        mysqli_query(bd(), $sql);
        $sql1="SELECT ROW_COUNT()as linhas ;";
        if(verifica_exist($sql1)==1){
            return 1; 
        }
    }
    
}


/**
 * VALIDAR LINHAS
 */

function validar_linha($tipoins,$codigo,$name, $descricao, $qtd, $preco, $desc, $iva) {
    
//    var_dump($tipoins,$codigo,$name, $descricao, $qtd, $preco, $desc, $iva);die;
    
    if (empty(trim($codigo))){
                echo '<script language="javascript">';
                echo 'alert("Produto invalido")';
                echo '</script>';
                return 0;
                
            }
    else if (empty(trim($name))){
                echo '<script language="javascript">';
                echo 'alert("Necessário nome")';
                echo '</script>';
                return 0;
            }
    else if (empty(trim($descricao))){
                echo '<script language="javascript">';
                echo 'alert("Necessário descrição")';
                echo '</script>';
                return 0;
            }     
    else if (empty(trim($tipoins))){
                echo '<script language="javascript">';
                echo 'alert("Escolha Produto ou serviço")';
                echo '</script>';
                return 0;
            }
    else if (empty(trim($qtd))){
                echo '<script language="javascript">';
                echo 'alert("Quantidade invalida")';
                echo '</script>';
                return 0;
            }
    else if (empty(trim($preco))){
                echo '<script language="javascript">';
                echo 'alert("Preço invalido")';
                echo '</script>';
                return 0;
            }
    else if (empty(trim($iva))){
                echo '<script language="javascript">';
                echo 'alert("iva invalido")';
                echo '</script>';
                return 0;
            }
//            else if (empty(trim($desc))){
//                echo '<script language="javascript">';
//                echo 'alert("desconto invalido")';
//                echo '</script>';
//                return 0;
//            }
    
    else{
        return 1;
    }
}


/**
 * Preencher Grafico
 */

if (isset($_GET['chartData'])) {
    // Set appropriate headers for JSON response
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');

    $chartData = getChartData();
    echo json_encode($chartData);
    exit();
}

function getChartData() {
    // Initialize all months with zero values
    $data = array();
    for ($i = 1; $i <= 12; $i++) {
        $data[$i] = [
            'Orcamentos Realizados' => 0,
            'Orcamentos Pedidos' => 0,
            'Orcamentos Rejeitados' => 0,
        ];
    }

    $sql = "SELECT
        MONTH(o.DATA) AS Mes,
        SUM(CASE WHEN tipo.NOME = 'realizado' THEN 1 ELSE 0 END) AS OrcamentosRealizados,
        SUM(CASE WHEN tipo.NOME = 'pedido' THEN 1 ELSE 0 END) AS OrcamentosPedidos,
        SUM(CASE WHEN tipo.NOME = 'rejeitado' THEN 1 ELSE 0 END) AS OrcamentosRejeitados
    FROM orcamento o
    INNER JOIN tipo_orc tipo ON o.TIPO = tipo.ID_TIPO_ORC
    WHERE YEAR(o.DATA) = YEAR(CURRENT_DATE())
    GROUP BY Mes";

    $result = get_dados($sql);

    foreach ($result as $row) {
        $mes = $row['Mes'];
        $OrcamentosRealizados = $row['OrcamentosRealizados'];
        $OrcamentosPedidos = $row['OrcamentosPedidos'];
        $OrcamentosRejeitados = $row['OrcamentosRejeitados'];

        $data[$mes] = [
            'Orcamentos Realizados' => $OrcamentosRealizados,
            'Orcamentos Pedidos' => $OrcamentosPedidos,
            'Orcamentos Rejeitados' => $OrcamentosRejeitados,
        ];
    }

    return $data;
}


//============== cheques =============================

function addCheque($fornecedor, $dataEmissao, $dataPagamento, $valor, $dias){
  
// Converta para o formato do banco de dados
 list($diaE, $mesE, $anoE) = explode('/', $dataEmissao);

    // Formate a data no formato aaaa-mm-dd
    $dataEmissaoFormatoBD = "$anoE-$mesE-$diaE";
    
    // Converta para o formato do banco de dados
 list($diaP, $mesP, $anoP) = explode('/', $dataPagamento);

    // Formate a data no formato aaaa-mm-dd
    $dataPagamentoFormatoBD = "$anoP-$mesP-$diaP";

    $sql =" INSERT INTO cheques (FORNECEDOR, DATA_EMITIDA, DATA_PAGAMENTO, VALOR, ID_CHEQUES_DIAS ) VALUES ('".$fornecedor."', '".$dataEmissaoFormatoBD."', '".$dataPagamentoFormatoBD."', '".$valor."', '".$dias."') ";  

      mysqli_query(bd(), $sql);
   $sql1="SELECT ROW_COUNT()as linhas ;";
    if(verifica_exist($sql1)==1){
        return 1; 
    }
}

function editCheque($idChequeEdit, $fornecedor, $dataEmissao, $dataPagamento, $valor, $dias) {
    // Converta as datas para o formato do banco de dados (aaaa-mm-dd)
    $dataEmissaoFormatoBD = date('Y-m-d', strtotime(str_replace('/', '-', $dataEmissao)));
    $dataPagamentoFormatoBD = date('Y-m-d', strtotime(str_replace('/', '-', $dataPagamento)));

    $sql = "UPDATE cheques SET FORNECEDOR='$fornecedor', DATA_EMITIDA='$dataEmissaoFormatoBD', DATA_PAGAMENTO='$dataPagamentoFormatoBD', VALOR='$valor', ID_CHEQUES_DIAS='$dias' WHERE ID_CHEQUES='$idChequeEdit'";
   
    mysqli_query(bd(), $sql);

    $sql1 = "SELECT ROW_COUNT() as linhas;";
    if (verifica_exist($sql1) == 1) {
        return 1;
    }
}

if (isset($_POST['idCheque'])) {
    $idCheque = $_POST['idCheque'];
    
    $sql = "SELECT * FROM cheques WHERE ID_CHEQUES = $idCheque";
    
    $result = mysqli_query(bd(), $sql);

    if ($result) {
        $dados = mysqli_fetch_assoc($result);
        echo json_encode($dados);
    } else {
        echo json_encode(array('error' => 'Erro na consulta SQL'));
    }
}







?>
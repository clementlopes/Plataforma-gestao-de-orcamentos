<?php

include_once ('config.php');
session_start();

/**
 *  * sessoes
 * inicia sessao e e verifica dados
 * @param type $myusername
 * @param type $mypassword
 * @return type
 */
function sesseos($myusername, $mypassword) {
   
    $myusername = mysqli_real_escape_string(bd(), $myusername);
    $mypassword = mysqli_real_escape_string(bd(), $mypassword);
    $mypassword = md5($mypassword);
    $sql = "SELECT * FROM utilizadores WHERE username = '$myusername' and password = '$mypassword'";

//   var_dump($sql); die;
    $result = mysqli_query(bd(), $sql);
//   var_dump($result);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //var_dump($row); 

    $count = mysqli_num_rows($result);
//    var_dump($count);
           

    
    if ($count == 1) {
        $_SESSION['ID_UTILIZADORES'] = $row['ID_UTILIZADORES'];
        $_SESSION['NOME'] = $row['NOME'];
        $_SESSION['TIPO'] = $row['TIPO'];
        $_SESSION['ADMIN'] = "";
        
        if($_SESSION['TIPO']!= 1){
            $_SESSION['ADMIN'] = "class='hidden'";
        }
        
        
        return $count;
    } 
    else {
        return 0;
    }


// If result matched $myusername and $mypassword, table row must be 1 row
}
?>
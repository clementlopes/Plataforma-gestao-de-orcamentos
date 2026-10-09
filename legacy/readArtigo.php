<?php
include_once'session.php';
         session_start();
         
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM artigos WHERE NOME like '" . $_POST["keyword"] . "%' ORDER BY NOME LIMIT 0,6";
$result = mysqli_query(bd(), $query);
while($row=mysqli_fetch_assoc($result)) {
        $resultset[] = $row;
		}
                
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $linha) {
?>
<li onClick="selectArtigo('<?php  echo $linha["NOME"]; ?>');">
    <?php echo $linha["ID_ARTIGOS"].")-"; ?>
    <?php echo $linha["NOME"]; ?>
    
</li>
<?php } ?>
</ul>
<?php } } ?>
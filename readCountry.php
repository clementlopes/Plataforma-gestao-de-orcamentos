<?php include_once'session.php';
         session_start();
         
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM clientes WHERE NOME like '" . $_POST["keyword"] . "%' ORDER BY NOME LIMIT 0,6";
$result = mysqli_query(bd(), $query);
while($row=mysqli_fetch_assoc($result)) {
        $resultset[] = $row;
		}
                
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
    <li onClick="selectCountry('<?php  echo $country["NOME"]; ?>');">
    <?php echo $country["ID_CLIENTES"].")-"; ?>
    <?php echo $country["NOME"]; ?>
    
</li>
<?php } ?>
</ul>
<?php } } ?>
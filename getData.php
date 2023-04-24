<?php 
// MySQL database connection code
$connection = mysqli_connect("localhost","root","","carnitaselcocho") or die("Error " . mysqli_error($connection));
//Fetch productos data
$sql = "SELECT * FROM menu";
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
//create an array
$array = array();
$i = 0;
while($row = mysqli_fetch_assoc($result))
{  
    $menu = $row['platillos'];
    $platillos_vendidos = $row['platillos_vendidos'];
    $array['cols'][] = array('type' => 'string'); 
    $array['rows'][] = array('c' => array( array('v'=> $menu), array('v'=>(int)$platillos_vendidos)) );
}
$data = json_encode($array);
echo $data;
?>
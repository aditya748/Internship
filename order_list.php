<?php
include('connection.php');
$query="SELECT * FROM `order` WHERE 1";
$exe=mysql_query($query);

?>
<table style="1px solid black">
	<tr>
		<th>Id</th>
		<th>Dish</th>
		<th>Quantity</th>
		<th>Cost</th>
		<th>Address</th>
	<tr>
	<?php
	while($data=mysql_fetch_array($exe)){
		$query2='select name from dish where food_id='.$data['dish_id'];
		
		$exe2=mysql_query($query2);
		$data2=mysql_fetch_array($exe2);
	?>
	<tr>
		<td><?php echo $data['id']; ?></td>
		<td><?php echo $data2['name']; ?></td>
		<td><?php echo $data['quantity']; ?></td>
		<td><?php echo $data['cost']; ?></td>
		<td><?php echo $data['address']; ?></td>
		
	</tr>
	<?php } ?>
</table>
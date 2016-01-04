<?php

require_once("db/conn.php");

$sql = "
SELECT id, barcode, title, image, description, category, country, quantity, unit, user, insert_date
FROM products
WHERE 1;";
$result = mysqli_query($conn, $sql);
 $title= "View product";
 require_once("page.php");




 ?>

  <div class="container">
  <h2>Products</h2>
  <p>Here you can see the products in your Refrigerator:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Barcode</th>
        <th>Title</th>
        <th>Image</th>
        <th>Description</th>
        <th>Category</th>
        <th>Country</th>
        <th>Quantity</th>
        <th>Unit</th>
        <th>User</th>
        <th>Instert_date</th>
      </tr>
    </thead>
    <tbody>

	<?php
	while($row = mysqli_fetch_array($result))
 	 {
	?>
	<tr>
	<td><?php echo $row['id']; ?></td>
	<td><a href="viewproduct.php?barcode=<?php echo $row['barcode']; ?>"><?php echo $row['barcode']; ?></a></td>
	<td><?php echo $row['title']; ?></td>
	<td><?php echo $row['image']; ?></td>
	<td><?php echo $row['description']; ?></td>
	<td><?php echo $row['category']; ?></td>
	<td><?php echo $row['country']; ?></td>
	<td><?php echo $row['quantity']; ?></td>
	<td><?php echo $row['unit']; ?></td>
	<td><?php echo $row['user']; ?></td>
	<td><?php echo $row['instert_date']; ?></td>
	</tr>
 	<?php
	  }
	?>

    
    </tbody>
  </table>
</div>



 </body>
 </html>

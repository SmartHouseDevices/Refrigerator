<?php
if(!isset($_GET['barcode'])){
  $title= "View product";
  require_once("db/conn.php");
  require_once("page.php");

}
require_once("db/conn.php");
$barcode = mysqli_real_escape_string($conn, $_GET['barcode']);
$sql = "
SELECT title, image, description, category, country, quantity, unit, user, insert_date
FROM products
WHERE barcode = '$barcode';
";



 $result = mysqli_query($conn, $sql);
 $num_rows = mysqli_num_rows($result);
 if($num_rows == 0){
   //header("Location: viewproduct.php?t=warning&warn=24");
   die('Sorry there is no product with such an barcode:/');
 }
 $title= "View product";
 require_once("page.php");
 $row = mysqli_fetch_row($result);
 $title = $row['0'];
 $image = $row['1'];
 $description = $row['2'];
 $category = $row['3'];
 $country = $row['4'];
 $quantity = $row['5'];
 $unit = $row['6'];
 $userid = $row['7'];
 $date = $row['8'];

 $quantity = $quantity.$unit;

$sql = "
SELECT username
FROM users
WHERE id = '$userid'

";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
$user = $row['0'];

 ?>

 <table class="table table-user-information" style="width:20%;">
                 <tbody>
                   <tr>
                     <td>Title:</td>
                     <td><?php echo $title?></td>
                   </tr>
                   <tr>
                     <td>Description</td>
                     <td><?php echo $description?></td>
                   </tr>

                    <tr>
                     <td>Category</td>
                     <td><?php echo $category?></td>
                   </tr>

                   <tr>
                    <td>Country</td>
                    <td><?php echo $country?></td>
                  </tr>


                  <tr>
                   <td>Quantity</td>
                   <td><?php echo $quantity?></td>
                 </tr>

                 <tr>
                  <td>User</td>
                  <td><?php echo $user?></td>
                </tr>

                <tr>
                 <td>Date</td>
                 <td><?php echo $date?></td>
               </tr>

                </tbody>
               </table>

 </body>
 </html>

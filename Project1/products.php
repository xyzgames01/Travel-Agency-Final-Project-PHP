
<?php
	require_once("auth_check.php");
?> 

<?php
    require_once("webmodules/mysqli_connection.php");
  

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    include 'webmodules/header.php';
    include 'webmodules/navbar.php';

    $image_name = "chicago.jpg";
    $size = "48";
    include 'webmodules/jumbotron.php';


?>

<body>

    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="row" style="width:100%;">
            <div class="col-lg-12 text-center my-5 text-black">
                <h1 class="slogan border border-2 rounded-pill border-dark">Products</h1>
            </div>
        </div>
    </div>

<?php
    $product_code = "";
    $product_name = "";
    $description = "";
    $list_price = "";
    $discount = "";
    $error = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Check for errors
        if (empty($_POST['id'])) {
            die("Error - Product ID Empty");
        } else {
            //Make sure the form product_id is the same as the $SESSION['product_id'].
            //This prevents a malicious user from changing the product_id and updating the wrong record.
            $product_id = sanitize($_POST["id"]);
        }
      
        //This section is to validate the data from the form.
        //If there are any errors, set the variable $error = true. 
        //This cause the form to be redisplayed.  
        
        if (empty($_POST['product_code'])) {
          $ProdCodeErr = "Product Code is required\n";
          $error = true;
        } else {
          $product_code = sanitize($_POST["product_code"]);
        }
        
        if (empty($_POST["product_name"])) {
          $ProdNameErr = "Product Name is required";
          $error = true;
        } else {
          $product_name = sanitize($_POST["product_name"]);
        }
          
        if (empty($_POST["description"])) {
          $DescErrMsg = "Description is required";
          $error = true;
        } else {
          $description = sanitize($_POST["description"]);
        }
        if (empty($_POST["list_price"])) {
          $LPriceErrMsg = "List Price is required";
          $error = true;
        } else {
          $list_price = sanitize($_POST["list_price"]);
        }
        //If discount_percent is not set, set it to 0 and do not display an error.
        if (empty($_POST["discount"])) {
              $discount = 0;
        } else {
          $discount = sanitize($_POST["discount"]);
        }
        //If there where no errors, update the record.
        if($error === false) {
            //mysqli_real_escape_string() gets the string ready to use in a SQL statement to update the record.
            $price = floatval($list_price) - (floatval($list_price) * (floatval($discount)/100));
            $product_code = mysqli_real_escape_string($db_conn, $product_code);
            $product_name = mysqli_real_escape_string($db_conn, $product_name);
            $description = mysqli_real_escape_string($db_conn, $description);
            $list_price = mysqli_real_escape_string($db_conn, $list_price);
            $discount = mysqli_real_escape_string($db_conn, $discount);
            $price = mysqli_real_escape_string($db_conn, $price);

            
            //SQL statement to update the record.
            $sql = "UPDATE product_list SET code='". $product_code ."', name='" . $product_name . "', description='" . $description . "', list_price=" . $list_price . ", discount=" . $discount .", price=" . $price ." WHERE id=". $product_id . ";";
            if (mysqli_query($db_conn, $sql)) {
              echo('<div class="alert alert-success" role="alert">
                    <h1>Record updated successfully</h1>
                    </div>');
            } else {
              echo('<div class="alert alert-danger" role="alert">');
              echo "<h1>Error updating record: " . mysqli_error($db_conn) . "</h1>";
              echo('</div>');  
            }
            ?>
            <table class="table table-striped border-top ">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Product ID</th>
      <th scope="col">Product Code</th>
      <th scope="col">Product Name</th>
      <th scope="col">Description</th>
      <th scope="col">List Price</th>
      <th scope="col">Discount %</th>
      <th scope="col">Our Price</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $sql = "SELECT * FROM product_list";
        $result = mysqli_query($db_conn, $sql) or die("Error With SQL query");
        
        while($row = mysqli_fetch_assoc($result)){
            $formatted_list_price = number_format(floatval($row['list_price']),2);
            $formatted_discount = number_format(floatval($row['discount']),2);
            $formatted_price = number_format(floatval($row['price']),2);
            echo("<tr>
            <th scope='row'><form method='get' role='form'>
                <input type='hidden' name='id' value='{$row['id']}'/> 
                <button type='submit' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#dataChange'>Edit</button>
            </form></th>
            <td>{$row['id']}</td>
            <td>{$row['code']}</td>
            <td>{$row['name']}</td>
            <td>{$row['description']}</td>
            <td>{$formatted_list_price}</td>
            <td>{$formatted_discount}</td>
            <td>{$formatted_price}</td>
          </tr>");
        }
    ?>
</table>
            <?php
            die();
        }else {
            $display_form = true;
        }
      
      }else {
        $display_form = true;
        }

        if($display_form){
            if(isset($_GET['id'])) {
                $product_id = sanitize($_GET["id"]);
                $_SESSION["id"] = $product_id;
                $sql = "SELECT * FROM product_list WHERE id=" . $product_id . ";";
                $result = mysqli_query($db_conn, $sql) or die("Error With SQL query");
                $row_count=mysqli_num_rows($result);
                if ($row_count > 0){
                    $row = mysqli_fetch_assoc($result);
                    $product_code = $row["code"];
                    $product_name = $row["name"];
                    $description = $row["description"];
                    $list_price = $row["list_price"];
                    $discount = $row["discount"];
                }
            }
?>    

    <table class="table table-striped border-top mb-5 ">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Product ID</th>
      <th scope="col">Product Code</th>
      <th scope="col">Product Name</th>
      <th scope="col">Description</th>
      <th scope="col">List Price</th>
      <th scope="col">Discount %</th>
      <th scope="col">Our Price</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $sql = "SELECT * FROM product_list";
        $result = mysqli_query($db_conn, $sql) or die("Error With SQL query");
        
        while($row = mysqli_fetch_assoc($result)){
            echo("<tr>
            <th scope='row'><form method='get' role='form'>
                <input type='hidden' name='id' value='{$row['id']}'/> 
                <button type='submit' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#dataChange'>Edit</button>
            </form></th>
            <td>{$row['id']}</td>
            <td>{$row['code']}</td>
            <td>{$row['name']}</td>
            <td>{$row['description']}</td>
            <td>{$row['list_price']}</td>
            <td>{$row['discount']}</td>
            <td>{$row['price']}</td>
          </tr>");
        }
    ?>
</table>

<?php
    if(isset($_GET["id"]) or !empty($_POST['id']) ){
        echo("<script>$(window).load(function()
        {
            $('#dataChange').modal('show');
        });</script>");
    }
?>
    
<div class="modal fade" id="dataChange" tabindex="-1" aria-labelledby="dataChangeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="dataChangeTitle">Edit Database</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="products.php" method="post" role="form">
            <div class="modal-body">
                    <input type="hidden" name='id' value="<?php echo($product_id)?>"/>
                    <label class="<?php if(empty($product_code)) echo('text-danger') ?>" for="product_code">Product Code</label><br>
                    <input class="mb-2" type="text" id="product_code" name="product_code" value="<?php echo($product_code)?>"><br>
                    
                    <label class="<?php if(empty($product_name)) echo('text-danger') ?>" for="product_name">Product Name</label><br>
                    <input class="mb-2" type="text" id="product_name" name="product_name" value="<?php echo($product_name)?>"><br>
                    
                    
                    <label class="<?php if(empty($description)) echo('text-danger') ?>" for="description">Description</label><br>
                    <textarea class="form-control border border-1 border-secondary border-none rounded-0" id="description" name="description" rows="3" placeholder="Description"><?php echo($description)?></textarea><br>

                    <label class="<?php if(empty($list_price)) echo('text-danger') ?>" for="list_price">List Price</label><br>
                    <input class="mb-2" type="text" id="list_price" name="list_price" value="<?php echo($list_price)?>"><br>
                    
                    <label class="<?php if(empty($discount)) echo('text-warning') ?>" for="discount">Discount %</label><br>
                    <input class="mb-2" type="text" id="discount" name="discount" value="<?php echo($discount)?>"><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>
<?php
        }
?>


</body>


<?php
    include 'webmodules/footer.php';
?>
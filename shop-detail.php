<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail-product</title>
    <link rel="stylesheet" href="css/detail-product.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>

<body> 
    <?php
        require_once("./model/connect.php");
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-5">
                <div class="main-img">
                    <img class="img-fluid" src="<?php echo $row['image'] ?>" alt="ProductS">
                </div>
            </div>
            <div class="col-md-7">
                <div class="main-description px-2">
                    <div class="category text-bold">
                        <?php
                            $category_id = $row['category_id'];
                            switch ($category_id) {
                                case '1':
                                    echo 'Category: Men';
                                    break;                             
                                case '2':
                                    echo 'Category: Women';
                                    break;
                                case '3':
                                    echo 'Category: New';
                                    break;
                            }
                        ?>
                    </div>
                    <div class="product-title text-bold my-3">
                    <?php echo $row['name'] ?>
                    </div>


                    <div class="price-area my-4">
                        <p class="new-price text-bold mb-1"><?php echo "" . $row["price"] . "đ" ?></p>
                        <p class="text-secondary mb-1"><?php echo "(Quantity " . $row["quantity"] . ")" ?></p>

                    </div>


                    <div class="buttons d-flex my-5">
                        <div class="block">
                            <button class="shadow btn custom-btn">Add to cart</button>
                        </div>

                        <div class="block quantity">
                            <input type="number" class="form-control" id="cart_quantity" value="1" min="0" max="5" placeholder="Enter email" name="cart_quantity">
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>

    </div>

</body>

</html>
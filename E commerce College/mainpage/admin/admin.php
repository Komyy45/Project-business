<?php 
    $db = new PDO("mysql: host=localhost;dbname=products;" , "root" , "");


    if(isset($_POST['send'])){
        $prodName = $_POST['name'];
        $prodDescription = $_POST['description'];
        $prodPrice = $_POST['price'];
        $prodCategory = $_POST['category'];

        $ImageName = $_FILES['image']["name"];
        $ImageType = $_FILES['image']["type"];
        $ImageData = file_get_contents($_FILES['image']["tmp_name"]);

        $sql = $db->prepare("INSERT INTO product(name , description , price , category , image_name , image_data , image_type) VALUES(:name , :description , :price , :category , :imageName , :imageData , :imageType)");
        $sql->bindParam("name" , $prodName);
        $sql->bindParam("description" , $prodDescription);
        $sql->bindParam("price" , $prodPrice);
        $sql->bindParam("category" , $prodCategory);
        $sql->bindParam("imageName" , $ImageName);
        $sql->bindParam("imageType" , $ImageType);
        $sql->bindParam("imageData" , $ImageData ,  PDO::PARAM_LOB);
        $sql->execute();


        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }

    $getData =  $db->prepare("SELECT * FROM  product");
    $getData->execute();

    $rowCount = $getData->rowCount();

    if(isset($_GET['delete'])){
    $delete =  $db->prepare("DELETE FROM product WHERE id = $_GET[delete]");
        $delete->execute();
        header("location:admin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <link rel="stylesheet" href="admin.css" />
</head>
<body >
    <div class="panel pt-5 pb-5">
        <div class="container">
            <h2 class="title"><span><i class='bx bxs-user-badge mr-5'></i></span> Admin Panel</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" id="productName" required>
                </div>
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" id="productDescription" required>
                </div>
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Product Price</label>
                    <input type="number" name="price" class="form-control" id="productPrice" required>
                </div>
                <div class="mb-3">
                    <label for="productCategory" class="form-label">Product Category</label>
                    <input type="text" name="category" class="form-control" id="productCategory" required>
                </div>
                <div class="mb-3">
                    <label for="productImage" class="form-label">Product Image</label>
                    <input type="file" name="image" class="form-control" id="productImage" required>
                </div>
                <button type="submit" name="send" class="btn btn-primary">Upload Product</button>
            </form>
        </div>
    </div>

    <div class="products pt-5 pb-5">
        <div class="container">
            <div class="title"><span><i class='bx bx-list-ul' ></i></span>Your Prodcuts</div>
        </div>
            <div class="container text-center">
                
            <?php 
                foreach($getData as $product){
                    $getFile = "data: " . $product['image_type']  . ";base64,". base64_encode($product['image_data']) ;
                    echo <<<"here"
                            <div class="card text-start" style="width: 18rem; ">
                                <img src="$getFile" class="card-img-top" style="max-height: 16rem; width: 100%;" alt="...">
                                    <div class="card-body">
                                    <h5 class="card-title">$product[name]</h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">$product[category]</h6>
                                    <p class="card-text">$product[description]</p>
                                    <h6 class="card-subtitle mb-2 text-body-danger">$product[price]</h6>
                                        <form method="GET">
                                            <button class="btn btn-danger" name="delete" value="$product[id]">Delete</button>
                                        </form>
                                </div>
                            </div>
                        here;
                }
                
                if($rowCount == 0){
                    echo <<<"here"
                        <div class="alert alert-primary d-flex align-items-center warn" role="alert">
                        <i class='bx bx-info-circle' ></i>There is no products added
                        </div>
                    here;
                }
            ?>

            </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
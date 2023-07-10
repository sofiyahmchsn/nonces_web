<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product | Admin</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Edit Product</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" id="product_title" name="product_title" class="form-control" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_desc" class="form-label">Product Description</label>
                <input type="text" id="product_desc" name="product_desc" class="form-control" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Product Categories</label>
                <select name="product_category" class="form-select">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_img" class="form-label">Product Image</label>
                <div class="d-flex">
                    <input type="file" id="product_img" name="product_img" class="form-control w-90 m-auto" required="required">
                    <img src="./product_images/lapis-legit-nutella.jpg" alt="" class="product_img">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" id="product_price" name="product_price" class="form-control" required="required">
            </div>
            <div class="w-50 m-auto">
                <input type="submit" name="edit_product" value="Update" class="btn btn-info px-3 py-2 text-light">
            </div>
        </form>
    </div>
</body>
</html>
<?php
include "header.php";
include "slider.php";
include "./class/product_class.php";
?>
<?php
$product = new product;
if(!isset($_GET['product_id']) || $_GET['product_id'] ==NULL ){
    echo "<script>window.location = 'productlis.php'</script>";
}
else{
    $product_id = $_GET['product_id'];
}

$get_product = $product -> get_product($product_id);
 if ($get_product){
    $result= $get_product -> fetch_assoc();
 }
?>
<?php
 if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $delete_product = $product -> delete_product($product_id);    
 }
?>
<div class="admin-content-right">
            <div class="admin-content-right-cartegory_add">
                <h1>Xóa danh mục</h1>
                <form action="" method="post">
                    <!-- <input name="cartegory_name" type="text" placeholder="Nhập tên danh mục" value="            "> --> 
                    <p style="font-weight: bold; font-size: 15px;">Bạn muốn xóa loại sản phẩm " <?php echo $result['product_name'] ?> "</p>
                    <button style="background-color: red; color:white; font-weight: bold;" type="submit">Xóa Loại sản phẩm</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html> 
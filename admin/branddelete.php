<?php
include "header.php";
include "slider.php";
include "./class/brand_class.php";
?>
<?php
$brand = new brand;
if(!isset($_GET['brand_id']) || $_GET['brand_id'] ==NULL ){
    echo "<script>window.location = 'brandlis.php'</script>";
}
else{
    $brand_id = $_GET['brand_id'];
}

$get_brand = $brand -> get_brand($brand_id);
 if ($get_brand){
    $result= $get_brand -> fetch_assoc();
 }
?>
<?php
 if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $delete_brand = $brand -> delete_brand($brand_id);    
 }
?>
<div class="admin-content-right">
            <div class="admin-content-right-cartegory_add">
                <h1>Xóa danh mục</h1>
                <form action="" method="post">
                    <!-- <input name="cartegory_name" type="text" placeholder="Nhập tên danh mục" value="            "> --> 
                    <p style="font-weight: bold; font-size: 15px;">Bạn muốn xóa loại sản phẩm " <?php echo $result['brand_name'] ?> "</p>
                    <button style="background-color: red; color:white; font-weight: bold;" type="submit">Xóa Loại sản phẩm</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html> 
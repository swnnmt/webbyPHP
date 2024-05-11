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
    $brand_name=$_POST['brand_name'];
    $update_brand = $brand ->update_brand($brand_name,$brand_id);     
 }
?>

<div class="admin-content-right">
            <div class="admin-content-right-cartegory_add">
                <h1>Chỉnh sửa danh mục</h1>
                <form action="" method="post">
                    <input name="brand_name" type="text" placeholder="Nhập tên danh mục" value=" <?php echo $result['brand_name'] ?> ">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html> 
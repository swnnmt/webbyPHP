<?php
include "header.php";
include "slider.php";
include "./class/product_class.php";
?>
<?php
$product = new product;
$show_cartegory = $product->show_cartegory();

if(!isset($_GET['product_id']) || $_GET['product_id'] ==NULL ){
    echo "<script>window.location = 'productlist.php'</script>";
}
else{
    $product_id = $_GET['product_id'];
}
$get_product = $product -> get_product($product_id);
 if ($get_product){
    $result= $get_product -> fetch_assoc();
 }
 
?>

<!--Ajax gửi dữ liệu và cập nhật bảng brand -->


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_img_desc = $_FILES['product_img_desc']['name'];
    if(isset($product_img_desc)){
        $product_name=$_POST['product_name'];
        $cartegory_id=$_POST['cartegory_id'];
        $brand_id=$_POST['brand_id'];
        $product_price=$_POST['product_price'];
        $product_price_new=$_POST['product_price_new'];
        $product_desc=$_POST['product_desc'];
        $product_img = $_FILES['product_img']['name'];
        $update_product = $product-> update_product($product_id,$product_name,$cartegory_id,$brand_id,$product_price,$product_price_new,$product_desc,$product_img);
    }
}
?>
<!--  -->
<div class="admin-content-right">
    <div class="admin-content-right-product_add">
        <h1>Thêm sản phẩm</h1>
        <form name="add_product" action="" method="post" enctype="multipart/form-data">
            <label for="">Nhập tên sản phẩm <span style="color: red;">*</span></label>
            <input name="product_name" required type="text" value="<?php echo $result['product_name'] ?>">
            <label for="">Giá sản phẩm <span style="color: red;">*</span></label>
            <input name="product_price" required type="text" value="<?php echo $result['product_price']?>" >
            <label for="">Giá khuyến mãi <span style="color: red;">*</span></label>
            <input name="product_price_new" required type="text" value="<?php echo $result['product_price_new']?>">
            <label for="">Mô tả sản phẩm <span style="color: red;">*</span></label><br>
            <textarea require name="product_desc" id="" cols="30" rows="10" placeholder="Nhập mô tả"  > <?php echo $result['product_desc'] ?></textarea>
            <br>
            <div>
            <!-- Đổ các danh mục từ dbs -->
            <label for="">chọn danh mục <span style="color: red;">*</span></label>
            
            <select name="cartegory_id" id="cartegory" onchange="showSelectValue_cartegory()" >
            <option value="#">--Danh Mục</option>
            <?php
               if ($show_cartegory) {
                   while ($result = $show_cartegory->fetch_assoc()) {
               ?>
                    <option value="<?php echo $result['cartegory_id'] ?>"><?php echo $result['cartegory_name'] ?> </option>
               <?php
                   }
               }
               ?>
            </select>        
            <!-- Đổ các loại sản phẩm từ dbs theo tên danh mục -->
            <label for="">chọn loại sản phẩm <span style="color: red;">*</span></label>
            <select name="brand_id" id="brand"> 
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cartegory_id"])) {
                    $cartegory_id = $_POST["cartegory_id"];
                    // Xử lý dữ liệu và tạo HTML cho loại sản phẩm
                    $show_brand = $product->get_brand_folow_cartegory($cartegory_id);
                    $html = '<option value="#">--Loại sản phẩm </option>';
                    while ($result = $show_brand->fetch_assoc()) {
                        $html .= '<option value="' . $result['brand_id'] . '">' . $result['brand_name'] . '</option>';
                    }
                    echo $html;
                }
                ?>
            </select>
            </div>
            <!--  -->
            <label for="">Ảnh sản phẩm <span style="color: red;">*</span></label>
            <input name="product_img" required type="file"value="<?php echo $result['product_img'] ?>" >
            <label for="">Ảnh mô tả <span style="color: red;">*</span></label>
            <input name="product_img_desc" required multiple type="file">
            <button type="submit">update</button>
        </form>
    </div>
</div>
</section>
</body>
<script type="text/javascript">
    function showSelectValue_cartegory() {
        var cartegory_id = document.getElementById("cartegory").value;
        console.log(cartegory_id);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "productadd.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("brand").innerHTML = xhr.responseText;
                console.log(xhr.responseText);
            }
        };
        xhr.send("cartegory_id=" + encodeURIComponent(cartegory_id));
    }
</script>
</html>
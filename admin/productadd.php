<?php
include "header.php";
include "slider.php";
include "./class/product_class.php";
?>
<?php
$product = new product;
$show_cartegory = $product->show_cartegory();
?>
<!-- show brand folow cartegory_id -->

<!--Ajax gửi dữ liệu và cập nhật bảng brand -->
<script type="text/javascript">
    function showSelectValue_cartegory() {
        var cartegory_id = document.getElementById("cartegory").value;
        console.log(cartegory_id);
        // Sử dụng AJAX để gửi giá trị cartegory_id về PHP
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
<!-- gửi dữ liệu brand -->
<!-- <script type="text/javascript">
    function showSelectValue_brand() {
        var brand_id = document.getElementById("brand").value;
        console.log(brand_id);
        // Sử dụng AJAX để gửi giá trị brand_id về PHP
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "productadd.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log("ok");
            }
        };
        xhr.send("brand_id=" + encodeURIComponent(brand_id));
    }
</script> -->
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_img_desc = $_FILES['product_img_desc']['name'];
    if(isset($product_img_desc)){
    $insert_product = $product ->insert_product($_POST,$_FILES);
    }
}
?>
<!--  -->
<div class="admin-content-right">
    <div class="admin-content-right-product_add">
        <h1>Thêm sản phẩm</h1>
        <form name="add_product" action="" method="post" enctype="multipart/form-data">
            <label for="">Nhập tên sản phẩm <span style="color: red;">*</span></label>
            <input name="product_name" required type="text">
            <!-- Đổ các danh mục từ dbs -->
            <label for="">chọn danh mục <span style="color: red;">*</span></label>
            
            <select name="cartegory_id" id="cartegory" onchange="showSelectValue_cartegory()" >
            <option value="#">--Danh Mục</option>
            <?php
                $stt = 0;
                if ($show_cartegory) {
                    while ($result = $show_cartegory->fetch_assoc()) {
                        $stt++;
                        echo '<option value="' . $result['cartegory_id'] . '">' . $result['cartegory_name'] . '</option>';
                    }
                }
                ?>
            </select>
                   
            <!-- Đổ các loại sản phẩm từ dbs theo tên danh mục -->
            <label for="">chọn loại sản phẩm <span style="color: red;">*</span></label>
            <select name="brand_id" id="brand">  <!--onclick="showSelectValue_brand()"-->
              
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
            <!--  -->
            <label for="">Giá sản phẩm <span style="color: red;">*</span></label>
            <input name="product_price" required type="text">
            <label for="">Giá khuyến mãi <span style="color: red;">*</span></label>
            <input name="product_price_new" required type="text">
            <label for="">Mô tả sản phẩm <span style="color: red;">*</span></label><br>
            <textarea require name="product_desc" id="" cols="30" rows="10" placeholder="Nhập mô tả" name=""></textarea>
            <br>
            <label for="">Ảnh sản phẩm <span style="color: red;">*</span></label>
            <input name="product_img" required type="file" >
            <label for="">Ảnh mô tả <span style="color: red;">*</span></label>
            <input name="product_img_desc" required multiple type="file">
            <button type="submit">Thêm</button>
        </form>
    </div>
</div>
</section>
</body>

</html>
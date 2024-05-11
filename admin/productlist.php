<?php
include "header.php";
include "slider.php";
include "./class/product_class.php";
?>
<?php
$product = new product;
$show_product = $product ->show_product();
?>
<div class="admin-content-right">
    <div class="admin-content-right-cartegory_list">
        <h1>Danh sách loại sản phẩm</h1>
        <table>
            <tr>
                <th>Số thứ tự</th>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Cartegory_name</th>
                <th>Brand_name</th>
                <th>Giá sản phẩm</th>
                <th>Giá ưu đãi</th>
                <th>Nội dung</th>
                <th>tên ảnh chính</th>
                <th>Chỉnh sửa</th>
            </tr>
            <?php
            $stt=0;
            if ($show_product) {
                while ($result = $show_product->fetch_assoc()) {
                    $stt++;
            ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $result['product_id']?></td>
                        <td><?php echo $result['product_name'] ?></td>
                        <td><?php echo $result['cartegory_name'] ?></td>
                        <td><?php echo $result['brand_name'] ?></td>
                        <td><?php echo $result['product_price'] ?></td>
                        <td><?php echo $result['product_price_new'] ?></td>
                        <td><?php echo $result['product_desc'] ?></td>
                        <td><?php echo $result['product_img'] ?></td>
                        <td><a href="productedit.php?product_id=<?php echo $result['product_id'] ?>">Sửa</a>|<a href="productdelete.php?product_id=<?php echo $result['product_id'] ?>">Xóa</a></td>
                
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</div>
</section>
</body>

</html>
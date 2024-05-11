<?php
include "header.php";
include "slider.php";
include "./class/brand_class.php";
?>
<?php
$brand = new brand;
$show_brand = $brand ->show_brand();
?>
<div class="admin-content-right">
    <div class="admin-content-right-cartegory_list">
        <h1>Danh sách loại sản phẩm</h1>
        <table>
            <tr>
                <th>Số thứ tự</th>
                <th>ID</th>
                <th>Cartegory_id</th>
                <th>Cartegory_name</th>
                <th>Tên loại sản phẩm</th>
                <th>Chỉnh sửa</th>
            </tr>
            <?php
            $stt=0;
            if ($show_brand) {
                while ($result = $show_brand->fetch_assoc()) {
                    $stt++;
            ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $result['brand_id']?></td>
                        <td><?php echo $result['cartegory_id'] ?></td>
                        <td><?php echo $result['cartegory_name'] ?></td>
                        <td><?php echo $result['brand_name'] ?></td>
                        <td><a href="brandedit.php?brand_id=<?php echo $result['brand_id'] ?>">Sửa</a>|<a href="branddelete.php?brand_id=<?php echo $result['brand_id'] ?>">Xóa</a></td>
                
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
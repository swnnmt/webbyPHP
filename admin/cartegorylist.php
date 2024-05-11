<?php
include "header.php";
include "slider.php";
include "./class/cartegory_class.php";
?>
<?php
$cartegory = new cartegory;
$show_cartegory = $cartegory ->show_cartegory();
?>
<div class="admin-content-right">
    <div class="admin-content-right-cartegory_list">
        <h1>Danh sách danh mục</h1>
        <table>
            <tr>
                <th>Số thứ tự</th>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Chỉnh sửa</th>
            </tr>
            <?php
            $stt=0;
            if ($show_cartegory) {
                while ($result = $show_cartegory->fetch_assoc()) {
                    $stt++;
            ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $result['cartegory_id'] ?></td>
                        <td><?php echo $result['cartegory_name'] ?></td>
                        <td><a href="cartegoryedit.php?cartegory_id=<?php echo $result['cartegory_id'] ?>">Sửa</a>|<!-- <form action="" method="post"> --><a href="cartegorydelete.php?cartegory_id=<?php echo $result['cartegory_id'] ?>">Xóa</a><!-- </form> --></td>
                
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
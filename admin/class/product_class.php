<?php
include "database.php";
?>
<?php
class product{
    private $db;

    public function __construct()
    {
        $this ->db =new Database();
    }
    public function show_cartegory(){
        $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
        $result = $this -> db->select($query);
        return $result;
    }
    public function show_brand_folow(){
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT *, tbl_cartegory.cartegory_name
        FROM tbl_brand INNER JOIN tbl_cartegory ON tbl_brand.cartegory_id = tbl_cartegory.cartegory_id
        ORDER BY tbl_brand.brand_id DESC";
        $result = $this -> db->select($query);
        return $result;
    }
    public function get_brand_folow_cartegory ($cartegory_id){
        $query = "SELECT * FROM tbl_brand WHERE cartegory_id ='$cartegory_id'";
        $result = $this -> db->select($query);
        return $result;
    }
    public function insert_product(){
        $product_name=$_POST['product_name'];
        $cartegory_id=$_POST['cartegory_id'];
        $brand_id=$_POST['brand_id'];
        $product_price=$_POST['product_price'];
        $product_price_new=$_POST['product_price_new'];
        $product_desc=$_POST['product_desc'];
        $product_img = $_FILES['product_img']['name'];
        $query = "INSERT INTO tbl_product
        (product_name,
        cartegory_id,
        brand_id,
        product_price,
        product_price_new,
        product_desc,
        product_img) 
        VALUE ('$product_name',
            '$cartegory_id',
            '$brand_id',
            '$product_price',
            '$product_price_new',
            '$product_desc',
            '$product_img')";
        $result = $this -> db->insert($query);
        // header('Location:brandlist.php');
        return $result;
    }
 public function show_product(){
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT *, tbl_cartegory.cartegory_name,tbl_brand.brand_name
        FROM tbl_product 
        INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
        INNER JOIN tbl_cartegory ON tbl_product.cartegory_id = tbl_cartegory.cartegory_id
        ORDER BY tbl_product.product_id DESC";
        $result = $this -> db->select($query);
        return $result;
    }
    public function get_product ($product_id){
        $query = "SELECT * FROM tbl_product WHERE product_id ='$product_id'";
        $result = $this -> db->select($query);
        return $result;
    }
    public function delete_product($product_id){
        $query = "DELETE FROM tbl_product WHERE product_id = '$product_id' ";
        $result = $this -> db->delete($query);
        header('Location:productlist.php');
        return $result;
    }
    public function update_product($product_id,$product_name,$cartegory_id,$brand_id,$product_price,$product_price_new,$product_desc,$product_img){
        
        $query = "UPDATE tbl_product SET product_name= '$product_name',product_price='$product_price',
        product_price_new='$product_price_new',product_desc='$product_desc',product_img='$product_img',cartegory_id='$cartegory_id',brand_id='$brand_id'
        WHERE product_id = '$product_id' ";
        $result = $this -> db->insert($query);
        header('Location:productlist.php');
        return $result;
    }












    // public function show_brand(){
    //     // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
    //     $query = "SELECT *, tbl_cartegory.cartegory_name
    //     FROM tbl_brand INNER JOIN tbl_cartegory ON tbl_brand.cartegory_id = tbl_cartegory.cartegory_id
    //     ORDER BY tbl_brand.brand_id DESC";
    //     $result = $this -> db->select($query);
    //     return $result;
    // }
    public function get_brand ($brand_id){
        $query = "SELECT * FROM tbl_brand WHERE brand_id ='$brand_id'";
        $result = $this -> db->select($query);
        return $result;
    }
    public function update_brand($brand_name,$brand_id){
        $query = "UPDATE tbl_brand SET brand_name= '$brand_name' WHERE brand_id = '$brand_id' ";
        $result = $this -> db->update($query);
        header('Location:brandlist.php');
        return $result;
    }
    public function delete_brand($brand_id){
        $query = "DELETE FROM tbl_brand WHERE brand_id = '$brand_id' ";
        $result = $this -> db->delete($query);
        header('Location:brandlist.php');
        return $result;
    }















    public function get_cartegory ($cartegory_id){
        $query = "SELECT * FROM tbl_cartegory WHERE cartegory_id ='$cartegory_id'";
        $result = $this -> db->select($query);
        return $result;
    }
    public function update_catergory($cartegory_name,$cartegory_id){
        $query = "UPDATE tbl_cartegory SET cartegory_name= '$cartegory_name' WHERE Cartegory_id = '$cartegory_id' ";
        $result = $this -> db->update($query);
        header('Location:cartegorylist.php');
        return $result;
    }
    public function delete_catergory($cartegory_id){
        $query = "DELETE FROM tbl_cartegory WHERE Cartegory_id = '$cartegory_id' ";
        $result = $this -> db->delete($query);
        header('Location:cartegorylist.php');
        return $result;
    }
}

?>
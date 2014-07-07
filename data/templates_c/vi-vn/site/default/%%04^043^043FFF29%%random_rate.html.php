<?php /* Smarty version 2.6.27, created on 2014-07-02 15:54:40
         compiled from default%5Cstudypost/random_rate.html */ ?>
<meta charset="utf-8">
    <h2>Tăng điểm cho SHOP</h2>
<form action="index.php?do=studypost&action=random_rate" method="post">
    <input type="hidden" name="shop" value="1" />
    Chọn số điểm bất kỳ tăng: <br />
    Từ - <input type="text" name="min_rand" value="<?php echo $_POST['min_rand']; ?>
" /><br />
    Đến - <input type="text" name="max_rand" value="<?php echo $_POST['max_rand']; ?>
" /><br /><br />
    
    Chọn SHOP với số điểm: <br />
    Từ - <input type="text" name="min_rate" value="<?php echo $_POST['min_rate']; ?>
" /><br />
    Đến - <input type="text" name="max_rate" value="<?php echo $_POST['max_rate']; ?>
" /><br /><br />
    <input type="submit" value="Tăng điểm..." />
</form>

<br />
<br />
<h2>Tăng điểm cho thương mại</h2>
<form action="index.php?do=studypost&action=random_rate" method="post">
    <input type="hidden" name="offer" value="1" />
    Chọn số điểm bất kỳ tăng: <br />
    Từ - <input type="text" name="min_rand" value="<?php echo $_POST['min_rand']; ?>
" /><br />
    Đến - <input type="text" name="max_rand" value="<?php echo $_POST['max_rand']; ?>
" /><br /><br />
    
    Chọn sản phẩm Thương mại với số điểm: <br />
    Từ - <input type="text" name="min_rate" value="<?php echo $_POST['min_rate']; ?>
" /><br />
    Đến - <input type="text" name="max_rate" value="<?php echo $_POST['max_rate']; ?>
" /><br /><br />
    <input type="submit" value="Tăng điểm..." />
</form>
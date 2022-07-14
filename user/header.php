<div class="header-top">
    <div class="logo">
        <a href="#">Shop DiEnTi</a>
    </div>
    <div class="header-right">
        <?php
        session_start();
        ?>
        <?php if (empty($_SESSION['id'])) { ?>
            <button type="button" id="btn-show-signin" data-toggle="modal" data-target="#myModal" class="btn btn-info">Login</button>
        <?php } else { ?>
            <button data-toggle="modal" id="btn-view-cart" data-target="#myModal"><i class='fas fa-shopping-cart' style='font-size:20px; margin-right: 10px;'>Giỏ Hàng</i></button>
            <span><a href="#"><i class="fas fa-user" style='font-size:20px'><?php echo $_SESSION['name']; ?></i></a></span>
            <button type="button" id="btn-signout" class="btn btn-danger">Signout</button>
        <?php } ?>
    </div>
</div>
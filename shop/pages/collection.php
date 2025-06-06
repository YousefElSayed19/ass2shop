<?php
    session_start();
    $admin = $_SESSION['admin'];
    $image = $_SESSION['image'];
    $state = isset($_SESSION["state"]) ? $_SESSION["state"] : "";
    $full_name = isset($_SESSION["full_name"]) ? $_SESSION["full_name"] : "";
    $parts = explode(" ", $full_name); 
    $full_name = $parts[0];

    if (isset($_POST['logout'])) {
        $state = false;
        $image = false;
        $admin = false;
        $_SESSION['state']=false;
        $_SESSION['image']=false;
        $_SESSION['admin']=false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe-Store</title>
    <link rel="stylesheet" href="../style/style.css">
    <link  rel ="stylesheet" href="../style/user.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
    
    <nav>
        <div class="container" style="align-items: center;">
            <div class="left">
                <a href="../index.php">
                    <h1 class="logo">PlASHOE</h1>
                </a>
                <ul class="links">
                    <li>
                        <a href="./men.php" >MEN</a>
                    </li>
                    <li>
                        <a href="./women.php" >WOMEN</a>
                    </li>
                    <li>
                        <a href="" class="active">COLLECTION</a>
                    </li>
                    <li>
                        <a href="./lookbook.php">LOOKBOOK</a>
                    </li>
                    <li>
                        <a href="./sale.php">SALE</a>
                    </li>
                </ul>
            </div>
            <?php 
                echo ($state && $admin) 
                    ? "<div class='center username' style='width: max-content; padding: 0 10px; background: rgb(255, 69, 69);'>Hello {$full_name}</div>" 
                    : ($state 
                        ? "<div class='center username' style='width: max-content; padding: 0 10px; background: rgb(69, 255, 69);'>Hello {$full_name}</div>" 
                        : ""
                    ); 
            ?>
            <ul class="right">
                <li>
                    <a href="./story.php">OUR STORY</a>
                </li>
                <li>
                    <a href="./contact.php">CONTACT</a>
                </li>
                <li class="cartIcon">
                    <div class="icon">
                        <span class="numberOfProduct">5</span>
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                </li>
                <li>
                    <?php echo (!$admin) ?  
                        ""
                        :"<a href='../user/dashboard.php'><i class='fa-solid fa-gear'></i></a>";
                    ?>
                </li>
                <li class="log">
                    <form method="POST" class="logout">
                        <?php echo ($state) ? "<button name='logout' style='background: red;color: white;border-radius: 10px;padding: 10px 15px;font-weight: bold;'>out</button>" : ""; ?>
                    </form>
                </li>
                <li>
                    <span class="state <?php echo ($state) ? 'isLogin' : 'isLogout'; ?>"></span>
                    <a href="<?php echo ($state) ? '../user/profile.php' : '../user/login.php'; ?>">
                    <?php 
                        if ($image) {
                            echo '<img src="' . $image . '" style="width: 50px;border-radius: 50%;height: 50px;" alt="User Image">';
                        }else{
                            echo '<i class="fa-regular fa-user"></i>';
                        }
                    ?>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="men">
        <div class="container1">
            <h1 class="title">Shop</h1>
            <?php 
                include("../user/connection.php");
                include("../user/products.php");
            ?>
        </div>
    </div>

    <form action="post"></form>

    <div class="better">
        <div class="text">
            <h1>Better for People & the Planet</h1>
            <p>Ut eget at et aliquam sit quis nisl, pharetra et ac pharetra est dictum in vulputate</p>
            <a href="../pages/men.php">
                <button class="mainButton">SHOP MEN</button>
            </a>
            <a href="../pages/women.php">
                <button class="mainButton">Shop WOMEN</button>
            </a>
        </div>
    </div>


    <div class="logsFooter">
        <div class="container2">
            <p>
                <i class="fas fa-lock"></i>
                Secure Payment
            </p>
            <p>
                <i class="fas fa-truck"></i>
                Secure Payment
            </p>
            <p>
                <i class="fas fa-sync-alt"></i>
                Secure Payment
            </p>
        </div>
    </div>

    <div class="container2">
        <hr>
    </div>

    <div class="footer">
        <div class="container1">
            <div class="col1">
                <h1>PLASHOE</h1>
                <p>Praesent eget tortor sit risus <br> egestas nulla pharetra ornare <br> quis bibendum est bibendum <br> sapien proin nascetur</p>
                <div class="icons">
                    <div class="links">
                        <a target="_blank" href=""><i class="fa-brands fa-facebook fs-2 me-2"></i></a>
                        <a target="_blank" href=""><i class="fa-brands fa-github fs-2 me-2"></i></a>
                        <a target="_blank" href=""><i class="fa-brands fa-linkedin fs-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col2">
                <h1>SHOP</h1>
                <p>Shop Men</p>
                <p>Shop Women</p>
                <p>LookBook</p>
                <p>Gift Card</p>
                <p>Sale</p>
            </div>
            <div class="col3">
                <h1>About</h1>
                <p>Our Story</p>
                <p>Our Materials</p>
                <p>Our Value</p>
                <p>Sustainability</p>
                <p>Manufacture</p>
            </div>
            <div class="col2">
                <h1>Need Help?</h1>
                <p>FAQs</p>
                <p>Shipping & Returns</p>
                <p>Shoe Care</p>
                <p>Size Chart</p>
                <p>Contact Us</p>
            </div>
        </div>
    </div>


    <div class="dev">
        <div class="container1">
            <p>© 2024 Recycled Shoe Store. Powered by Recycled Shoe Store.</p>
            <div class="img">
                <img src="../images/img/payment-icons.png" alt="">
            </div>
        </div>
    </div>

    <div class="cart close">
        <div class="title">
            <p>Shopping Cart</p>
            <p class="delete">x</p>
        </div>
        <div class="cards">

        </div>
    </div>
    <div class="shodow"></div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../script/main.js"></script>

</body>
</html>
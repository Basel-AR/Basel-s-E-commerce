<?php

session_start();

$name = $_SESSION['name'] ?? null;
$alerts = $_SESSION['alerts'] ?? [];
$active_form = $_SESSION['active_form'] ?? '';
$welcome_shown = $_SESSION['welcome_shown'] ?? false;

$show_welcome = !empty($name) && !$welcome_shown;

// Keep session values that should persist across page loads.
unset($_SESSION['alerts'], $_SESSION['active_form']);

if ($name !== null) $_SESSION['name'] = $name;
$_SESSION['welcome_shown'] = $welcome_shown;

if ($show_welcome) {
    $_SESSION['welcome_shown'] = true;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basel's Ecommerce</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section id="header">
        <a href="index.html"><img src="img/logo.png" class="logo" alt=""></a>
        <div class="navbar-container">
            <ul id="navbar">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag"><a href="cart.php" class="cart-icon"><i class="fa fa-bag-shopping"></i><span class="cart-item-count"></span></a></li>
                <li id="menu"><button class="menuBtn"><i class="fa fa-bars"></i></button></li>
                <i class="fa fa-times" id="close"></i>
            </ul>
            <div id="dropdown-menu">
                <?php if (empty($name)): ?>
                    <button class="signup">Sign Up</button>
                <?php else: ?>
                    <span class="welcome-message">Welcome, <?= $name; ?></span>
                    <a href="logout.php">Logout</a>
                <?php endif; ?>
                <a href="#">My Wishlist</a>
                <a href="#">My Orders</a>
            </div>
        </div>
        <div id="mobile">
            <div><a href="cart.php" class="cart-icon"><i class="fa-solid fa-shopping-bag"></i><span class="cart-item-count"></span></a></div>
            <button class="menuBtn"><i class="fa fa-bars"></i></button>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <?php if (!empty($alerts)): ?>
        <div class="alert-box">
            <?php foreach ($alerts as $alert): ?>
                <div class="alert <?= $alert['type']; ?>">
                    <i class="fa-solid <?= $alert['type'] === 'success' ? 'fa-circle-check' : 'fa-circle-xmark'; ?>"></i>
                    <span><?= $alert['message']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="welcome-box <?= $show_welcome ? 'show' : '' ?>">
        <button type="button" title="Back to home" class="backBtnMsg"><i class="fa-solid fa-close"></i></button>
        <h2>Welcome to Basel's Ecommerce</h2>
        <p>Your one-stop shop for all your needs. Explore our wide range of products and enjoy a seamless shopping experience.</p>
        <a href="shop.php" class="normal">Start Shopping</a>
    </div>

    <section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save more with coupons & up to 70% off!</p>
        <a href="shop.php">Shop Now</a>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img/features/f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f2.png" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f4.png" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f5.png" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f6.png" alt="">
            <h6>F24/7 Support</h6>
        </div>
    </section>

    <section class="products section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Modern Design</p>
        <div class="pro-container"></div>
    </section>

    <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <span>70% Off</span> - All T-Shirts & Accessories</h2>
        <a href="shop.php"><button class="normal">Explore More</button></a>
    </section>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>Crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>The best classic dress is on sale at cara</span>
            <button class="white">Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>Spring/Summer</h4>
            <h2>Upcomming Season</h2>
            <span>The best classic dress is on sale at cara</span>
            <button class="white">Collection</button>
        </div>
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collection -50% OFF</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>NEW FOOTWEAR COLLECTION</h2>
            <h3>Spring / Summer 2026</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>T-SHIRTS</h2>
            <h3>New Trendy Prints</h3>
        </div>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4><?= !empty($name) ? "Thanks for logging in, " . $name : "Sign Up For Newsletters" ?></h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
        </div>
        <?php if (empty($name)): ?>
            <div class="form">
                <button class="normal signup">Sign Up</button>
            </div>
        <?php endif; ?>
    </section>

    <?php if (empty($name)): ?>
        <section id="login-registration-form">
            <div class="auth-modal-container <?= $active_form === 'register' ? 'show' : ($active_form === 'login' ? 'show' : ''); ?>">
                <div class="auth-modal <?= $active_form === 'register' ? 'show slide' : ($active_form === 'login' ? 'show' : ''); ?>">
                    <button type="button" title="Back to home" class="backBtn"><i class="fa-solid fa-close"></i></button>
                    <div class="form-box login">
                        <h2>Login</h2>
                        <form action="auth_process.php" method="POST">
                            <div class="input-box">
                                <input type="email" name="email" placeholder="Email" required>
                                <i class="fa-solid fa-envelope icons"></i>
                            </div>
                            <div class="input-box">
                                <input type="password" name="password" class="pass" maxlength="20" placeholder="Password" required>
                                <i class="fa-solid fa-lock icons"></i>
                                <i class="fa-solid fa-eye eyeBtn"></i>
                            </div>
                            <button type="submit" name="login_btn" class="btn">Login</button>
                            <p>Don't have an account? <span class="register-link">Register</span></p>
                        </form>
                    </div>

                    <div class="form-box register">
                        <h2>Register</h2>
                        <form action="auth_process.php" method="POST">
                            <div class="input-box">
                                <input type="text" name="name" autocomplete="on" placeholder="Name" required>
                                <i class="fa-solid fa-user icons"></i>
                            </div>
                            <div class="input-box">
                                <input type="text" name="address" autocomplete="on" placeholder="Address" required>
                                <i class="fa-solid fa-home icons"></i>
                            </div>
                            <div class="input-box">
                                <input type="text" name="phone" id="phone" autocomplete="on" placeholder="Phone" required>
                                <i class="fa-solid fa-phone icons"></i>
                            </div>
                            <div class="input-box">
                                <input type="email" name="email" autocomplete="on" placeholder="Email" required>
                                <i class="fa-solid fa-envelope icons"></i>
                            </div>
                            <div class="input-box">
                                <input type="password" name="password" autocomplete="off" maxlength="20" class="pass" placeholder="Password" required>
                                <i class="fa-solid fa-lock icons"></i>
                                <i class="fa-solid fa-eye eyeBtn"></i>
                            </div>
                            <button type="submit" name="register_btn" class="btn">Register</button>
                            <p>Already have an account? <span class="login-link">Login</span></p>
                        </form>
                    </div>
                </div>
        </section>
    <?php endif; ?>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="img/logo.png" alt="">
            <h4>Contact</h4>
            <p><strong>Address: </strong>El-Shabab Road, Nozhat El-Obour, Qalubia</p>
            <p><strong>Phone: </strong>+01157633830 / (+20) 01223632617</p>
            <p><strong>Hours: </strong>10:00 - 18:00, Mon - Sat</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="about.php">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="contact.php">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <?php if (empty($name)): ?>
                <span class="signup">Sign In</span>
            <?php endif; ?>
            <a href="cart.php">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>

        <div class="col pay">
            <p>Secured Payment Gatways</p>
            <img src="img/pay/pay.png" alt="">
        </div>

        <div class="copyright">
            <p>© 2026, Basel Abd Elhamid</p>
        </div>
    </footer>


    <script src="products.js"></script>
    <script src="script.js"></script>
</body>

</html>
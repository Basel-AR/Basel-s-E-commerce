<?php

session_start();

$name = $_SESSION['name'] ?? null;
$alerts = $_SESSION['alerts'] ?? [];
$discount = $_SESSION['discount'] ?? 0;
$active_form = $_SESSION['active_form'] ?? '';

// Keep persistent session vars (name, welcome_shown, etc.)
unset($_SESSION['alerts'], $_SESSION['active_form'], $_SESSION['discount']);

if ($name !== null) $_SESSION['name'] = $name;

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
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag"><a href="cart.php" class="active cart-icon"><i class="fa fa-bag-shopping"></i><span class="cart-item-count"></span></a></li>
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

    <section id="page-header" class="contact-header">
        <h2>#cart</h2>
        <p>Add your coupon code & SAVE up to 70%!</p>
    </section>

    <section id="cart" class="section-p1">
        <table width="100%">
            <thead class="cart-header">
                <tr>
                    <td>Products</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                    <td>Remove</td>
                </tr>
            </thead>
            <tbody class="cart-items"></tbody>
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Apply Coupon</h3>
            <form action="coupon.php" method="post">
                <input type="text" name="coupon" placeholder="Enter Your Coupon">
                <button type="submit" name="coupon_btn" class="normal">Apply</button>
            </form>
        </div>

        <div class="cart-total">
            <h3>Cart Totals</h3>
            <p>Subtotal <span class="subtotal">$0</span></p>
            <p>Delivery Fee <span>Free</span></p>
            <?php if ($discount > 0): ?>
                <p>Discount <span class="discount"><?= ($discount * 100) . '%'; ?></span></p>
            <?php endif; ?>
            <p>Grand Total <span class="grand-total">$0</span></p>
            <form action="checkout.php" method="post" id="checkout-form">
                <input type="hidden" name="cart_count" id="cart_count" value="0">
                <button type="submit" name="complete_checkout" class="normal">Proceed to checkout</button>
            </form>
        </div>
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

    <script src="script.js"></script>

</body>

</html>
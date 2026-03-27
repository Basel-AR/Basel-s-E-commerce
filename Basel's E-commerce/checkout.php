<?php

session_start();


// Check if user is logged in
if (!isset($_SESSION['name'])) {
    $_SESSION['alerts'][] = [
        'type' => 'error',
        'message' => 'Please login to proceed with checkout.'
    ];
    header('Location: cart.php');
    exit();
}

if (isset($_POST['complete_checkout'])) {
    $cart_count = $_POST['cart_count'] ?? 0;
    $applied_coupon = $_SESSION['applied_coupon'] ?? null;

    // Check if cart is empty
    if ($cart_count == 0 || empty($cart_count)) {
        $_SESSION['alerts'][] = [
            'type' => 'error',
            'message' => 'Your cart is empty. Please add items to your cart before checking out.'
        ];
    } else {
        // Mark coupon as used if one was applied
        if ($applied_coupon) {
            // Initialize used coupons array if it doesn't exist
            if (!isset($_SESSION['used_coupons'])) {
                $_SESSION['used_coupons'] = [];
            }

            // Add coupon to used list if not already there
            if (!in_array($applied_coupon, $_SESSION['used_coupons'])) {
                $_SESSION['used_coupons'][] = $applied_coupon;
            }

            // Clear the applied coupon from session after successful use
            unset($_SESSION['applied_coupon']);
            unset($_SESSION['discount']);

            $_SESSION['alerts'][] = [
                'type' => 'success',
                'message' => 'Order placed successfully! Coupon has been redeemed and cannot be used again.'
            ];
        } else {
            $_SESSION['alerts'][] = [
                'type' => 'success',
                'message' => 'Order placed successfully!'
            ];
        }
    }

    // Redirect back to cart
    header('Location: cart.php');
    exit();
}

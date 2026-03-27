<?php

session_start();

$coupon_codes = [
    "DISCOUNT10" => 0.10,
    "SAVE20" => 0.20,
    "BASEL30" => 0.30
];

if (isset($_POST['coupon_btn'])) {
    $coupon_code = $_POST['coupon'];
    $user_email = $_SESSION['name'] ?? null;

    if (isset($coupon_codes[$coupon_code])) {
        // Check if user is logged in
        if (!$user_email) {
            $_SESSION['alerts'][] = [
                'type' => 'error',
                'message' => 'Please login to apply coupon codes.'
            ];
            header('Location: cart.php');
            exit();
        }

        // Initialize used coupons array if it doesn't exist
        if (!isset($_SESSION['used_coupons'])) {
            $_SESSION['used_coupons'] = [];
        }

        // Check if user has already used this coupon
        if (in_array($coupon_code, $_SESSION['used_coupons'])) {
            $_SESSION['alerts'][] = [
                'type' => 'error',
                'message' => 'You have already used this coupon code. Each coupon can only be used once per account.'
            ];
            header('Location: cart.php');
            exit();
        }

        // Check if coupon was already applied in this session
        $code_repeat = isset($_SESSION['discount']) && $_SESSION['discount'] === $coupon_codes[$coupon_code];
        if ($code_repeat) {
            $_SESSION['alerts'][] = [
                'type' => 'error',
                'message' => 'This coupon is already applied to your cart.'
            ];
            header('Location: cart.php');
            exit();
        } else {
            $_SESSION['discount'] = $coupon_codes[$coupon_code];
            $_SESSION['applied_coupon'] = $coupon_code;
            $_SESSION['alerts'][] = [
                'type' => 'success',
                'message' => 'Coupon applied successfully! You get a ' . ($coupon_codes[$coupon_code] * 100) . '% discount.'
            ];
        }
    } else {
        $_SESSION['alerts'][] = [
            'type' => 'error',
            'message' => 'Invalid coupon code. Please try again.'
        ];
    }
    header('Location: cart.php');
    exit();
}

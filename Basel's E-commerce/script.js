// script for dropdown menu

const menuBtns = document.querySelectorAll('.menuBtn');
const loginBtn = document.querySelector('.signup');
const dropdown = document.getElementById('dropdown-menu');

menuBtns.forEach((menuBtn) => {
    menuBtn.addEventListener("click", () => {
        dropdown.classList.toggle('show');
        menuBtn.classList.toggle('active');
    });
    if (loginBtn) {
        loginBtn.addEventListener("click", () => {
            dropdown.classList.remove('show');
            menuBtn.classList.remove('active');
        });
    }
});

// Script for navigation bar
const bar = document.getElementById('bar');
const closebtn = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar) {
    bar.addEventListener("click", () => {
        nav.classList.add('active');
    });
}

if (closebtn) {
    closebtn.addEventListener("click", () => {
        nav.classList.remove('active');
    });
}

// script for login and register form

const authModalContainer = document.querySelector(".auth-modal-container");
const authModal = document.querySelector(".auth-modal");
const loginbtnmodals = document.querySelectorAll(".signup");
const backBtn = document.querySelector(".backBtn");
const registerlink = document.querySelector(".register-link");
const loginlink = document.querySelector(".login-link");
const eyeBtns = document.querySelectorAll(".eyeBtn");
const pass = document.querySelectorAll(".pass");
const inputBoxes = document.querySelectorAll(".input-box");


loginbtnmodals.forEach((loginbtnmodal) => {
    loginbtnmodal.addEventListener("click", () => {
        authModalContainer.classList.add("show");
        authModalContainer.style.zIndex = "100";
        authModal.classList.add("show");
    });
});

if (backBtn) {
    backBtn.addEventListener("click", function () {
        authModalContainer.classList.remove("show");
        authModalContainer.style.zIndex = "-1";
        authModal.classList.remove("show", "slide");
    });
}

if (registerlink) registerlink.addEventListener("click", () => authModal.classList.add("slide"));
if (loginlink) loginlink.addEventListener("click", () => authModal.classList.remove("slide"));

inputBoxes.forEach((inputBox) => {
    inputBox.length
});

pass.forEach((pas) => {
    eyeBtns.forEach((eyeBtn) => {
        pas.addEventListener("input", function () {
            if (pas.value != '') {
                eyeBtn.style.display = 'block';
            } else {
                eyeBtn.style.display = 'none';
            }
        });
    });
});

eyeBtns.forEach((eyeBtn) => {
    eyeBtn.addEventListener('click', function () {
        eyeBtn.classList.toggle('fa-eye');
        eyeBtn.classList.toggle('fa-eye-slash');
        pass.forEach((pas) => {
            pas.type = pas.type === 'password' ? 'text' : 'password';
        });
    });
});

// script for validation of phone number in registration form

const phoneInput = document.getElementById('phone');

if (phoneInput) {
    phoneInput.addEventListener('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
}


// Script for message box

const alertBox = document.querySelector(".alert-box");

if (alertBox) {
    setTimeout(() => alertBox.classList.add('show'), 50);

    setTimeout(() => {
        alertBox.classList.remove('show');
        setTimeout(() => alertBox.remove(), 1000);
    }, 6000);
}

// Script for login modal on cart checkout

const proceedCheckoutBtn = document.querySelector('button[name="complete_checkout"]');
const welcomeMessage = document.querySelector('.welcome-message');

if (proceedCheckoutBtn) {
    proceedCheckoutBtn.addEventListener('click', (event) => {
        // Only show login modal if user is not logged in (no welcome message)
        if (!welcomeMessage && authModalContainer && authModal) {
            event.preventDefault();
            authModalContainer.classList.add("show");
            authModalContainer.style.zIndex = "100";
            authModal.classList.add("show");
        }
        // If user is logged in, allow the form to submit normally
    });
}

// Script for welcome box

const welcomeBox = document.querySelector(".welcome-box");
const backBtnMsg = document.querySelector(".backBtnMsg");

if (backBtnMsg) {
    backBtnMsg.addEventListener("click", () => {
        welcomeBox.classList.remove("show");
        setTimeout(() => welcomeBox.style.display = "none", 500);
    });
}

// Script for products

const productContainer = document.querySelector('.pro-container');
const productDetailPageContainer = document.querySelector('.pro-container2');
const productShopContainer = document.querySelector('.pro-shop-container');
const isProductDetailPage = document.querySelector('.pro-details-container');
const isCartPage = document.getElementById('cart');



if (productContainer) {
    displayProducts();
} else if (isProductDetailPage) {
    displayProductDetail();
    // displayRecommendedProducts();
} else if (productShopContainer) {
    displayProductShop();
} else if (isCartPage) {
    displayCart();
}

function displayProducts() {
    products.forEach(product => {
        const productCard = document.createElement("div");
        productCard.classList.add("pro");
        productCard.innerHTML = `
            <img src="${product.colors[0].mainImage}" alt="">
            <div class="des">
                <h5>${product.title}</h5>
                <div class="star">${product.stars}</div>
                <h4>${product.price}</h4>
            </div>
            <a href="#"><i class="fa fa-cart-shopping cart"></i></a>
        `;

        productContainer.appendChild(productCard);

        productCard.addEventListener("click", () => {
            sessionStorage.setItem("selectedProduct", JSON.stringify(product));
            window.location.href = "product-details.php";
        });
    });
}



function displayProductDetail() {
    const productData = JSON.parse(sessionStorage.getItem("selectedProduct"));

    const titleEl = document.querySelector('#prodetails .title');
    const ratingEl = document.querySelector('.rating');
    const priceEl = document.querySelector('#prodetails .price');
    const desEl = document.querySelector('#prodetails .description');
    const mainImgContainer = document.querySelector('#prodetails .single-pro-image');
    const colorContainer = document.querySelector('#prodetails .color-options');
    const sizeContainer = document.querySelector('#prodetails .size-options');
    const addToCartBtn = document.getElementById('addToCart');

    let selectedColor = productData.colors[0];
    let selectedSize = selectedColor.sizes[0];

    function updateProductDisplay(colorData) {
        if (!colorData.sizes.includes(selectedSize)) {
            selectedSize = colorData.sizes[0];
        }

        mainImgContainer.innerHTML = `<img src="${colorData.mainImage}" width="100%">`;

        colorContainer.innerHTML = "";
        productData.colors.forEach(color => {
            const img = document.createElement("img");
            img.src = color.mainImage;
            if (color.name === colorData.name) img.classList.add("selected");

            colorContainer.appendChild(img);

            img.addEventListener("click", () => {
                selectedColor = color;
                updateProductDisplay(color);
            });
        });

        sizeContainer.innerHTML = "";
        colorData.sizes.forEach(size => {
            const btn = document.createElement("button");
            btn.textContent = size;
            if (size === selectedSize) btn.classList.add("selected");

            sizeContainer.appendChild(btn);

            btn.addEventListener("click", () => {
                document.querySelectorAll(".size-options button").forEach(el => el.classList.remove("selected"));
                btn.classList.add("selected");
                selectedSize = size;
            });
        });
    }

    titleEl.textContent = productData.title;
    ratingEl.innerHTML = `${productData.stars} ${productData.rating}`;
    priceEl.textContent = productData.price;
    desEl.textContent = productData.description;

    updateProductDisplay(selectedColor);

    addToCartBtn.addEventListener("click", () => {
        addToCart(productData, selectedColor, selectedSize);
    });
}

// function displayRecommendedProducts(){
//     products.forEach(product => {
//         if(product.id > 4){
//             const productCard = document.createElement("div");
//             productCard.classList.add("pro");
//             productCard.innerHTML = `
//                 <img src="${product.colors[0].mainImage}" alt="">
//                 <div class="des">
//                     <h5>${product.title}</h5>
//                     <div class="star">${product.stars}</div>
//                     <h4>${product.price}</h4>
//                 </div>
//                 <a href="#"><i class="fa fa-cart-shopping cart"></i></a>
//             `;

//             productDetailPageContainer.appendChild(productCard);

//             productCard.addEventListener("click", () => {
//                 sessionStorage.setItem("selectedProduct", JSON.stringify(product));
//                 window.location.href = "product-details.html";
//             });
//         }
//     });
// }

function displayProductShop() {
    products.forEach(product => {
        const productCard = document.createElement("div");
        productCard.classList.add("pro");
        productCard.innerHTML = `
            <img src="${product.colors[0].mainImage}" alt="">
            <div class="des">
                <h5>${product.title}</h5>
                <div class="star">${product.stars}</div>
                <h4>${product.price}</h4>
            </div>
            <a href="#"><i class="fa fa-cart-shopping cart"></i></a>
        `;

        productShopContainer.appendChild(productCard);

        productCard.addEventListener("click", () => {
            sessionStorage.setItem("selectedProduct", JSON.stringify(product));
            window.location.href = "product-details.php";
        });
    });
}

function addToCart(product, color, size) {
    let cart = JSON.parse(sessionStorage.getItem("cart")) || [];
    // const proCount = document.getElementById("proCount");
    // proCount.addEventListener("change", function(){
    //     let cart = JSON.parse(sessionStorage.getItem("cart")) || [];
    //     const index = this.getAttribute("data-index");
    //     cart[index].quantity = parseInt(this.value);
    //     sessionStorage.setItem("cart", JSON.stringify(cart));
    //     displayCart();
    //     updateCartBadge(); 
    // });

    const existingItem = cart.find(item => item.id === product.id && item.color === color.name && item.size === size);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            id: product.id,
            title: product.title,
            price: product.price,
            image: color.mainImage,
            color: color.name,
            size: size,
            quantity: 1,
        })
    }

    sessionStorage.setItem("cart", JSON.stringify(cart));

    updateCartBadge();
}

function displayCart() {
    const cart = JSON.parse(sessionStorage.getItem("cart") || null);

    const cartItemContainer = document.querySelector(".cart-items");
    const subtotalEl = document.querySelector(".subtotal");
    const grandTotalEl = document.querySelector(".grand-total");
    const cartCountInput = document.getElementById("cart_count");

    cartItemContainer.innerHTML = "";

    if (cart === null || cart.length === 0) {
        cartItemContainer.innerHTML = "<p>Your cart is empty.</p>";
        subtotalEl.textContent = "$0";
        grandTotalEl.textContent = "$0";
        if (cartCountInput) {
            cartCountInput.value = "0";
        }
        return;
    }

    // Set cart count for checkout validation
    if (cartCountInput) {
        cartCountInput.value = cart.length;
    }

    let subtotal = 0;
    let grandTotal = 0;

    cart.forEach((item, index) => {
        const itemTotal = parseFloat(item.price.replace("$", "")) * item.quantity;
        const discount = document.querySelector(".discount") ? parseFloat(document.querySelector(".discount").textContent.replace("%", "")) / 100 : 0;
        const discountedTotal = itemTotal * (1 - discount);
        subtotal += itemTotal;
        grandTotal += discountedTotal;

        const cartItem = document.createElement("tr");
        cartItem.classList.add("cart-item");
        cartItem.innerHTML = `
            <td class="product">
                <img src="${item.image}">
                <div class="item-detail">
                    <p>${item.title}</p>
                    <div class="size-color-box">
                        <span class="size">${item.size}</span>
                        <span class="color">${item.color}</span>
                    </div>
                </div>
            </td>
            <td class="price"><span>${item.price}</span></td>
            <td class="quantity"><input type="number" value="${item.quantity}" min="1" data-index="${index}"></td>
            <td class="total-price"><span>$${itemTotal}</span></td>
            <td><button class="remove" data-index="${index}"><i class="fa fa-close"></i></button></td>
        `;

        cartItemContainer.appendChild(cartItem);
    });

    subtotalEl.textContent = `$${subtotal.toFixed(2)}`;
    grandTotalEl.textContent = `$${grandTotal.toFixed(2)}`;

    removeCartItem();
    updateCartQuantity();
}

function removeCartItem() {
    document.querySelectorAll(".remove").forEach(button => {
        button.addEventListener("click", function () {
            let cart = JSON.parse(sessionStorage.getItem("cart")) || [];
            const index = this.getAttribute("data-index");
            cart.splice(index, 1);
            sessionStorage.setItem("cart", JSON.stringify(cart));
            displayCart();
            updateCartBadge();
        });
    });
}

function updateCartQuantity() {
    document.querySelectorAll(".quantity input").forEach(input => {
        input.addEventListener("change", function () {
            let cart = JSON.parse(sessionStorage.getItem("cart")) || [];
            const index = this.getAttribute("data-index");
            cart[index].quantity = parseInt(this.value);
            sessionStorage.setItem("cart", JSON.stringify(cart));
            displayCart();
            updateCartBadge();
        });
    });
}

function updateCartBadge() {
    const cart = JSON.parse(sessionStorage.getItem("cart")) || [];
    const cartCount = cart.reduce((total, item) => total + item.quantity, 0);
    const badges = document.querySelectorAll(".cart-item-count");

    badges.forEach(badge => {
        if (badge) {
            if (cartCount > 0) {
                badge.textContent = cartCount;
                badge.style.display = "block";
            } else {
                badge.style.display = "none";
            }
        }
    });
}

updateCartBadge();
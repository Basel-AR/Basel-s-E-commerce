const products = [
    {
        id: 1,
        title: "Flowers T-Shirt",
        price: "$75",
        stars: `<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>`,
        rating: "(4.8)",
        description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi, aperiam odit ex explicabo earum alias, natus dicta officiis ipsa, ratione libero inventore beatae dolorem provident nostrum ipsum fugit perspiciatis maxime",
        colors: [
            {
                name: "Orange Flowers",
                mainImage: "img/products/f1.jpg",
                thumnails: [],
                sizes: ["S", "M", "L", "XL", "XXL"]
            },
            {
                name: "White Flowers",
                mainImage: "img/products/f2.jpg",
                thumnails: [],
                sizes: ["S", "M", "L", "XL", "XXL"]
            },
            {
                name: "Red Flowers",
                mainImage: "img/products/f3.jpg",
                thumnails: [],
                sizes: ["S", "M", "L", "XL", "XXL"]
            },
            {
                name: "Pink Flowers",
                mainImage: "img/products/f4.jpg",
                thumnails: [],
                sizes: ["S", "M", "L", "XL", "XXL"]
            },
            {
                name: "Violet Flowers",
                mainImage: "img/products/f5.jpg",
                thumnails: [],
                sizes: ["S", "M", "L", "XL", "XXL"]
            },
        ]
    },
    {
        id: 2,
        title: "Orange and Blue T-Shirt",
        price: "$100",
        stars: `<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>`,
        rating: "(5.0)",
        description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi, aperiam odit ex explicabo earum alias, natus dicta officiis ipsa, ratione libero inventore beatae dolorem provident nostrum ipsum fugit perspiciatis maxime?",
        colors: [
            {
                name: "Orange and Blue",
                mainImage: "img/products/f6.jpg",
                thumnails: [],
                sizes: ["S", "M", "L", "XL", "XXL"]
            }
        ]
    },
    {
        id: 3,
        title: "Silk Women Pant",
        price: "$105",
        stars: `<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>`,
        rating: "(5.0)",
        description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi, aperiam odit ex explicabo earum alias, natus dicta officiis ipsa, ratione libero inventore beatae dolorem provident nostrum ipsum fugit perspiciatis maxime?",
        colors: [
            {
                name: "Beigue",
                mainImage: "img/products/f7.jpg",
                thumnails: [],
                sizes: ["M", "L", "XL"]
            }
        ]
    },
    {
        id: 4,
        title: "Cats Women Shirt",
        price: "$105",
        stars: `<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>`,
        rating: "(4.0)",
        description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi, aperiam odit ex explicabo earum alias, natus dicta officiis ipsa, ratione libero inventore beatae dolorem provident nostrum ipsum fugit perspiciatis maxime?",
        colors: [
            {
                name: "Violet",
                mainImage: "img/products/f8.jpg",
                thumnails: [],
                sizes: ["M", "L", "XL"]
            }
        ]
    },
    {
        id: 5,
        title: "Classic T-Shirt",
        price: "$50",
        stars: `<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>`,
        rating: "(4.8)",
        description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi, aperiam odit ex explicabo earum alias, natus dicta officiis ipsa, ratione libero inventore beatae dolorem provident nostrum ipsum fugit perspiciatis maxime?",
        colors: [
            {
                name: "Light Blue",
                mainImage: "img/products/n1.jpg",
                thumnails: [],
                sizes: ["S", "M", "L", "XL", "XXL"]
            },
            {
                name: "Blue Squars",
                mainImage: "img/products/n2.jpg",
                thumnails: [],
                sizes: ["S", "M", "L", "XL", "XXL"]
            },
            {
                name: "White",
                mainImage: "img/products/n3.jpg",
                thumnails: [],
                sizes: ["S", "M", "L", "XL", "XXL"]
            },
            {
                name: "Light Brown",
                mainImage: "img/products/n7.jpg",
                thumnails: [],
                sizes: ["S", "M", "L", "XL", "XXL"]
            },
        ]
    },
    {
        id: 6,
        title: "Classic Half T-Shirt",
        price: "$60",
        stars: `<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>`,
        rating: "(5.0)",
        description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi, aperiam odit ex explicabo earum alias, natus dicta officiis ipsa, ratione libero inventore beatae dolorem provident nostrum ipsum fugit perspiciatis maxime?",
        colors: [
            {
                name: "G-st",
                mainImage: "img/products/n4.jpg",
                thumnails: [],
                sizes: ["S", "M", "L", "XL", "XXL"]
            },
            {
                name: "Black",
                mainImage: "img/products/n8.jpg",
                thumnails: [],
                sizes: ["S", "M", "L", "XL", "XXL"]
            }
        ]
    },
    {
        id: 7,
        title: "Jeans T-Shirt",
        price: "$120",
        stars: `<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>`,
        rating: "(5.0)",
        description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi, aperiam odit ex explicabo earum alias, natus dicta officiis ipsa, ratione libero inventore beatae dolorem provident nostrum ipsum fugit perspiciatis maxime?",
        colors: [
            {
                name: "Blue Jean",
                mainImage: "img/products/n5.jpg",
                thumnails: [],
                sizes: ["S", "M", "L", "XL", "XXL"]
            }
        ]
    },
    {
        id: 8,
        title: "Short Pant",
        price: "$70",
        stars: `<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>`,
        rating: "(4.0)",
        description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi, aperiam odit ex explicabo earum alias, natus dicta officiis ipsa, ratione libero inventore beatae dolorem provident nostrum ipsum fugit perspiciatis maxime?",
        colors: [
            {
                name: "Light Gray",
                mainImage: "img/products/n6.jpg",
                thumnails: [],
                sizes: ["M", "L", "XL"]
            }
        ]
    },
]
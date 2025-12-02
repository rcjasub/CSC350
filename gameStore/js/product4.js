/* 
  Author: Jocsan Rodriguez
  Date: November 16 2025
  Class: Web Programming
*/

const products = [
    {
        title: "Tekken 8",
        description: "Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.",
        price: 49.99,
        image: "images/t8.jpeg",
        alt: "Tekken 8"
    },
    {
        title: "Street Fighter 6",
        description: "Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.",
        price: 49.99,
        image: "images/sf6.jpeg",
        alt: "Street Fighter 6"
    },
    {
        title: "Mortal Kombat x",
        description: "Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.",
        price: 49.99,
        image: "images/mkx.jpeg",
        alt: "Mortal Kombat x"
    },
    {
        title: "Super Smash Bros Ultimate",
        description: "Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.",
        price: 49.99,
        image: "images/super.jpeg",
        alt: "Super Smash Bros Ultimate"
    },
    {
        title: "DragonBall Fighter Z",
        description: "Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.",
        price: 49.99,
        image: "images/dbzf.jpeg",
        alt: "DragonBall Fighter Z"
    },
    {
        title: "Virtual Fighter 5",
        description: "Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.",
        price: 49.99,
        image: "images/vf.jpeg",
        alt: "Virtual Fighter 5"
    },
    {
        title: "Killer Instinct",
        description: "Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.",
        price: 49.99,
        image: "images/killerIn.jpeg",
        alt: "Killer Instinct"
    },
    {
        title: "Marvel vs Capcom",
        description: "Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.",
        price: 49.99,
        image: "images/mvc.jpeg",
        alt: "Marvel vs Capcom"
    },
    {
        title: "Guilty Gear Strive",
        description: "Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.",
        price: 49.99,
        image: "images/guilty-gear-strive.jpeg",
        alt: "Guilty Gear Strive"
    },
    {
        title: "King OF Fighter",
        description: "Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.",
        price: 49.99,
        image: "images/KingOF.jpeg",
        alt: "King OF Fighter"
    },
    {
        title: "Soul Caliver VI",
        description: "Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.",
        price: 49.99,
        image: "images/sc6.jpeg",
        alt: "Soul Caliver VI"
    },
    {
        title: "Dead OR Alive 6",
        description: "Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.",
        price: 49.99,
        image: "images/DOR.jepg.webp",
        alt: "Dead OR Alive 6"
    }
];

const container = document.getElementById('product-container');

products.forEach(product => {
    const col = document.createElement("div");
    col.className = "col-md-3 col-sm-6";

    col.innerHTML = `
        <div class="shopingCard">
            <img src="${product.image}" alt="${product.alt}" />
            <div class="card-body d-flex flex-column justify-content-between">
                <div>
                    <h5 class="card-title">${product.title}</h5>
                    <p class="card-text">${product.description}</p>
                </div>
                <div class="d-flex justify-content-start align-items-center mt-2">
                    <p class="price mb-0 me-3">$${product.price.toFixed(2)}</p>
                    <button class="no-style add-to-cart-btn">Add to Cart</button>
                </div>
            </div>
        </div>
    `;

    container.appendChild(col);

    // find the button inside this card
    const button = col.querySelector(".add-to-cart-btn");

    // Add to cart on click (uses cart + updateCartCount from cart.js)
    col.querySelector(".add-to-cart-btn").addEventListener("click", () => {

        //check if cart has already has item in the cart 
        const exists = cart.some(item => item.title === product.title);

        if (exists) {
            alert(`${product.title} is already in your cart.`);
            return; // stop here, don't add another copy
        }

        //else 
        cart.push(product);
        localStorage.setItem("cart", JSON.stringify(cart));
        updateCartCount();
        console.log(cart);
        alert(`${product.title} added to cart!`);
    });
});

/* 
  Author: Jocsan Rodriguez
  Date: November 16 2025
  Class: Web Programming
*/

const products = [
    {
        title: "Final Fantasy 7",
        description: "A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.",
        price: 49.99,
        image: "images/FF7.jpeg",
        alt: "Nier Automata"
    },
    {
        title: "Persona 3",
        description: "A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.",
        price: 49.99,
        image: "images/pr3.jpeg",
        alt: "Persona 3"
    },
    {
        title: "Metaphor Refantazio",
        description: "A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.",
        price: 49.99,
        image: "images/metaphor.jpeg",
        alt: "Metaphor Refantazio"
    },
    {
        title: "Dark Souls 3",
        description: "A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.",
        price: 49.99,
        image: "images/ds3.jpeg",
        alt: "Dark Souls 3"
    },
    {
        title: "Final Fantasy 13",
        description: "A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.",
        price: 49.99,
        image: "images/ff13.jpeg",
        alt: "Final Fantasy 13"
    },
    {
        title: "Bloodborne",
        description: "A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.",
        price: 49.99,
        image: "images/bloodborne.jpeg",
        alt: "Bloodborne"
    },
    {
        title: "Cyberpunk2077",
        description: "A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.",
        price: 49.99,
        image: "images/cyberpunk2077.jpeg",
        alt: "Cyberpunk2077"
    },
    {
        title: "Expedition 33",
        description: "A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.",
        price: 49.99,
        image: "images/expidition33.jpeg",
        alt: "Expedition 33"
    },
    {
        title: "Fallout New Vegas",
        description: "A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.",
        price: 49.99,
        image: "images/falloutNewVegas.jpeg",
        alt: "Fallout New Vegas"
    },
    {
        title: "Elden Ring",
        description: "A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.",
        price: 49.99,
        image: "images/EldenRing.jpeg",
        alt: "Elden Ring"
    },
    {
        title: "Persona 5",
        description: "A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.",
        price: 49.99,
        image: "images/p5.jpeg",
        alt: "Persona 5"
    },
    {
        title: "Disco Elysium",
        description: "A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.",
        price: 49.99,
        image: "images/disco.jpeg",
        alt: "Disco Elysium"
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

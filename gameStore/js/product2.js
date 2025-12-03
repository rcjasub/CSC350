/* 
  Author: Jocsan Rodriguez
  Date: November 16 2025
  Class: Web Programming
*/

const products = [
    {
        title: "Resident Evil 4",
        description: "Action-packed RPG with deep storytelling and stylish combat.",
        price: 49.99,
        image: "images/re4.jpeg",
        alt: "Resident Evil 4"
    },
    {
        title: "Silent Hill 2",
        description: "Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.",
        price: 49.99,
        image: "images/sh2.jpeg",
        alt: "Silent Hill 2"
    },
    {
        title: "Dead Space 2",
        description: "Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.",
        price: 49.99,
        image: "images/deadSpace2.jpeg",
        alt: "Dead Space 2"
    },
    {
        title: "Fatal Frame 3",
        description: "Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.",
        price: 49.99,
        image: "images/ff3.jpeg",
        alt: "Fatal Frame 3"
    },
    {
        title: "Alien Isolation",
        description: "Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.",
        price: 49.99,
        image: "images/alien.jpeg",
        alt: "Alien Isolation"
    },
    {
        title: "The Evil Within",
        description: "Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.",
        price: 49.99,
        image: "images/evw.jpeg",
        alt: "The Evil Within"
    },
    {
        title: "Alan Wake 2",
        description: "Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.",
        price: 49.99,
        image: "images/AlanWake2.jpeg",
        alt: "Alan Wake 2"
    },
    {
        title: "Chronos",
        description: "Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.",
        price: 49.99,
        image: "images/chronos.jpeg",
        alt: "Chronos"
    },
    {
        title: "OUTLAST",
        description: "Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.",
        price: 49.99,
        image: "images/outLast.jpeg",
        alt: "OUTLAST"
    },
    {
        title: "Resident Evil 7",
        description: "Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.",
        price: 49.99,
        image: "images/re7.jpeg",
        alt: "Resident Evil 7"
    },
    {
        title: "Until Dawn",
        description: "Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.",
        price: 49.99,
        image: "images/UntilDawn.jpeg",
        alt: "Until Dawn"
    },
    {
        title: "Silent Hill F",
        description: "Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.",
        price: 49.99,
        image: "images/shf.jpeg",
        alt: "Silent Hill F"
    }
];

//select the container element where products will be displayed
const container = document.getElementById('product-container');

//product represent current object in each iteration
products.forEach(product => {
    const col = document.createElement("div");
    //bootstrap css
    col.className = "col-md-3 col-sm6";

    // Using a template literal to insert JS values dynamically into the HTML
    // Fill column with this html card and the currents product's data
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

    //adds another div
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


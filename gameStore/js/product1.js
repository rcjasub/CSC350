/* 
  Author: Jocsan Rodriguez
  Date: November 16 2025
  Class: Web Programming
*/

const products = [
    {
        title: "Nier Automata",
        image: "images/Nier.jpeg",
        alt: "Nier Automata cover",
        description: "Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.",
        price: 34.30
    },
    {
        title: "Ninja Gaiden 4",
        image: "images/ninjaG4.jpeg",
        alt: "Ninja Gaiden 4",
        description: "Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.",
        price: 34.30
    },
    {
        title: "BattleField 1",
        image: "images/bf1.jpeg",
        alt: "BattleField 1",
        description: "Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.",
        price: 34.30
    },
    {
        title: "Devil May Cry 3",
        image: "images/dmc3.jpeg",
        alt: "Devil May Cry 3",
        description: "Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.",
        price: 34.30
    },
    {
        title: "Bayoneta 1",
        image: "images/bay.jpeg",
        alt: "Bayoneta 1",
        description: "Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.",
        price: 34.30
    },
    {
        title: "Metal Gear Rising",
        image: "images/mg3R.jpeg",
        alt: "Metal Gear Rising",
        description: "Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.",
        price: 34.30
    },
    {
        title: "God of war",
        image: "images/gow.jpeg",
        alt: "God of war",
        description: "Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.",
        price: 34.30
    },
    {
        title: "Hades",
        image: "images/hades.jpeg",
        alt: "Hades",
        description: "Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.",
        price: 34.30
    },
    {
        title: "Batman Arkham Asylum",
        image: "images/batA.jpeg",
        alt: "Batman Arkham Asylum",
        description: "Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.",
        price: 34.30
    },
    {
        title: "Doom Eternal",
        image: "images/DoomE.jpeg",
        alt: "Doom Eternal",
        description: "Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.",
        price: 34.30
    },
    {
        title: "Final Fantasy 16",
        image: "images/ff16.jpeg",
        alt: "Final Fantasy 16",
        description: "Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.",
        price: 34.30
    },
    {
        title: "Sekiro shadow die twice",
        image: "images/seki.jpeg",
        alt: "Sekiro",
        description: "Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.",
        price: 34.30
    }
];


//select the container element where products will be displayed
const container = document.getElementById('product-container');

//product represent current object in each iteration
products.forEach(product => {
    //create a div element for each product
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

        //use the some method to return flase/true iterate 
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


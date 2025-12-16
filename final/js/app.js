// // EXAMPLE: NYC Open Data API (Replace on exam day)
// const BASE_URL = "https://data.cityofnewyork.us/resource/erm2-nwe9.json";

// // Retrieve 5000 records (NYC uses $limit and $offset)
// const LIMIT = 5000;
// const url = `${BASE_URL}?$limit=${LIMIT}`;

// fetch(url)
//   .then(response => response.json())
//   .then(data => {
//     console.log(data.data);
//     const tbody = document.querySelector("#dataTable tbody");

//     data.forEach(item => {
//       const row = document.createElement("tr");

//       row.innerHTML = `
//         <td>${item.unique_key || "N/A"}</td>
//         <td>${item.complaint_type || "N/A"}</td>
//         <td>${item.descriptor || "N/A"}</td>
//         <td>${item.created_date || "N/A"}</td>
//       `;

//       tbody.appendChild(row);
//     });

//     // Initialize DataTable AFTER data loads
//     $('#dataTable').DataTable();
//   })
//   .catch(error => console.error("Error fetching data:", error));

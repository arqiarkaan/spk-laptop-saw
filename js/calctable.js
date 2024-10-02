// Give top 3 rank a color in the recommendation table start
// document.addEventListener("DOMContentLoaded", () => {
//   const rows = document.querySelectorAll("#recommendTable tbody tr");
//   console.log(rows); // Debugging output
//   rows.forEach((row) => {
//     const rankCell = row.querySelector("td:nth-child(1)");
//     console.log(rankCell); // Debugging output
//     if (rankCell) {
//       switch (rankCell.textContent.trim()) {
//         case "1":
//           rankCell.classList.add("color1");
//           break;
//         case "2":
//           rankCell.classList.add("color2");
//           break;
//         case "3":
//           rankCell.classList.add("color3");
//           break;
//       }
//     }
//   });
// });
// Give top 3 rank a color in the recommendation table ends

// All datatables start
$(document).ready(function () {
  $("#recommendTable").DataTable({});
});

$(document).ready(function () {
  $("#gradeTable").DataTable({});
});

$(document).ready(function () {
  $("#normalizationTable").DataTable({});
});

$(document).ready(function () {
  $("#preferenceTable").DataTable({});
});
// All datatables ends

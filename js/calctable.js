// Give top 3 rank a color in the recommendation table start
document.addEventListener("DOMContentLoaded", () => {
  const rows = document.querySelectorAll("#recommendTable tr");
  rows.forEach((row) => {
    const cell = row.querySelector("td");
    if (cell) {
      switch (cell.textContent.trim()) {
        case "1":
          cell.classList.add("color1");
          break;
        case "2":
          cell.classList.add("color2");
          break;
        case "3":
          cell.classList.add("color3");
          break;
      }
    }
  });
});
// Give top 3 rank a color in the recommendation table ends

// All datatables start
$(document).ready(function () {
  $("#recommendTable").DataTable({
    order: [[0, "asc"]],
  });
});

$(document).ready(function () {
  $("#gradeTable").DataTable({
    order: [[0, "asc"]],
  });
});

$(document).ready(function () {
  $("#normalizationTable").DataTable({
    order: [[0, "asc"]],
  });
});

$(document).ready(function () {
  $("#preferenceTable").DataTable({
    order: [[0, "asc"]],
  });
});
// All datatables ends

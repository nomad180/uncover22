<!--Accordion begin-->
<script>
const accordions = document.querySelectorAll(".accordion");
let openAccordion = null; // Track the currently open accordion

document.addEventListener("click", (event) => {
  const target = event.target;

  // Check if the clicked element is an accordion
  if (target.classList.contains("accordion")) {
    const panel = target.nextElementSibling;

    // Check if the clicked accordion is the currently open one
    if (target === openAccordion) {
      target.classList.remove("active");
      panel.style.display = "none";
      openAccordion = null; // No open accordion
    } else {
      // Close the currently open accordion (if any)
      if (openAccordion) {
        openAccordion.classList.remove("active");
        openAccordion.nextElementSibling.style.display = "none";
      }

      // Open the clicked accordion
      target.classList.add("active");
      panel.style.display = "block";
      openAccordion = target; // Update the open accordion
    }
  }
});
</script>

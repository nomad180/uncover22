<!--Accordion begin-->
<script>
const accordions = document.querySelectorAll(".accordion");

accordions.forEach(accordion => {
  accordion.addEventListener("click", () => {
    accordion.classList.toggle("active");
    const panel = accordion.nextElementSibling;

    if (panel.style.display === "none" || panel.style.display === "") {
      panel.style.display = "block";
    } else {
      panel.style.display = "none";
    }

    accordions.forEach(otherAccordion => {
      if (otherAccordion !== accordion) {
        otherAccordion.classList.remove("active");
        otherAccordion.nextElementSibling.style.display = "none";
      }
    });
  });
});
</script>

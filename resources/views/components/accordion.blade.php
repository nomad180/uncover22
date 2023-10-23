<!--Accordion begin-->
<script>
var acc = document.getElementsByClassName("accordion");

for (let i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    for (j = 0; j < acc.length; j++) {
        acc[j].classList.remove("active");
      if (j !== i)
        acc[j].nextElementSibling.style.display = "none";
    }
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
<!--Accordion end-->

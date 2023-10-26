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
<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/bfa28f3d091acf6cc4a310cf2/138c5e8294bf0591d2fe2d284.js");</script>

<modal id="modal" name="webinar-reg" height="auto" :scrollable="true">
<script>
    function myFunction(x) {
        if (x.matches) {
            document.getElementById("modal").setAttribute("width", "80%");
      } else {
            document.getElementById("modal").setAttribute("width", "40%");
      }
    }
    var x = window.matchMedia("(max-width: 768px)")
    myFunction(x) // Call listener function at run time
    x.addListen
</script>
    <form class="p-6 pt-2 font-serif pin-none" action="https://aeonianhealthandfitness.us18.list-manage.com/subscribe/post" method="POST">
        <input type="hidden" name="u" value="bfa28f3d091acf6cc4a310cf2">
        <input type="hidden" name="id" value="acb64ae5b2">
        {{ csrf_field() }}
        <div class="mb-4">
            <p class="text-center text-2xl text-primary font-bold">Enter your email address below to access the webinar.</p>
        </div>
        <!--<div class="mb-4">
            <label for="firstname" class="block uppercase tracking-wide mb-2 font-bold text-primary">First Name</label>
            <input type="text"class="p-2 w-full border-2 border-primary" name="firstname" id="firstname" required>
        </div>
        <div class="mb-4">
            <label for="lastname" class="block uppercase tracking-wide mb-2 font-bold text-primary">Last Name</label>
            <input type="text"class="p-2 w-full border-2 border-primary" name="lastname" id="lastname" required>
        </div>-->
        <div class="mb-6">
            <label for="email" class="block uppercase tracking-wide mb-2 font-bold text-primary">Email</label>
            <input type="email" class="p-2 w-full border-2 border-primary" name="MERGE0" id="MERGE0" autocomplete="email" required>
        </div>
        <div class="text-center flex -mx-4">
            <button type="button" class="flex-1 mx-4 border-2 border-border p-2 bg-secondary text-white rounded-full uppercase" @click="$modal.hide('webinar-reg')">Cancel</button>
            <button type="submit" class="flex-1 mx-4 border-2 border-border p-2 bg-secondary text-white rounded-full uppercase">Register</button>
        </div>
    </form>
</modal>


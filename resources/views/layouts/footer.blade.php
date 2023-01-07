<footer class="bg-gray-50 border border-t-secondary/20 text-center pb-6 ">
    <!--<h5 class="text-3xl">Want us to email you occasionally with the latest Uncover Your Fit news?</h5>
    <div class="mt-10">
        <div class="relative inline-block mx-auto lg:bg-white rounded-full border border-secondary">
            <form method="POST" action="/newsletter" class="flex text-sm">
                @csrf
                <div class="py-3 px-5 flex items-center">
                    <label for="email" class="hidden lg:inline-block px-4">
                        <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                    </label>
                    <input name="email" id="email" type="text" placeholder="Your email address"
                       class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                </div>
                <button type="submit"
                        class="transition-colors duration-300 bg-secondary hover:bg-primary mt-4 mx-4 my-4 ml-3 rounded-full text-xs font-semibold text-white py-2 px-8"
                >
                    Subscribe
                </button>
            </form>
        </div>
    </div>-->
    <div class="legal space-y-2 mt-10">
        <div class="flex justify-center"><a href="https://www.youtube.com/channel/UC21zc6VKI4nkTqSVGJj3XhA" class="w-20" target="blank"><img class="mr-2" src="/images/yt_logo_rgb_light.png" alt="YouTube icon" ></a></div>
        <div>&copy; <?php echo date("Y") ?> Uncover Your Fit</div>
        <div><a href="/privacy">Privacy Policy</a></div>
        <div><a href="/terms">Terms of Use</a></div>
    </div>
</footer>
</section>
<x-flash-success />
<x-flash-error />
<x-flash-email-error />
</body>
</html>

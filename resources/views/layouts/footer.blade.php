<footer class="bg-neutral-50 border border-t-zinc-300 text-center pb-6 ">
    <h5 class="text-3xl mt-10 handwriting6 px-10">Want us to email you occasionally with the latest Uncover Your Fit news?</h5>
    <div class="mt-10">
        <div class="relative inline-block mx-auto lg:bg-white rounded-full border border-secondary">
            <form method="POST" action="/newsletter" class="flex text-sm ">
                @csrf
                <div class="py-3 px-5 flex items-center mt-4">
                    <label for="email" class="hidden lg:inline-block px-4">
                        <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                    </label>
                    <input name="email" id="email" type="text" placeholder="Your email address"
                       class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                </div>
                <button type="submit"
                        class="border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white rounded-full text-center mt-4 mx-4 ml-3 text-xl py-2 px-4"
                >
                    Subscribe
                </button>
            </form>
        </div>
    </div>
    <div class="legal space-y-2 mt-6 flex flex-col justify-center items-center">
        <div class="flex justify-between w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 2xl:w-1/6 mb-2">
             <a href="https://www.facebook.com/profile.php?id=61556091502304" class="w-14 flex text-center px-2" target="blank"><img src="/images/facebook3.png" alt="Facebook icon" ></a>
            <a href="https://www.youtube.com/channel/UC21zc6VKI4nkTqSVGJj3XhA" class="w-14 flex text-center px-2" target="blank"><img src="/images/ytlogonew.png" alt="YouTube icon" ></a>
            <a href="https://twitter.com/uncoveryourfit" class="w-14 flex text-center px-2" target="blank"><img src="/images/twitterx.png" alt="X icon" icon" ></a>
            <a href="https://www.instagram.com/uncoveryourfit/" class="w-14 flex text-center px-2" target="blank"><img src="/images/Instagram_Glyph_Gradient.png" alt="Instagram icon" icon" ></a>
            <a href="https://www.tiktok.com/@uncoveryourfit" class="w-14 flex text-center px-2" target="blank"><img src="/images/TikTok.png" alt="Instagram icon" icon" ></a>
        </div>
        <div>&copy; <?php echo date("Y") ?> Uncover Your Fit</div>
        <div><a class="text-black no-underline" href="/tdee">TDEE Calculator</a></div>
        <div><a class="text-black no-underline" href="https://uncoveryourfit.buzzsprout.com/" target="blank">Podcast</a></div>
        <div><a class="text-black no-underline" href="/privacy">Privacy Policy</a></div>
        <div><a class="text-black no-underline" href="/terms">Terms of Use</a></div>
    </div>
</footer>
</section>
<x-flash-success />
<x-flash-error />
<x-flash-email-error />
</body>
</html>

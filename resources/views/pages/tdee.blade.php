@section('title'){{'TDEE Calculator | Uncover Your Fit'}}@endsection
@section('description'){{'Use the Total Daily Energy Expenditure (TDEE) calculator to determine how many calories you burn per day based on your age, physical characteristics, and activity level.'}}@endsection
@section('author'){{'Damon Leach'}}@endsection
<x-layout>
    <div class="relative">
        <div class="border-b border-zinc-300"><img src="/images/tdee4.jpg" alt="Picture of Damon Leach with the text life is a journey you only get to make once. Let's make your journey a great one." width="100%"></div>
        <div class="absolute inset-y-0 inset-x-8 md:inset-x-10 lg:inset-x-12 xl:inset-x-14 2xl:inset-x-16 w-11/12 flex justify-center flex-col">
            <h1 class="text-3xl leading-tight md:text-5xl md:leading-tight lg:text-6xl lg:leading-tight xl:text-7xl xl:leading-tight 2xl:text-8xl 2xl:leading-tight handwriting6 flex justify-center text-white text-center">TDEE Calculator</h1>
            <h2 class="lg:text-xl font-medium text-white text-center">Learn how many calories you burn every day with our Total Daily Energy Expenditure (TDEE) calculator</h2>
        </div>
    </div>
    <div class="flex flex-col lg:flex-row px-4 lg:px-16 xl:px-32 mt-8">
            <div class="lg:w-5/6">
                <div>
                    <h2 class="text-5xl 2xl:text-7xl text-center handwriting6">What's your TDEE?</h2>
                </div>
                <div class="flex flex-col lg:flex-row pages mt-8">
                    <div class="lg:w-1/2 md:mr-4">
                        <p>Your Total Daily Energy Expenditure (TDEE) is like a recipe with two essential ingredients: your Basal Metabolic Rate (BMR) and an activity multiplier.</p>
                        <p>Think of your BMR as the energy your body expends while lounging on the couch, watching Netflix. But life isn't just couch time, right? So, we need to sprinkle in some extra calories to account for your daily activities, even if you're not doing extreme sports.</p>
                        <p>Our TDEE calculator is like a master chef. It combines the finest formulas to give you a TDEE that's not just a number but a clear, meaningful insight into your daily calorie needs.</p>
                    </div>
                    <div class="lg:w-1/2 flex justify-center border-2 border-zinc-300 shadow-lg shadow-zinc-400 rounded-xl p-4">
                        <form method="POST" action="/tdee">
                            @csrf
                            <div class="mt-4">
                                <label for="gender">Gender:</label>
                                <input type="radio" name="gender" value="male" id="male" required {{ old('gender') == 'male' ? 'checked' : '' }}>
                                <label for="male">Male</label>
                                <input type="radio" name="gender" value="female" id="female" required {{ old('gender') == 'female' ? 'checked' : '' }}>
                                <label for="female">Female</label><br>
                            </div>
                            <div class="mt-4">
                                <label for="age">Age:</label>
                                <input class="w-2/12 text-center border rounded-xl" type="number" name="age" id="age" required value="{{ old('age') }}"><br>
                            </div>
                            <div class="mt-4">
                                <label for="weight">Weight (lbs):</label>
                                <input class="w-2/12 text-center border rounded-xl" type="number" name="weight" id="weight" required value="{{ old('weight') }}"><br>
                            </div>
                            <div class="mt-4">
                                <label for="height">Height:</label>
                                <select class="border rounded-xl" name="height" required>
                                    @for ($feet = 4; $feet <= 7; $feet++)
                                        @for ($inches = 0; $inches <= 11; $inches++)
                                            <option value="{{ $feet * 12 + $inches }}" {{ old('height', 69) == ($feet * 12 + $inches) ? 'selected' : '' }}>
                                                {{ $feet }} feet {{ $inches }} inches
                                            </option>
                                        @endfor
                                    @endfor
                                </select><br>
                            </div>
                            <div class="mt-4">
                                <label for="activity_level">Activity Level:</label>
                                <select class="border rounded-xl" name="activity_level" id="activity_level" required value="{{ old('activity_level') }}">
                                    <option value="sedentary" {{ old('activity_level') == 'sedentary' ? 'selected' : '' }}>Sedentary (Office Job)</option>
                                    <option value="lightly_active" {{ old('activity_level') == 'lightly_active' ? 'selected' : '' }}>Light Exercise (1-2 Days/Week)</option>
                                    <option value="moderately_active" {{ old('activity_level') == 'moderately_active' ? 'selected' : '' }}>Moderate Exercise (3-5 Days/Week)</option>
                                    <option value="very_active" {{ old('activity_level') == 'very_active' ? 'selected' : '' }}>Heavy Exercise (6-7 Days/Week)</option>
                                    <option value="super_active" {{ old('activity_level') == 'super_active' ? 'selected' : '' }}>Athlete (2x/Day)</option>
                                </select><br>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="text-sm xl:text-xl px-4 py-2 mt-2 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white rounded-full text-center inline-flex items-center">Calculate TDEE</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="result-container">
                    @if(isset($tdee))
                    <div class="pt-24">
                        <h2 class="text-5xl 2xl:text-7xl text-center handwriting6">Maintenance Calories</h2>
                        <div class="flex flex-col md:flex-row pages justify-center md:mt-8">
                            <div class="md:w-1/2 md:mr-4">
                                <p>Alright, let's decode those numbers and sprinkle in a bit of humor, because, why not? So, according to your stats, your maintenance calories come in at a cool <span class="font-semibold">{{ $tdee }} calories per day</span>. Thanks to the Mifflin-St Jeor Formula, known far and wide as the holy grail of accuracy in the calorie game, we've got Sherlock Holmes-level precision here. For a peek at your daily calories under a different activity level, check out the table below.</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">Basal Metabolic Rate&ndash;{{ $bmr }} calories per day</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">Sedentary&ndash;{{ $caloriesSedentary }} calories per day</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">Light Exercise&ndash;{{ $caloriesLightActivity }} calories per day</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">Moderate Exercise&ndash;{{ $caloriesModerateActivity }} calories per day</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">Heavy Exercise&ndash;{{ $caloriesVigorousActivity }} calories per day</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">Athlete&ndash;{{ $caloriesSuperActive }} calories per day</p>
                            </div>
                            <div class="md:w-1/4 md:mt-6">
                                <div class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary ">
                                    <p class="border-b text-5xl text-center pb-4">{{ $tdee }}</br> calories per day</p>
                                    <p class="text-5xl text-center">{{ $twee }}</br> calories per week</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-24">
                        <h2 class="text-5xl 2xl:text-7xl text-center handwriting6">How you stack up</h2>
                        <div class="flex flex-col-reverse md:flex-row pages justify-center md:mt-8">
                            <div class="md:w-1/2 md:mt-6 md:mr-6">
                                <div class="flex justify-center">
                                    <img class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary" src="/images/statistics2.jpg" alt="A woman standing on a scale">
                                </div>
                            </div>
                            <div class="md:w-1/2 md:m1-4">
                                <p>Your Body Mass Index (BMI) is <span class="font-semibold">{{  $bmi }}</span>, and the J.D. Robinson Formula suggests your ideal weight to be <span class="font-semibold">{{  $idealWeight }} lbs</span>. Look at the BMI table below to see where you land in terms of BMI. Remember, both your BMI and ideal weight are derived from your height and weight and offer a general perspective. If you're into lifting weights, don't sweat it too much&mdash;these numbers aren't the whole story.</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">18.5 or less&ndash;Underweight</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">18.5 - 24.99&ndash;Normal Weight</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">25- 29.99&ndash;Overweight</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">30+&ndash;Obese</p>
                                <p>If you're pumping iron and dreaming of that chiseled physique, you're probably asking, "How ripped can I actually get?" Martin Berkhan's Formula gives us the lowdown&mdash;your maximum muscular potential is  <span class="font-semibold">{{$maxMuscularPotential}} lbs</span> at a jaw-dropping 5% body fat. But let's be real, not many folks aim for that level of leanness. So, set your sights on {{$maxMuscularPotentialt}} lbs at 10% body fat or {{$maxMuscularPotentialf}} lbs at 15% body fat&mdash;fantastic targets to keep in mind while you're on that bulking journey!</p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-24">
                        <h2 class="text-5xl 2xl:text-7xl text-center handwriting6">What to do now</h2>
                        <p class="md:mt-8">Depending on your goals, you can use the information from the TDEE calculator as a reference to either maintain your current weight, bulk up, or cut/lose weight.</p>
                        <div class="flex justify-center">
                            <div class="pb-8 mb-10 p-4 w-full">
                                <ul>
                                    <li class="my-2">Maintain&mdash;To maintain your weight, you should just try to get approximately your TDEE calories each day/week.</li>
                                    <li class="my-2">Bulk up&mdash;To bulk up without gaining fat, you should add about 300&ndash;500 calories to your TDEE each day. If you don't seem to be gaining any weight, you can increase your calories a few hundred more calories/day. At the same time, if it appears you are gaining fat, cut back your calories slightly.</li>
                                    <li class="my-2">Cut/Lose weight&mdash;To cut/lose weight, you should cut approximately 500 calories a day from your TDEE. This will lead to you losing approximately one pound a week. It will also maximize fat loss while maintaining muscle mass.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 md:px-8 lg:px-16 xl:px-32 mb-4 pt-0 mt-0 mb-16">
                        <div class="p-6 pages">
                            <h2 class="text-5xl leading-tight 2xl:text-7xl 2xl:leading-tight text-center handwriting6">Need help?</h2>
                            <p class="text-xl xl:text-3xl mt-4 text-center">We can assist you with our 1-on-1 coaching.</p>
                            <div class="flex justify-center w-full text-2xl mt-6">
                                <a href="/coaching" class="inline-flex items-center py-2 px-8 pb-3 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white rounded-full text-center">Explore Coaching</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="flex flex-col lg:ml-10 lg:w-1/6">
                <div>
                    <div class="md:mt-14 flex justify-center text-secondary text-xl underline font:semi-bold">Uncover Your Fit Coaching</div>
                    <div class="py-2 flex justify-center">
                         <a href="/coaching"><img src="/images/coachingtm3.jpg" class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary" alt="A midlife woman sitting on couch having coaching session on computer"></a>
                    </div>
                    <button class="flex justify-center w-full text-base">
                        <a href="/coaching"  class="inline-flex items-center py-2 px-8 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary rounded-full text-white text-xs">Explore Coaching</a>
                    </button>
                </div>
                 <div>
                    <div class="mt-4 flex justify-center text-secondary text-xl underline">Affiliate Websites</div>
                    <div class="font-bold py-2 ml-4">The ads below take you to partner websites that sell products many of you might find helpful in your health and fitness journey. If you click on one of the ads and make a purchase, Uncover Your Fit will receive a small commission at no extra cost to you.</div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=947058&amp;u=2872412&amp;m=68998&amp;urllink=&amp;afftrack="><img class="rounded-xl" src="https://static.shareasale.com/image/68998/yoga240x400.jpg" border="0" alt="yoga gear" /></a>
                    </div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=2218553&amp;u=2872412&amp;m=85045&amp;urllink=&amp;afftrack="><img class="rounded-xl" src="https://static.shareasale.com/image/85045/DisplayBanner1200x1200px.jpg" border="0" alt="Naturevibe Botanicals"/></a>
                    </div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=1892429&amp;u=2872412&amp;m=114867&amp;urllink=&amp;afftrack="><img  class="rounded-xl"src="https://static.shareasale.com/image/114867/pbcc_hero_720.png" border="0" alt="Keto Krisp Peanut Butter Chocolate Chunk" /></a>
                    </div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=2064734&amp;u=2872412&amp;m=78253&amp;urllink=&amp;afftrack="><img class="rounded-xl" src="https://static.shareasale.com/image/78253/F2B68092-CF7B-252E-7754DDABAF8521D6.jpg" border="0" alt="Nutrition With Nothing To Hide" /></a>
                    </div>
                </div>
            </div>
        </div>
<!-- JavaScript to submit the form and scroll to the results -->
    <script>
        $(document).ready(function () {
            $('form').on('submit', function (e) {
                e.preventDefault();
                var form = $(this);

                // Perform AJAX form submission
                $.ajax({
                    type: 'POST',
                    url: form.attr('action'),
                    data: form.serialize(),
                    success: function (data) {
                        // Load only the content of the result container
                        var resultContent = $(data).find('#result-container').html();
                        $('#result-container').html(resultContent);

                        // Scroll to the results container
                        $('html, body').animate({
                            scrollTop: $('#result-container').offset().top
                        }, 'slow');
                    }
                });
            });
        });
    </script>
<x-explore/>
</x-layout>
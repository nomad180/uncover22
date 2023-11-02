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
                                <p>Based on your stats, the best estimate for your maintenance calories is <span class="font-semibold">{{ $tdee }} calories per day</span>  based on the Mifflin-St Jeor Formula, which is widely known to be the most accurate. The table below shows the difference if you were to have selected a different activity level.</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">Basal Metabolic Rate - {{ $bmr }} calories per day</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">Sedentary - {{ $caloriesSedentary }} calories per day</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">Light Exercise - {{ $caloriesLightActivity }} calories per day</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">Moderate Exercise - {{ $caloriesModerateActivity }} calories per day</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">Heavy Exercise - {{ $caloriesVigorousActivity }} calories per day</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">Athlete - {{ $caloriesSuperActive }} calories per day</p>
                            </div>
                            <div class="md:w-1/4 md:mt-6">
                                <div class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary ">
                                    <p class="border-b text-5xl text-center">{{ $tdee }}</br> calories per day</p>
                                    <p class="text-5xl text-center">{{ $twee }}</br> calories per week</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-24">
                        <h2 class="text-5xl 2xl:text-7xl text-center handwriting6">How you rank</h2>
                        <div class="flex flex-col-reverse md:flex-row pages justify-center md:mt-8">
                            <div class="md:w-1/2 md:mt-6 md:mr-6">
                                <div class="flex justify-center">
                                    <img class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary" src="/images/statistics2.jpg" alt="A woman standing on a scale">
                                </div>
                            </div>
                            <div class="md:w-1/2 md:m1-4">
                                <p>Your Body Mass Index (BMI) is <span class="font-semibold">{{  $bmi }}</span> and your ideal weight is is estimated to be <span class="font-semibold">{{  $idealWeight }} lbs</span> based on the J.D. Robinson Formula. You can see where your BMI ranks you in the table below. Both your BMI and ideal weight are based on your height and weight and represent averages, so don't take them too seriously, especially if you lift weights.</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">18.5 or less - Underweight</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">18.5 - 24.99 - Normal Weight</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">25- 29.99 - Overweight</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">30+ - Obese</p>
                                <p>If you do lift weights, you might be wondering how ripped could you get? According to Martin Berkhan's Formula, your maximum muscular potential is <span class="font-semibold">{{$maxMuscularPotential}} lbs</span> at 5% body fat. Most people have no desire to be 5% body fat though, so you'd be {{$maxMuscularPotentialt}} lbs at 10% body fat & {{$maxMuscularPotentialf}} lbs at 15% body fat. These numbers are good goals to aim for if you are bulking up!</p>
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
                         <a href="/coaching"><img src="/images/coachingtm3.jpg" class="rounded-xl border-2 border-primary" alt="A midlife woman sitting on couch having coaching session on computer"></a>
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
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=1780503&amp;u=2872412&amp;m=110431&amp;urllink=&amp;afftrack="><img class="rounded-xl" src="https://static.shareasale.com/image/110431/Good_Rancher_KITfloor1of1.jpg" border="0" alt="Good Ranchers meat selection" /></a>
                    </div>
                    <div class="py-6 flex justify-center">
                       <a target="_blank" href="https://shareasale.com/r.cfm?b=1857422&amp;u=2872412&amp;m=115699&amp;urllink=&amp;afftrack="><img class="rounded-xl" src="https://static.shareasale.com/image/115699/200x2001.jpg" border="0" alt="Keep Nature Wild"/></a>
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
</x-layout>

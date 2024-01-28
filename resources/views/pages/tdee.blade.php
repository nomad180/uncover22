@section('title'){{'TDEE Calculator | Uncover Your Fit'}}@endsection
@section('description'){{'Use the Total Daily Energy Expenditure (TDEE) calculator to determine how many calories you burn per day based on your age, physical characteristics, and activity level.'}}@endsection
@section('author'){{'Damon Leach'}}@endsection
<x-layout>
    <div class="relative">
        <div class="border-b border-zinc-300 pt-10 lg:pt-0"><img src="/images/tdee4.jpg" alt="A man standing in the kitchen with a bunch of food in front of him and writing things down in a journal" width="100%"></div>
        <div class="absolute inset-y-0 inset-x-8 md:inset-x-10 lg:inset-x-12 xl:inset-x-14 2xl:inset-x-16 w-11/12 flex justify-center flex-col">
            <h1 class="text-3xl leading-tight md:text-5xl md:leading-tight lg:text-6xl lg:leading-tight xl:text-7xl xl:leading-tight 2xl:text-8xl 2xl:leading-tight handwriting6 flex justify-center text-white text-center">TDEE Calculator</h1>
            <h2 class="lg:text-xl font-medium text-white text-center">Learn how many calories you burn every day with our Total Daily Energy Expenditure (TDEE) calculator</h2>
        </div>
    </div>
    <div class="flex flex-col lg:flex-row px-4 lg:px-16 xl:px-32 mt-16">
            <div class="lg:w-5/6 mb-8">
                <div>
                    <h2 class="text-5xl 2xl:text-7xl text-center handwriting6">What's your TDEE?</h2>
                </div>
                <div class="flex flex-col lg:flex-row pages mt-8">
                    <div class="lg:w-1/2 md:mr-4">
                        <p>Your Total Daily Energy Expenditure (TDEE) is like a recipe with two essential ingredients: your Basal Metabolic Rate (BMR) and an activity multiplier.</p>
                        <p>Think of your BMR as the energy your body expends while lounging on the couch, watching Netflix. But life isn't just couch time, right? So, we need to sprinkle in some extra calories to account for your daily activities, even if you're not doing extreme sports.</p>
                        <p>Our TDEE calculator is like a master chef. It combines the finest formulas to give you a TDEE that's not just a number but a clear, meaningful insight into your daily calorie needs.</p>
                        <div class="flex justify-center">
                            <p class="inline-flex items-center py-2 px-4 pb-3 mb-4 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white rounded-full text-center text-xl"><a class="text-white no-underline" href="https://uncoveryourfit.com/posts/deciphering-your-total-daily-energy-expenditure-(TDEE)-for-optimal-health-and-fitness" target="blank" class="text-center">Read More About TDEE</a></p>
                        </div>
                    </div>
                    <div class="lg:w-1/2 flex flex-col border-2 border-zinc-300 shadow-lg shadow-zinc-400 rounded-xl p-4">
                        <div class="flex justify-center items-center">
                            <input type="radio" id="imperial" name="unit" value="imperial" checked required {{ old('unit') == 'imperial' ? 'checked' : '' }}><br>
                            <label class="px-2" for="imperial">Imperial</label>
                            <input type="radio" id="metric" name="unit" value="metric" required {{ old('unit') == 'metric' ? 'checked' : '' }}><br>
                            <label class="px-2" for="metric">Metric</label>
                        </div>
                        <div id="imperial-form" class="mx-auto">
                            <form method="POST" action="/tdee">
                                @csrf
                                <input type="hidden" id="covertunit" name="covertunit">
                                <div class="mt-4">
                                    <label for="gender">Gender:</label>
                                    <input type="radio" name="gender" value="male" id="male" checked required {{ old('gender') == 'male' ? 'checked' : '' }}>
                                    <label for="male">Male</label>
                                    <input type="radio" name="gender" value="female" id="female" required {{ old('gender') == 'female' ? 'checked' : '' }}>
                                    <label for="female">Female</label><br>
                                </div>
                                <div class="mt-4">
                                    <label for="age">Age:</label>
                                    <input class="w-3/12 text-center border rounded-xl" type="number" name="age" id="age" required value="{{ old('age') }}"><br>
                                </div>
                                <div class="mt-4">
                                    <label for="weight">Weight (lbs):</label>
                                    <input class="w-3/12 text-center border rounded-xl" type="number" name="weight" id="weight" required value="{{ old('weight') }}"><br>
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
                                    <label for="bodyfat">Body Fat % (Optional):</label>
                                    <input class="w-3/12 text-center border rounded-xl" type="number" step="0.1" name="bodyfat" value="{{ old('bodyfat') }}">
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="text-sm xl:text-xl px-4 py-2 mt-2 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white rounded-full text-center inline-flex items-center">Calculate TDEE</button>
                                </div>
                            </form>
                        </div>
                        <div id="metric-form" class="mx-auto">
                            <form method="POST" action="/tdee" id="met-form">
                                @csrf
                                <div class="mt-4">
                                    <label for="gender">Gender:</label>
                                    <input type="radio" name="gender" value="male" id="male" checked required {{ old('gender') == 'male' ? 'checked' : '' }}>
                                    <label for="male">Male</label>
                                    <input type="radio" name="gender" value="female" id="female" required {{ old('gender') == 'female' ? 'checked' : '' }}>
                                    <label for="female">Female</label><br>
                                </div>
                                <div class="mt-4">
                                    <label for="age">Age:</label>
                                    <input class="w-3/12 text-center border rounded-xl" type="number" name="age" id="age" required value="{{ old('age') }}"><br>
                                </div>
                                <div class="mt-4">
                                    <label for="weight">Weight (kg):</label>
                                    <input class="w-3/12 text-center border rounded-xl" type="number" name="weight" id="weight" required value="{{ old('weight') }}"><br>
                                </div>
                                <div class="mt-4">
                                    <label for="height">Height (cm):</label>
                                    <input class="w-3/12 text-center border rounded-xl" type="number" name="height" id="height" required value="{{ old('height')}}"><br>
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
                                    <label for="bodyfat">Body Fat % (Optional):</label>
                                    <input class="w-3/12 text-center border rounded-xl" type="number" step="0.1" name="bodyfat" value="{{ old('bodyfat') }}">
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="text-sm xl:text-xl px-4 py-2 mt-2 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white rounded-full text-center inline-flex items-center">Calculate TDEE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="result-container">
                    @if(isset($tdee))
                    <div class="pt-24">
                        <h2 class="text-5xl 2xl:text-7xl text-center handwriting6">Maintenance calories</h2>
                        <div class="flex flex-col md:flex-row pages justify-center md:mt-8">
                            <div class="md:w-1/2 md:mr-4">
                                <p>Alright, let's decode those numbers and sprinkle in a bit of humor, because, why not? So, according to your stats, your maintenance calories come in at a cool <span class="font-semibold">{{ $tdee }} calories per day</span>.
                                @if($bodyFatPercentage)
                                    Thanks to the <a href="https://www.nutriswift.in/post/understanding-the-katch-mcardle-equation-for-accurate-energy-expenditure-estimation" target="blank"> Katch-McArdle Formula</a>, which is usually considered the most accurate formula when body fat is included,
                                @else
                                    Thanks to the <a href="https://pubmed.ncbi.nlm.nih.gov/15883556/" target="blank"> Mifflin-St Jeor Formula</a>, known far and wide as the holy grail of accuracy in the calorie game,
                                @endif
                                we've got Sherlock Holmes-level precision here. For a peek at your daily calories under a different activity level, check out the table below.</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">Basal Metabolic Rate &ndash; {{ $bmr }} calories per day</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">
                                @if ($tdee === $caloriesSedentary)
                                    <span class="font-semibold">Sedentary (Office Job) &ndash; {{ $caloriesSedentary }} calories per day</span>
                                @else
                                    Sedentary (Office Job) &ndash; {{ $caloriesSedentary }} calories per day
                                @endif
                                </p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">
                                @if ($tdee === $caloriesLightActivity)
                                    <span class="font-semibold">Light Exercise (1-2 Days/Week) &ndash; {{ $caloriesLightActivity }} calories per day</span>
                                @else
                                    Light Exercise (1-2 Days/Week) &ndash; {{ $caloriesLightActivity }} calories per day
                                @endif
                                </p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">
                                @if ($tdee === $caloriesModerateActivity)
                                    <span class="font-semibold">Moderate Exercise (3-5 Days/Week) &ndash; {{ $caloriesModerateActivity }} calories per day</span>
                                @else
                                    Moderate Exercise (3-5 Days/Week) &ndash; {{ $caloriesModerateActivity }} calories per day
                                @endif
                                </p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">
                                @if ($tdee === $caloriesVigorousActivity)
                                    <span class="font-semibold">Heavy Exercise (6-7 Days/Week) &ndash; {{ $caloriesVigorousActivity }} calories per day</span>
                                @else
                                    Heavy Exercise (6-7 Days/Week) &ndash; {{ $caloriesVigorousActivity }} calories per day
                                @endif
                                </p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">
                                @if ($tdee === $caloriesSuperActive)
                                    <span class="font-semibold">Athlete (2x/Day) &ndash; {{ $caloriesSuperActive }} calories per day</span>
                                @else
                                    Athlete (2x/Day) &ndash; {{ $caloriesSuperActive }} calories per day
                                @endif
                                </p>
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
                                    <img class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary" src="/images/bmi.jpg" alt="The text BMI above some fruit, a scale, and a notebook sitting on a table">
                                </div>
                            </div>
                            <div class="md:w-1/2 md:m1-4">
                                <h3 class="text-xl 2xl:text-3xl text-center font-semibold">Body Mass Index (BMI)</h3>
                                <p>Your <span><a href="https://www.cdc.gov/healthyweight/assessing/bmi/index.html#:~:text=Body%20Mass%20Index%20(BMI)%20is,or%20health%20of%20an%20individual." target="blank"> BMI</a></span> is <span class="font-semibold">{{  $bmi }}</span>, which puts you in the
                                    @if ($bmi < 18.5)
                                        <span class="font-semibold">Underweight</span>
                                    @elseif ($bmi >= 18.5 && $bmi < 24.9)
                                        <span class="font-semibold">Normal Weight</span>
                                    @elseif ($bmi >= 24.9 && $bmi < 29.9)
                                        <span class="font-semibold">Overweight</span>
                                    @else
                                        <span class="font-semibold">Obese</span>
                                    @endif
                                category.</p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">
                                    @if ($bmi < 18.5)
                                        <span class="font-semibold">18.5 or less &ndash; Underweight</span>
                                    @else
                                        18.5 or less &ndash; Underweight
                                    @endif
                                </p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">
                                    @if ($bmi >= 18.5 && $bmi < 24.9)
                                        <span class="font-semibold">18.5 - 24.99 &ndash; Normal Weight</span>
                                    @else
                                        18.5 - 24.99 &ndash; Normal Weight
                                    @endif
                                </p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">
                                    @if ($bmi >= 24.9 && $bmi < 29.9)
                                        <span class="font-semibold">25- 29.99 &ndash; Overweight</span>
                                    @else
                                        25 - 29.99 &ndash; Overweight
                                    @endif
                                </p>
                                <p class="text-center border border-zinc-300 bg-neutral-50 rounded-xl">
                                    @if ($bmi > 30.0)
                                        <span class="font-semibold">30+ &ndash; Obese</span>
                                    @else
                                        30+ &ndash; Obese
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-xl 2xl:text-3xl text-center font-semibold">Ideal Body Weight</h3>
                    <p>The J.D. Robinson Formula suggests your ideal weight to be approximately
                    @if ($weight != $weightInKg)
                        <span class="font-semibold">{{  $idealWeight }} lbs</span>.
                    @else
                        <span class="font-semibold">{{  $idealWeight }} kg</span>.
                    @endif
                    However, this formula derives your ideal body weight from your height and only offers a general perspective of your ideal. As a result, the formula isn't completely accurate if you're into lifting weights.</p>
                    <h3 class="text-xl 2xl:text-3xl text-center font-semibold">Maximum Muscular Potential</h3>
                    <p>If you're pumping iron and dreaming of that chiseled physique, you're probably asking, "How ripped can I actually get?" Martin Berkhan's Formula gives us the lowdown&mdash;your maximum muscular potential is
                    @if ($weight != $weightInKg)
                        <span class="font-semibold">{{$maxMuscularPotential}} lbs</span>
                    @else
                        <span class="font-semibold">{{$maxMuscularPotential}} kg</span>
                    @endif
                    at a jaw-dropping 5% body fat. But let's be real, not many folks aim for that level of leanness. So, set your sights on
                    @if ($weight != $weightInKg)
                        <span>{{$maxMuscularPotentialt}} lbs at 10% body fat or</span>
                    @else
                        <span>{{$maxMuscularPotentialt}} kg at 10% body fat or</span>
                    @endif
                    @if ($weight != $weightInKg)
                        <span>{{$maxMuscularPotentialf}} lbs</span>
                    @else
                        <span>{{$maxMuscularPotentialf}} kg</span>
                    @endif
                    at 15% body fat&mdash;fantastic targets to keep in mind while you're on that bulking journey!</p>
                    <div class="pt-24 pages">
                        <h2 class="text-5xl 2xl:text-7xl text-center handwriting6">Apply your results</h2>
                        <h3 class="text-xl 2xl:text-3xl text-center font-semibold mt-6">Body Weight and Macronutrients</h3>
                        <p class="md:mt-8">Now that you know your maintenance calories, you can use that information as a reference to either:</p>
                        <div class="flex justify-center">
                            <div class="p-4 w-full">
                                <ul>
                                    <li class="accordion">Maintain Your Weight</li>
                                        <div class="panel pb-4">
                                            <p>If your goal is to maintain your weight, you should aim to get {{ $tdee }} calories per day.</p>
                                            <h3>Macronutrients</h3>
                                            <p>We recommend your maintenance diet consist of 20% protein, 50% carbs, and 30% fats, which falls right in the middle of the generally accepted macronutrient ratios put forth by the American Council on Exercise (ACE) to maintain your weight. At these ratios, your macronutrients would include:</p>
                                            <ul>
                                                <li>{{ $mp }} grams of protein/day</li>
                                                <li>{{ $mc }} grams of carbs/day</li>
                                                <li>{{ $mf }} grams of fat/day</li>
                                            </ul>
                                        </div>
                                    <li class="accordion">Bulk Up</li>
                                        <div class="panel pb-4">
                                            <p>To bulk up without gaining fat, you should add approximately 500 calories to your {{ $tdee }} maintenance calories each day for a total of {{ $bulk }} calories/day. If you don't seem to be gaining any weight, you can add a few hundred more calories/day. At the same time, if it appears you are gaining fat, cut back your calories slightly.</p>
                                            <h3>Macronutrients</h3>
                                            <p>We recommend your bulking diet consist of 25% protein, 55% carbs, and 20% fats. We recommend these ratios as they increase your protein and carb intake to help fuel muscle growth while limiting excess fat. At these ratios, your macronutrients would include:</p>
                                            <ul>
                                                <li>{{ $bp }} grams of protein/day</li>
                                                <li>{{ $bc }} grams of carbs/day</li>
                                                <li>{{ $bf }} grams of fat/day</li>
                                            </ul>
                                        </div>
                                    <li class="accordion">Cut/Lose Weight</li>
                                        <div class="panel pb-4">
                                            <p>To cut/lose weight, you should cut approximately 500 calories a day from your {{ $tdee }} maintenance calories each day for a total of {{ $cut }} calories/day. This will lead to losing approximately one pound a week. It will also maximize fat loss while maintaining muscle mass.</p>
                                            <h3>Macronutrients</h3>
                                            <p>We recommend your cutting diet consist of 35% protein, 40% carbs, and 25% fats. We recommend these ratios as they really bump up your protein to reduce hunger and minimize carbs and fat to increase fat loss. At these ratios, your macronutrients would include:</p>
                                            <ul>
                                                <li>{{ $cp }} grams of protein/day</li>
                                                <li>{{ $cc }} grams of carbs/day</li>
                                                <li>{{ $cf }} grams of fat/day</li>
                                            </ul>
                                        </div>
                                </ul>
                            </div>
                        </div>
                        <p>If you are new to the nutrition game and need to learn about macronutrients, check out our macronutrient blog post below.</p>
                        <div class="flex justify-center mb-4">
                            <p class="inline-flex items-center py-2 px-4 pb-3 mb-4 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white rounded-full text-center text-xl"><a class="text-white no-underline" href="https://uncoveryourfit.com/posts/mastering-macronutrients-a-guide-to-optimal-ratios-for-every-fitness-goal" target="blank" class="text-center">Mastering Macronutrients</a></p>
                        </div>
                        <h3 class="text-xl 2xl:text-3xl text-center font-semibold">Needed Tools</h3>
                        <p class="md:mt-8">In order for you to use your TDEE to meet your weight goals, you'll need to accurately measure the calories going into your body and weigh yourself regularly to see if you are moving in the right direction. The tools listed below will help on this journey:</p>
                        <p class="md:mt-8 font-semibold italic">Affiliate Websites: The ads/links below take you to partner websites that sell products you might find helpful in your health and fitness journey. If you click on one of the ads and make a purchase, Uncover Your Fit will receive a small commission at no extra cost to you. As an Amazon Associate, we earn from qualifying purchases from Amazon links.</p>
                        <div class="flex flex-col-reverse md:flex-row pages justify-center md:mt-8">
                            <div class="md:w-3/12 md:mr-6 md:mt-8">
                                <div class="flex justify-center">
                                    <img class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary " src="/images/foodscale.jpg" alt="An electronic food scale with a bowl of oranges on it">
                                </div>
                            </div>
                            <div class="md:w-5/12 md:m1-4">
                                <h3 class="text-xl 2xl:text-3xl text-center font-semibold mt-4 md:mt-0">Kitchen Food Scale</h3>
                                <p>This <a href="https://amzn.to/3QMZW7j" target="blank">little gadget</a> takes the guesswork out of portion control. No more eyeballing or ballparking your food quantities. Instead, you get real numbers, precise to the gram.</p>
                                <p>With a <a href="https://amzn.to/3QMZW7j" target="blank">food scale</a>, you can hit your TDEE targets more consistently, making your journey to health and fitness a smoother ride.</p>
                            </div>
                        </div>
                        <div class="flex flex-col-reverse md:flex-row pages justify-center md:mt-8">
                            <div class="md:w-3/12 md:mr-6 md:mt-8">
                                <div class="flex justify-center">
                                    <img class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary " src="/images/scale4.jpg" alt="A smart bathroom scale">
                                </div>
                            </div>
                            <div class="md:w-5/12 md:m1-4">
                                <h3 class="text-xl 2xl:text-3xl text-center font-semibold mt-4 md:mt-0">Smart Bathroom Scale</h3>
                                <p>When it comes to health and fitness, a <a href="https://amzn.to/3MwHyNv" target="blank">smart bathroom scale</a> is your secret weapon in the battle for a healthier you. As opposed to a traditional scale, this high-tech marvel doesn't just measure your weight; it tracks body composition, body fat percentage, muscle mass, and more.</p>
                                <p>With all this data at your fingertips, you can make informed decisions about your fitness journey. No more flying blind&mdash;it's like being the pilot who knows every gust of wind and tailwind. So, if you're serious about leveling up your health and fitness game, grab a <a href="https://amzn.to/3MwHyNv" target="blank">smart bathroom scale</a> and empower yourself with the knowledge you need to chart your course.</p>
                            </div>
                        </div>
                        <div class="flex flex-col-reverse md:flex-row pages justify-center md:mt-8">
                            <div class="md:w-3/12 md:mr-6 md:mt-8">
                                <div class="flex justify-center">
                                    <img class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary " src="/images/calorieapp.jpg" alt="A woman checking her calorie app on her phone">
                                </div>
                            </div>
                            <div class="md:w-5/12 md:m1-4">
                                <h3 class="text-xl 2xl:text-3xl text-center font-semibold mt-4 md:mt-0">Calorie Tracking App</h3>
                                <p>The calorie tracking app is your trusty sidekick on the quest for those elusive health and fitness goals! Think of it as your digital nutrition detective. It's like having Sherlock Holmes in your pocket, but instead of solving mysteries, it's unraveling the enigma of your daily calories.</p>
                                <p> So, whether you're aiming to lose weight, gain muscle, or simply eat healthier, a calorie tracking app, such as <a href="https://www.myfitnesspal.com/" target="blank">MyFitnessPal</a> or <a href="https://shareasale.com/r.cfm?b=766203&u=2872412&m=61121&urllink=&afftrack=" target="blank">Cronometer</a>, will be your partner in crime. And, if your really feeling it, partner your calorie tracking app with a personal fitness tracker, such as the <a href="https://amzn.to/477TPQF" target="blank"> COROS PACE 2</a>. Get ready to track, learn, and conquer your nutritional adventures, one calorie at a time.</p>
                                <div class="flex justify-center">
                                    <p class="inline-flex items-center py-2 px-4 pb-3 mb-4 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white rounded-full text-center text-xl"><a class="text-white no-underline" href="/images/Mastering MyFitnessPal for Ultimate Fitness Success.pdf" download class="text-center">Download Our Free Guide to MyFitnessPal</a></p>
                                </div>
                                <div class="flex justify-center">
                                    <p class="inline-flex items-center py-2 px-4 pb-3 mb-4 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white rounded-full text-center text-xl"><a class="text-white no-underline" href="/images/Cronometer Your Nutritional Secret Weapon.pdf" download class="text-center">Download Our Free Guide to Cronometer</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="mb-8 mt-16">
                        <div class="p-6 pages">
                            <h2 class="text-5xl leading-tight 2xl:text-7xl 2xl:leading-tight text-center handwriting6">Not sure what to do next?</h2>
                            <p class="mt-4 text-xl xl:text-3xl mt-4 text-center">Join our private Facebook group for midlife warriors.</p>
                            <div class="flex justify-center w-full text-2xl mt-6">
                                <a href="https://www.facebook.com/groups/1430963114164699/" target="blank" class="inline-flex items-center py-2 px-4 pb-3 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white rounded-full text-center no-underline">Join Group</a>
                            </div>
                            <p class="mt-4 text-xl xl:text-3xl mt-4 text-center">Try our <span class="font-semibold">FREE</span> online challenge.</p>
                            <div class="flex justify-center w-full text-2xl mt-6">
                                <a href="https://uncoveryourfit.practicebetter.io/#/653804e6810ea7f6eea2308e/bookings?c=65622ecd9b22ceb79eff0f42" target="blank" class="inline-flex items-center py-2 px-4 pb-3 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white rounded-full text-center no-underline">Jumpstart Your Health and Fitness (7-Day Challenge)</a>
                            </div>
                        </div>
                    </div>-->
                    @endif
                </div>
            </div>
            <div class="flex flex-col lg:ml-10 lg:w-1/6">
                <div>
                    <div class="md:mt-14 flex justify-center text-secondary text-xl underline font:semi-bold">Uncover Your Fit Coaching</div>
                    <div class="flex justify-center">
                        <div class="py-2 flex justify-center w-1/2 lg:w-full">
                             <a href="/"><img src="/images/coachingtm3.jpg" class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary" alt="A midlife woman sitting on couch having coaching session on computer"></a>
                        </div>
                    </div>
                    <button class="flex justify-center w-full text-base">
                        <a href="/" class="inline-flex items-center py-2 px-4 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary rounded-full text-white text-xs no-underline">Explore Coaching</a>
                    </button>
                </div>
                <div>
                    <div class="mt-4 flex justify-center text-secondary text-xl underline">Affiliate Websites</div>
                    <div class="font-bold py-2 ml-4 italic">The ads below take you to partner websites that sell products many of you might find helpful in your health and fitness journey. If you click on one of the ads and make a purchase, Uncover Your Fit will receive a small commission at no extra cost to you.</div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=1020318&amp;u=2872412&amp;m=68998&amp;urllink=&amp;afftrack="><img class="rounded-xl" src="https://static.shareasale.com/image/68998/Cross_Training_160x600.jpg" border="0" alt="Cross training gear" /></a>
                    </div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=2218536&amp;u=2872412&amp;m=85045&amp;urllink=&amp;afftrack="><img class="rounded-xl" src="https://static.shareasale.com/image/85045/45OFFPresentation169.jpg" border="0" alt="Naturevibe Botanicals"/></a>
                    </div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=1882082&amp;u=2872412&amp;m=114867&amp;urllink=&amp;afftrack="><img class="rounded-xl" src="https://static.shareasale.com/image/114867/image_from_ios-1.jpg" border="0" alt="Keto Krisp Almond Butter Blackberry Jelly" /></a>
                    </div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=2114834&amp;u=2872412&amp;m=78253&amp;urllink=&amp;afftrack="><img class="rounded-xl" src="https://static.shareasale.com/image/78253/3_NakedCookie-Choco-Chip_AdDesktop_130.jpg" border="0" alt="Nutrition With Nothing To Hide" /></a>
                    </div>
                    <!--<div class="py-6 flex flex-col justify-center items-center">
                        <a class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary p-4" href="https://amzn.to/477TPQF" target="blank"><img src="/images/coros.jpg" alt="COROS Pace 2 fitness watch"></a>
                        <p class="text-center mt-4"><a href="https://amzn.to/477TPQF" target="blank">COROS PACE 2 Fitness Tracking Watch</a></p>
                    </div>
                    <div class="py-6 flex flex-col justify-center items-center">
                        <a class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary p-4" href="https://amzn.to/3H7Xsea" target="blank"><img src="/images/jumprope.jpg" alt="jump rope"></a>
                        <p class="text-center mt-4"><a href="https://amzn.to/3H7Xsea" target="blank">Fitness Jump Rope</a></p>
                    </div>
                    <div class="py-6 flex flex-col justify-center items-center">
                        <a class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary p-4" href="https://amzn.to/3HaVauY" target="blank"><img src="/images/weights.jpg" alt="Bowflex adjustable dumbbells"></a>
                        <p class="text-center mt-4"><a href="https://amzn.to/3HaVauY" target="blank">Bowflex Adjustable Dumbbells</a></p>
                    </div>-->
                </div>
            </div>
        </div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectedUnit = document.querySelector('input[name="unit"]:checked').value;
        document.getElementById('covertunit').value = selectedUnit;
        document.getElementById('imperial-form').style.display = selectedUnit === 'imperial' ? 'block' : 'none';
        document.getElementById('metric-form').style.display = selectedUnit === 'metric' ? 'block' : 'none';
    });
    // Add the event listener if you want to handle changes post-load
     var radioButtons = document.querySelectorAll('input[name="unit"]');
     radioButtons.forEach(function(radio) {
         radio.addEventListener('change', function() {
             var selectedUnit = this.value;
             document.getElementById('covertunit').value = selectedUnit;
             document.getElementById('imperial-form').style.display = selectedUnit === 'imperial' ? 'block' : 'none';
             document.getElementById('metric-form').style.display = selectedUnit === 'metric' ? 'block' : 'none';
         });
     });
</script>
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
<x-accordion/>
</x-layout>

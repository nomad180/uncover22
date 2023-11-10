@section('title'){{'TDEE Calculator | Uncover Your Fit'}}@endsection
@section('description'){{'Use the Total Daily Energy Expenditure (TDEE) calculator to determine how many calories you burn per day based on your age, physical characteristics, and activity level.'}}@endsection
@section('author'){{'Damon Leach'}}@endsection
<x-layout>
    <div class="relative">
        <div class="border-b border-zinc-300"><img src="/images/tdee4.jpg" alt="A man standing in the kitchen with a bunch of food in front of him and writing things down in a journal" width="100%"></div>
        <div class="absolute inset-y-0 inset-x-8 md:inset-x-10 lg:inset-x-12 xl:inset-x-14 2xl:inset-x-16 w-11/12 flex justify-center flex-col">
            <h1 class="text-3xl leading-tight md:text-5xl md:leading-tight lg:text-6xl lg:leading-tight xl:text-7xl xl:leading-tight 2xl:text-8xl 2xl:leading-tight handwriting6 flex justify-center text-white text-center">TDEE Calculator</h1>
            <h2 class="lg:text-xl font-medium text-white text-center">Learn how many calories you burn every day with our Total Daily Energy Expenditure (TDEE) calculator</h2>
        </div>
    </div>
    <div class="flex flex-col lg:flex-row px-4 lg:px-16 xl:px-32 mt-8">
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
                            <p class="inline-flex items-center py-2 px-8 pb-3 mb-4 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white rounded-full text-center text-xl"><a class="text-white no-underline" href="https://uncoveryourfit.com/posts/deciphering-your-total-daily-energy-expenditure-(TDEE)-for-optimal-health-and-fitness" target="blank" class="text-center">Read Our TDEE Blog Post</a></p>
                        </div>
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
                                <p>Alright, let's decode those numbers and sprinkle in a bit of humor, because, why not? So, according to your stats, your maintenance calories come in at a cool <span class="font-semibold">{{ $tdee }} calories per day</span>. Thanks to the <a href="https://pubmed.ncbi.nlm.nih.gov/15883556/" target="blank"> Mifflin-St Jeor Formula</a>, known far and wide as the holy grail of accuracy in the calorie game, we've got Sherlock Holmes-level precision here. For a peek at your daily calories under a different activity level, check out the table below.</p>
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
                                        30+&ndash;Obese
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-xl 2xl:text-3xl text-center font-semibold">Ideal Body Weight</h3>
                    <p>The J.D. Robinson Formula suggests your ideal weight to be approximately <span class="font-semibold">{{  $idealWeight }} lbs</span>. Remember, your ideal weight is derived from your height and only offers a general perspective of your ideal. If you're into lifting weights, don't sweat it too much&mdash;this number isn't the whole story.</p>
                    <h3 class="text-xl 2xl:text-3xl text-center font-semibold">Maximum Muscular Potential</h3>
                    <p>If you're pumping iron and dreaming of that chiseled physique, you're probably asking, "How ripped can I actually get?" Martin Berkhan's Formula gives us the lowdown&mdash;your maximum muscular potential is  <span class="font-semibold">{{$maxMuscularPotential}} lbs</span> at a jaw-dropping 5% body fat. But let's be real, not many folks aim for that level of leanness. So, set your sights on {{$maxMuscularPotentialt}} lbs at 10% body fat or {{$maxMuscularPotentialf}} lbs at 15% body fat&mdash;fantastic targets to keep in mind while you're on that bulking journey!</p>
                    <div class="pt-24 pages">
                        <h2 class="text-5xl 2xl:text-7xl text-center handwriting6">What to do now</h2>
                        <h3 class="text-xl 2xl:text-3xl text-center font-semibold mt-6">Body Weight and Macronutrients</h3>
                        <p class="md:mt-8">Depending on your goals, you can use the information from the TDEE calculator as a reference to either:</p>
                        <div class="flex justify-center">
                            <div class="p-4 w-full">
                                <ul>
                                    <li class="accordion">Maintain Your Weight</li>
                                        <div class="panel pb-4">
                                            <p>To maintain your weight, you should aim to get {{ $tdee }} calories per day.</p>
                                            <h3>Macronutrients</h3>
                                            <p>At {{ $tdee }} calories per day, we recommend a diet of 20% protein, 50% carbs, and 30% fats, and it would include:</p>
                                            <ul>
                                                <li>{{ $mp }} grams of protein/day</li>
                                                <li>{{ $mc }} grams of carbs/day</li>
                                                <li>{{ $mf }} grams of fat/day</li>
                                            </ul>
                                        </div>
                                    <li class="accordion">Bulk Up</li>
                                        <div class="panel pb-4">
                                            <p>To bulk up without gaining fat, you should add about 300–500 calories to your maintenance calories each day. If you don't seem to be gaining any weight, you can add a few hundred more calories/day. At the same time, if it appears you are gaining fat, cut back your calories slightly.</p>
                                            <h3>Macronutrients</h3>
                                            <p>At {{ $bulk }} calories per day (500 calories over your maintenance calories), we recommend a bulking diet of 25% protein, 55% carbs, and 20% fats, and it would include::</p>
                                            <ul>
                                                <li>{{ $bp }} grams of protein/day</li>
                                                <li>{{ $bc }} grams of carbs/day</li>
                                                <li>{{ $bf }} grams of fat/day</li>
                                            </ul>
                                        </div>
                                    <li class="accordion">Cut/Lose Weight</li>
                                        <div class="panel pb-4">
                                            <p>To cut/lose weight, you should cut approximately 500 calories a day from maintenance calories. This will lead to losing approximately one pound a week. It will also maximize fat loss while maintaining muscle mass.</p>
                                            <h3>Macronutrients</h3>
                                            <p>At {{ $cut }} calories per day (500 calories under your maintenance level), we recommend a cutting diet of 35% protein, 40% carbs, and 25% fats, and it would include:</p>
                                            <ul>
                                                <li>{{ $cp }} grams of protein/day</li>
                                                <li>{{ $cc }} grams of carbs/day</li>
                                                <li>{{ $cf }} grams of fat/day</li>
                                            </ul>
                                        </div>
                                </ul>
                            </div>
                        </div>
                        <h3 class="text-xl 2xl:text-3xl text-center font-semibold">Needed Tools</h3>
                        <p class="md:mt-8">In order for you to use your TDEE to meet your weight goals, you'll need to accurately measure the calories going into your body and weigh yourself regularly to see if you are moving in the right direction. The tools listed below will help on this journey:</p>
                        <p class="md:mt-8 font-semibold italic">Affiliate Websites: The ads/links below take you to partner websites that sell products you might find helpful in your health and fitness journey. If you click on one of the ads and make a purchase, Uncover Your Fit will receive a small commission at no extra cost to you. As an Amazon Associate we earn from qualifying purchases from Amazon links.</p>
                        <div class="flex flex-col-reverse md:flex-row pages justify-center md:mt-8">
                            <div class="md:w-3/12 md:mr-6 md:mt-8">
                                <div class="flex justify-center">
                                    <a class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary p-4" href="https://www.amazon.com/Greater-Goods-Capacity-Kitchen-Scale/dp/B09QFWXSD8?crid=1B887TV7H5LR1&keywords=digital+food+scales&qid=1699120689&refinements=p_72%3A1248915011&rnid=1248913011&s=home-garden&sprefix=digital+food+scales%2Caps%2C96&sr=1-8&linkCode=li3&tag=uncoveryour0c-20&linkId=258b9a357e97988ab4aaff748ee1d692&language=en_US&ref_=as_li_ss_il" target="_blank"><img border="0" src="//ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B09QFWXSD8&Format=_SL250_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=uncoveryour0c-20&language=en_US" ></a><img src="https://ir-na.amazon-adsystem.com/e/ir?t=uncoveryour0c-20&language=en_US&l=li3&o=1&a=B09QFWXSD8" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
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
                                    <a class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary p-6" href="https://www.amazon.com/Etekcity-Digital-Bluetooth-Bathroom-Pregnancy/dp/B09HCJD6H1?crid=A1JXR1ZM1WPR&keywords=fitness+scale&qid=1699122910&sprefix=fitness+scale%2Caps%2C90&sr=8-1-spons&ufe=app_do%3Aamzn1.fos.006c50ae-5d4c-4777-9bc0-4513d670b6bc&sp_csd=d2lkZ2V0TmFtZT1zcF9hdGY&psc=1&linkCode=li3&tag=uncoveryour0c-20&linkId=78b7cbc34ba0490e871418c8762cbfb0&language=en_US&ref_=as_li_ss_il" target="_blank"><img border="0" src="//ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B09HCJD6H1&Format=_SL250_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=uncoveryour0c-20&language=en_US" ></a><img src="https://ir-na.amazon-adsystem.com/e/ir?t=uncoveryour0c-20&language=en_US&l=li3&o=1&a=B09HCJD6H1" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
                                </div>
                            </div>
                            <div class="md:w-5/12 md:m1-4">
                                <h3 class="text-xl 2xl:text-3xl text-center font-semibold mt-4 md:mt-0">Smart Body Weight Scale</h3>
                                <p>When it comes to health and fitness, a <a href="https://amzn.to/3MwHyNv" target="blank">smart body weight scale</a> is your secret weapon in the battle for a healthier you. As opposed to a traditional scale, this high-tech marvel doesn't just measure your weight; it tracks body composition, body fat percentage, muscle mass, and more.</p>
                                <p>With all this data at your fingertips, you can make informed decisions about your fitness journey. No more flying blind&mdash;it's like being the pilot who knows every gust of wind and tailwind. So, if you're serious about leveling up your health and fitness game, grab a <a href="https://amzn.to/3MwHyNv" target="blank">smart body weight scale</a> and empower yourself with the knowledge you need to chart your course.</p>
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
                                <p> So, whether you're aiming to lose weight, gain muscle, or simply eat healthier, a calorie tracking app, such as <a href="https://cronometer.com/gold/signup/" target="blank">Cronometer</a>, will be your partner in crime. Get ready to track, learn, and conquer your nutritional adventures, one calorie at a time.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-8 mt-16">
                        <div class="p-6 pages">
                            <h2 class="text-5xl leading-tight 2xl:text-7xl 2xl:leading-tight text-center handwriting6">Need additional help?</h2>
                            <p class="text-3xl xl:text-5xl mt-4 text-center">We can assist with our 1-on-1 coaching!</p>
                            <div class="flex justify-center w-full text-2xl mt-6">
                                <a href="/coaching" class="inline-flex items-center py-2 px-8 pb-3 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white rounded-full text-center no-underline">Explore Coaching</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="flex flex-col lg:ml-10 lg:w-1/6">
                <div>
                    <div class="md:mt-14 flex justify-center text-secondary text-xl underline font:semi-bold">Uncover Your Fit Coaching</div>
                    <div class="flex justify-center">
                        <div class="py-2 flex justify-center w-1/2 lg:w-full">
                             <a href="/coaching"><img src="/images/coachingtm3.jpg" class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary" alt="A midlife woman sitting on couch having coaching session on computer"></a>
                        </div>
                    </div>
                    <button class="flex justify-center w-full text-base">
                        <a href="/coaching"  class="inline-flex items-center py-2 px-8 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary rounded-full text-white text-xs no-underline">Explore Coaching</a>
                    </button>
                </div>
                <div>
                    <div class="mt-4 flex justify-center text-secondary text-xl underline">Affiliate Websites</div>
                    <div class="font-bold py-2 ml-4 italic">The ads below take you to partner websites that sell products you might find helpful in your health and fitness journey. If you click on one of the ads and make a purchase, Uncover Your Fit will receive a small commission at no extra cost to you. As an Amazon Associate we earn from qualifying purchases from Amazon links.</div>
                    <div class="py-6 flex flex-col justify-center items-center">
                        <a class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary p-4" href="https://www.amazon.com/Bowflex-SelectTech-Adjustable-Dumbbells-Pair/dp/B001ARYU58?crid=KCZNUDYE70QL&keywords=adjustable%2Bdumbbell%2Bset&qid=1699630464&sprefix=adjust%2Caps%2C100&sr=8-6&th=1&linkCode=li3&tag=uncoveryour0c-20&linkId=725d32f13e53e15a8c8eb6b19977e634&language=en_US&ref_=as_li_ss_il" target="_blank"><img border="0" src="//ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B001ARYU58&Format=_SL250_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=uncoveryour0c-20&language=en_US" ></a><img src="https://ir-na.amazon-adsystem.com/e/ir?t=uncoveryour0c-20&language=en_US&l=li3&o=1&a=B001ARYU58" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
                        <p class="text-center mt-4"><a href="https://amzn.to/3SAny0s" target="blank">Bowflex Adjustable Dumbbells</a></p>
                    </div>
                    <div class="py-6 flex flex-col justify-center items-center">
                        <a class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary p-4" href="https://www.amazon.com/Tangle-Free-Jumping-Bearings-Adjustable-Handles/dp/B09DF9NWC7?crid=39CQ46P0R72RK&keywords=jump%2Brope&qid=1699630715&sprefix=jump%2Brope%2Caps%2C99&sr=8-2-spons&sp_csd=d2lkZ2V0TmFtZT1zcF9hdGY&th=1&linkCode=li3&tag=uncoveryour0c-20&linkId=09b9fca39bf9a42820fbf2f014e4d151&language=en_US&ref_=as_li_ss_il" target="_blank"><img border="0" src="//ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B09DF9NWC7&Format=_SL250_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=uncoveryour0c-20&language=en_US" ></a><img src="https://ir-na.amazon-adsystem.com/e/ir?t=uncoveryour0c-20&language=en_US&l=li3&o=1&a=B09DF9NWC7" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
                        <p class="text-center mt-4"><a href="https://amzn.to/47srXqs" target="blank">Fitness Jump Rope</a></p>
                    </div>
                    <div class="py-6 flex flex-col justify-center items-center">
                        <a class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary p-4" href="https://www.amazon.com/Stainless-Measuring-10-Piece-Kitchen-Gadgets/dp/B091JXDLDX?content-id=amzn1.sym.9e5188ef-9cc8-48bb-b834-24761033aedf%3Aamzn1.sym.9e5188ef-9cc8-48bb-b834-24761033aedf&cv_ct_cx=measuring%2Bcups&keywords=measuring%2Bcups&pd_rd_i=B091JXDLDX&pd_rd_r=47ddcaeb-529f-4353-89b4-57062b97abf0&pd_rd_w=NuCUo&pd_rd_wg=Hf03J&pf_rd_p=9e5188ef-9cc8-48bb-b834-24761033aedf&pf_rd_r=GDCCAAYF4SGASR2AAHR7&qid=1699631196&sbo=RZvfv%2F%2FHxDF%2BO5021pAnSA%3D%3D&sr=1-2-364cf978-ce2a-480a-9bb0-bdb96faa0f61-spons&sp_csd=d2lkZ2V0TmFtZT1zcF9zZWFyY2hfdGhlbWF0aWM&th=1&linkCode=li3&tag=uncoveryour0c-20&linkId=3a0be4e9e20badfc41997dcd1c0bfd30&language=en_US&ref_=as_li_ss_il" target="_blank"><img border="0" src="//ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B091JXDLDX&Format=_SL250_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=uncoveryour0c-20&language=en_US" ></a><img src="https://ir-na.amazon-adsystem.com/e/ir?t=uncoveryour0c-20&language=en_US&l=li3&o=1&a=B091JXDLDX" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
                        <p class="text-center mt-4"><a href="https://amzn.to/478uaHH" target="blank">TILUCK Measuring Cups & Spoons</a></p>
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
<x-accordion/>
</x-layout>

@section('title'){{'Damon Leach | Uncover Your Fit'}}@endsection
@section('description'){{'As a coach, I am passionate about helping others achieve optimal health and well-being without major disruptions to their lives.'}}@endsection
@section('author'){{'Damon Leach'}}@endsection
<x-layout>
<h1>TDEE Calculator</h1>

    <form method="POST" action="/tdee">
        @csrf
        <label for="weight">Weight (lbs):</label>
        <input type="number" name="weight" id="weight" required><br>

        <label for="height">Height (inches):</label>
        <input type="number" name="height" id="height" required><br>

        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required><br>

        <label for="gender">Gender:</label>
        <select name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br>

        <label for="activity_level">Activity Level:</label>
        <select name="activity_level" id="activity_level">
            <option value="sedentary">Sedentary</option>
            <option value="lightly_active">Lightly Active</option>
            <option value="moderately_active">Moderately Active</option>
            <option value="very_active">Very Active</option>
            <option value="super_active">Super Active</option>
        </select><br>

        <button type="submit">Calculate TDEE</button>
    </form>

    @if(isset($tdee))
    <h2>Your Total Daily Energy Expenditure (TDEE) is: {{ $tdee }} calories per day</h2>
@endif

<div class="relative">
        <div class="border-b border-zinc-300"><img src="/images/tdee4.jpg" alt="Picture of Damon Leach with the text life is a journey you only get to make once. Let's make your journey a great one." width="100%"></div>
        <div class="absolute inset-y-0 inset-x-8 md:inset-x-10 lg:inset-x-12 xl:inset-x-14 2xl:inset-x-16 w-11/12 flex justify-center flex-col">
            <h1 class="text-3xl leading-tight md:text-5xl md:leading-tight lg:text-6xl lg:leading-tight xl:text-7xl xl:leading-tight 2xl:text-8xl 2xl:leading-tight handwriting6 flex justify-center text-white text-center">TDEE Calculator</h1>
            <h2 class="lg:text-xl font-medium text-white text-center">Learn how many calories you burn every day with our Total Daily Energy Expenditure (TDEE) calculator</h2>
        </div>
    </div>
    <div class="mb-8 px-4 md:px-8 lg:px-16 xl:px-32 mt-8">
        <div class="transition duration-1000 hover:border hover:border-zinc-300 hover:bg-neutral-50 hover:shadow-lg hover:shadow-zinc-400 rounded-lg p-6">
            <div>
                <h2 class="text-5xl 2xl:text-7xl text-center handwriting6">What's your TDEE?</h2>
            </div>
            <div class="flex flex-col md:flex-row pages justify-center">
                <div class="md:w-1/2 md:mr-4 mt-8">
                    <p>Your Total Daily Energy Expenditure (TDEE) is like a recipe with two essential ingredients: your Basal Metabolic Rate (BMR) and an activity multiplier.</p>
                    <p>Think of your BMR as the energy your body expends while lounging on the couch, watching Netflix. But life isn't just couch time, right? So, we need to sprinkle in some extra calories to account for your daily activities, even if you're not doing extreme sports.</p>
                    <p>Our TDEE calculator is like a master chef. It combines the finest formulas to give you a TDEE that's not just a number but a clear, meaningful insight into your daily calorie needs.</p>
                </div>
                <div class="md:w-1/3 md:mt-5">
                    <form method="POST" action="/tdee" id="tdee">
                        @csrf
                        <label for="gender">Gender:</label>
                        <select name="gender" id="gender" required value="{{ old('gender') }}">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select><br>

                        <label for="age">Age:</label>
                        <input type="number" name="age" id="age" required value="{{ old('age') }}"><br>

                        <label for="weight">Weight:</label>
                        <input placeholder="lbs" type="number" name="weight" id="weight" required value="{{ old('weight') }}"><br>

                        <label for="height">Height:</label>
                        <div class="custom-select">
                            <select name="height" required>
                                @for ($feet = 4; $feet <= 7; $feet++)
                                    @for ($inches = 0; $inches <= 11; $inches++)
                                        <option value="{{ $feet * 12 + $inches }}" {{ old('height', 69) == ($feet * 12 + $inches) ? 'selected' : '' }}>
                                            {{ $feet }} feet {{ $inches }} inches
                                        </option>
                                    @endfor
                                @endfor
                            </select>
                        </div><br>

                        <label for="activity_level">Activity Level:</label>
                        <select name="activity_level" id="activity_level" required value="{{ old('activity_level') }}">
                            <option value="sedentary">Sedentary (Office Job)</option>
                            <option value="lightly_active">Light Exercise (1-2 Days/Week)</option>
                            <option value="moderately_active">Moderate Exercise (3-5 Days/Week)</option>
                            <option value="very_active">Heavy Exercise (6-7) Days/Week)</option>
                            <option value="super_active">Athlete (2x/Day)</option>
                        </select><br>

                        <button type="submit" class="text-sm xl:text-xl px-4 py-2 mt-2 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white rounded-full text-center inline-flex items-center">Calculate TDEE</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="response">
            @if(isset($tdee))
                <h3>Your Total Daily Energy Expenditure (TDEE) is:</h3>
                <p>{{ $tdee }} calories per day</p>
            @endif
        </div>
    </div>
<script>
    document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault();

        // Your form submission logic here (e.g., sending the form data using AJAX)

        // Scroll to the "response" div
        document.querySelector('#response').scrollIntoView({ behavior: 'smooth' });
    });
</script>














    <div class="border-b border-secondary lg:mt-16 xl:mt-20 2xl:mt-24"><img src="/images/damon24.jpg" alt="Picture of Damon Leach with the text life is a journey you only get to make once. Let's make your journey a great one." width="100%"></div>
    <div class="px-4 mt-4 md:px-8 lg:px-16 xl:px-32">
        <div class="flex pt-2">
            <div class="w-1/3 mr-16 md:mr-2">
                <div class="text-secondary text-3xl">About Damon</div>
            </div>
            <div class="border-b-2 border-primary w-1/3 md:w-2/3 mb-4"></div>
            <div class="border-b-2 border-primary w-1/3 md:w-2/3 mb-4"></div>
        </div>
    </div>
    <div class="mt-4 px-4 mb-6 md:px-8 lg:px-16 xl:px-32 pages">
        <img class="rounded-xl" style="float:right; margin-left: 2rem;" src="/images/fat.jpg" alt="The belly of a fat man in business attire"  >
        <p>Life is like a multifaceted diamond, with each facet representing a different aspect of our existence. Yet, as adults in the hustle and bustle of life, we often feel the pressure to focus on just one facet&#8212;usually our career. We buy into this notion that straying from that single-minded focus somehow diminishes our worth. Been there, done that. I was the guy who believed that my career was the be-all and end-all, and I clung to it for dear life, even as my health suffered in the shadows.</p>
        <p>You see, my friend, I'm no stranger to that struggle. I used to be overweight and out of shape, and I didn't even realize how much my well-being was taking a nosedive. But then, life decided to give me a wake-up call in the form of a serious health scare. Suddenly, I couldn't ignore the elephant on the treadmill any longer, and then it hit me like a ton of protein bars&#8212;I could excel in both my career and my personal life, and shocker, they could actually work together like peanut butter and jelly.</p>
        <p>So, I embarked on a mission to decipher the secrets of success in my career, and guess what? I found that the very qualities that propelled me up the corporate ladder could also be applied to living a healthy, fulfilling life. Knowledge is power, my friends, and I wielded it like Thor's hammer. I got certified in various areas of fitness and health coaching and rolled up my sleeves to create our Uncover Your Fit programs.</p>
        <p>Now, let me tell you, it wasn't a walk in the park. But through discipline and an insatiable thirst for knowledge, I turned my life around. In just a year, I went from a hefty 230 lbs to a lean and mean 175 lbs. Yep, you heard that right.</p>
        <img class="rounded-xl" style="float:left; margin-right: 2rem;" src="/images/wish.jpg" alt="A country scene with a tree, dirt road and text Stop Wishing Start Doing">
        <p class="ml-6">And now, as a coach, I'm on a mission to share the wealth of wisdom I've amassed. I want to help you achieve the kind of optimal health and well-being that doesn't require you to flip your life upside down. You see, I've witnessed firsthand the power of optimization in my clients. It's like finding that cheat code to a video game&#8212;suddenly, everything becomes clearer and more achievable.</p>
        <p>Right now, I'm living the dream in the suburbs of Baltimore, MD, with my wonderful wife, two amazing daughters, and a couple of cats who keep life interesting. We're all about that active lifestyle, and trust me, it's the secret sauce that helps us optimize every darn facet of our lives.</p>
        <p>So, if you're ready to ditch the one-dimensional thinking and start living your best, most optimized life, you've come to the right place. Let's embark on this journey together, and I promise, it's going to be one heck of a ride.</p>
    </div>
    <div class="px-4 pt-4 mb-4 md:px-8 lg:px-16 xl:px-32" style="clear:both">
        <div class="flex pt-2">
            <div class="w-1/3 mr-16 md:mr-2">
                <div class="text-secondary text-3xl">Credentials</div>
            </div>
            <div class="border-b-2 border-primary w-1/3 md:w-2/3 mb-4"></div>
            <div class="border-b-2 border-primary w-1/3 md:w-2/3 mb-4"></div>
        </div>
    </div>
    <div class="flex flex-col md:flex-row justify-center">
        <div class="px-4 mb-4 md:px-8 lg:px-16 xl:px-32 md:w-3/5">
            <h2 class="text-primary mb-2">Education</h2>
            <ul>
                <li>AS - Computer Technologies, Excelsior College</li>
                <li>BS - Education, Excelsior College</li>
                <li>MDE - Master of Distance Education, University of Maryland</li>
                <li>MS - Master of Management, University of Maryland</li>
                <li>Graduate Certificate - Teaching at a Distance, University of Maryland</li>
                <li>Graduate Certificate - Leadership in Distance Education, University of Maryland</li>
            </ul>
        </div>
        <div class="px-4 mb-4 md:px-8 lg:px-16 xl:px-32 md:w-3/5">
            <h2 class="text-primary mb-2">Certifications</h2>
            <ul>
                <li>Master Health Coach, Precision Nutrition (Pn)</li>
                <li>Health Coach, American Council on Exercise (ACE)</li>
                <li>Personal Trainer, ACE</li>
                <li>Behavioral Change Specialist, ACE</li>
                <li>Nutrition Coach, Pn</li>
                <li>Fitness Nutrition Specialist, ACE</li>
                <li>Weight Management Specialist, ACE</li>
                <li>Mind Body Specialist, ACE</li>
                <li>Sports Performance Specialist, ACE</li>
                <li>Functional Training Specialist, ACE</li>
                <li>Orthopedic Exercise Specialist, ACE</li>
                <li>Senior Fitness Specialist, ACE</li>
                <li>Youth Fitness Specialist, ACE</li>
                <li>Corrective Exercise Specialist, The Biomechanics Method</li>
            </ul>
        </div>
    </div>
</x-layout>

@section('title'){{"What the fittest people know that you don't."}}@endsection
@section('description'){{"It's not necessary to eat rice cakes and kill yourself in the gym every day to maintain a healthy weight and stay fit. Watch our webinar to learn more."}}@endsection
@section('author'){{'Damon Leach'}}@endsection
<x-layout>
    <div>
    @include('modals.webinar-reg')
    <div class="relative">
        <img class="border-b-2 border-secondary" src="/images/register8.jpg" alt="" width="100%">
        <div class="webreg_text">
            <h1>What the fittest people know that you don't:</h1>
            <p>It isn't necessary to eat rice cakes and kill yourself in the gym every day to maintain a healthy weight and stay fit.</br>(In fact, you can occasionally eat cake and be a couch potato.)</p>
            <a href="" @click.prevent="$modal.show('webinar-reg')"><button type="button">REGISTER FOR WEBINAR</button></a>
        </div>
        <!--<div class="register-overlay">
            <img src="/images/register.svg" alt="" width="70%">
        </div>
        <div class="uncover-button2 unbutton">
            <a href="" @click.prevent="$modal.show('webinar-reg')"><img  src="/images/registerwebinar.svg" alt="" width="15%"></a>
        </div>-->
    </div>
    <div class="mb-8 px-4 md:px-8 lg:px-16 xl:px-32">
        <div class="mt-2 flex flex-col md:flex-row">
            <div class="mx-auto md:w-1/2">
                 <div>
                    <h1 class="text-center text-secondary text-xl md:text-2xl lg:text-3xl xl:text-4xl mt-2 mb-2">In this free webinar, you're going to discover...</h1>
                </div>
                <ul>
                    <li>The 12-month coaching program that's helping our clients transform their lives and get off the diet roller coaster once and for all without the need to follow a draconian diet or fitness plan</li>
                    <li>Why "quick fix" self-directed exercise and nutrition programs fail 98% of the time</li>
                    <li>How raising self awareness about your health and wellness is key to helping you transform both your nutrition and fitness habits—once you understand why you do something, it is much easier to change</li>
                    <li>Why our habit-based coaching program focuses on turning small practices into daily habits</li>
                    <li>How your new habits will merge over the course of the 12-month program to form sustainable lifestyle changes that will no longer soley be part of some diet or exercise routine you do; rather, they will be part of who you are</li>
                </ul>
            </div>
            <div class="w-1/3 md:w-1/3 lg:w-1/4 mx-auto">
                <p class="text-center"><a href="damon"><img class="border-2 border-secondary" src="/images/damon3.jpg" alt=""></a>Presented by </br>Damon Leach</p>
                <p class="text-center text-xs md:text-sm">Damon Leach is the founder of Uncover Your Fit. He has spent years in the field of online training and holds multiple fitness certifications, inluding Health Coach and Personal Trainer.</p>
            </div>
        </div>
    </div>
<div class="text-center unbutton">
    <a href="" @click.prevent="$modal.show('webinar-reg')"><img src="/images/registerwebinar.svg" alt="" width="16%"></a>
</div>
</div>
</x-layout>

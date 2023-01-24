<form method="POST" action="{{ route('contact.post') }}">
  @csrf
    <!-- Name -->
      <div class="mt-4">
          <x-input-label for="name" :value="__('Full Name')" />
          <x-text-input placeholder="First and Last Name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>
    <!-- Email Address -->
      <div class="mt-4">
          <x-input-label for="email" :value="__('Email')" />
          <x-text-input placeholder="Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
    <!-- Message -->
      <div class="mt-4">
          <x-input-label for="message" :value="__('Message')" />
          <textarea rows="6" placeholder="Message" id="message" rows="3" class="block mt-1 w-full h-full" type="text" name="message" :value="old('message')" required autofocus /></textarea>
          <x-input-error :messages="$errors->get('message')" class="mt-2" />
      </div>
    <!-- ReCaptcha -->
      <div class="mt-4">
          <x-input-label for="g-recaptcha" :value="__('ReCaptcha')" />
          <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}" /></div>
          <x-input-error :messages="$errors->get('g-recaptcha-response')" class="mt-6" />
      </div>
    <x-primary-button class="mt-6">
      {{ __('Submit') }}
    </x-primary-button>
</form>

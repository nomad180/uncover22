<x-layout>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-center my-4">
                {{ __('Uncover Your Fit Purchase') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-secondary w-1/2">
                    <div class="p-6 text-gray-900">
                            <div class="mb-6 font-semibold flex justify-center">
                            Please complete your purchase using the form below.
                            </div>
                           <form id="payment-form" method="POST" action="{{ route('subscribe2.post') }}" class="mt-4">
                            @csrf
                            <div id="address-form">
                              <label for="address-element" class="underline text-lg">Address:</label>
                              <div id="address-element" class="mt-3">
                                <!-- Elements will create form elements here -->
                              </div>
                            </div>
                            <div class="mt-4 mb-4">
                              <input type="radio" name="plan" id="standard" value="price_1MG8CJJpvl5Jnrj8OessAULj" checked>
                              <label for="standard">Uncover Your Fit - $29/Month for 12 Months</label>
                            </div>
                            <div id="payment-element">
                              <!--Stripe.js injects the Payment Element-->
                            </div>
                            <button class="mt-6 w-full" id="smtbutton">
                              <div class="spinner hidden" id="spinner"></div>
                              <span class="bg-secondary text-white py-2 px-8 mt-4 hover:bg-primary rounded-xl">Submit Payment</span>
                            </button>
                            <div id="payment-message" class="hidden"></div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
            <script src="https://js.stripe.com/v3/"></script>

            <script>
                // This is your test publishable API key.
                const stripe = Stripe("pk_test_PRiglyumBDviljS7guqpxMOP");

                let elements;

                initialize();

                document
                .querySelector("#payment-form")
                .addEventListener("submit", handleSubmit);

                // Fetches a payment intent and captures the client secret
                function initialize() {
                  elements = stripe.elements({ clientSecret: "{{ $intent->client_secret }}" });

                  const paymentElementOptions = {
                    layout: "tabs",
                  };

                  const paymentElement = elements.create("payment", paymentElementOptions);
                  paymentElement.mount("#payment-element");
                }

                // Create and mount the Address Element in billing mode
                const addressElement = elements.create("address", {
                  mode: "billing",
                  defaultValues: {
                    name: '{{ Auth::user()->name }}',
                    address: {
                        line1: '{{ Auth::user()->street_address }}',
                        line2: '{{ Auth::user()->address_two }}',
                        city: '{{ Auth::user()->city }}',
                        state: 'MD',
                        postal_code: '{{ Auth::user()->zipcode }}',
                        country: 'US',
                    },
                  },
                });
                addressElement.mount("#address-element");

                addressElement.on('change', (event) => {
                  if (event.complete){
                    // Extract potentially complete address
                    const address = event.value.address;
                  }
                })

                async function handleSubmit(e) {
                e.preventDefault();

                const { setupIntent, error } = await stripe.confirmSetup({
                  elements,
                  confirmParams: {
                    // Make sure to change this to your payment completion page
                    return_url: "http://uncover:8080/dashboard",
                  },
                  redirect: 'if_required',
                });

                // This point will only be reached if there is an immediate error when
                // confirming the payment. Otherwise, your customer will be redirected to
                // your `return_url`. For some payment methods like iDEAL, your customer will
                // be redirected to an intermediate site first to authorize the payment, then
                // redirected to the `return_url`.
                if(error) {
                if (error.type === "card_error" || error.type === "validation_error") {
                  showMessage(error.message);
                } else {
                  showMessage("An unexpected error occurred.");
                }
                } else {
                    var form = document.getElementById('payment-form');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'paymentMethod');
                    hiddenInput.setAttribute('value', setupIntent.payment_method);
                    form.appendChild(hiddenInput);

                    form.submit();
                }
              }
              // ------- UI helpers -------

              function showMessage(messageText) {
                const messageContainer = document.querySelector("#payment-message");

                messageContainer.classList.remove("hidden");
                messageContainer.textContent = messageText;

                setTimeout(function () {
                  messageContainer.classList.add("hidden");
                  messageText.textContent = "";
                }, 4000);
              }
              // Show a spinner on payment submission
              function setLoading(isLoading) {
                if (isLoading) {
                  // Disable the button and show a spinner
                  document.querySelector("#smtbutton").disabled = true;
                  document.querySelector("#spinner").classList.remove("hidden");
                  document.querySelector("#button-text").classList.add("hidden");
                } else {
                  document.querySelector("#smtbutton").disabled = false;
                  document.querySelector("#spinner").classList.add("hidden");
                  document.querySelector("#button-text").classList.remove("hidden");
                }
              }
            </script>
        @endpush
        @push('styles')
          <style>

          </style>

        @endpush
    </x-app-layout>
</x-layout>

<x-layout>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-center my-4">
                {{ __('Uncover Your Fit Purchase') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg shadow-xl shadow-secondary/50 border border-secondary/30 w-1/2">
                    <div class="p-6 text-gray-900">
                          <div class="mb-6 font-semibold flex justify-center">
                            Please complete your purchase using the form below.
                          </div>
                           <form id="payment-form" method="POST" action="{{ route('charge.post') }}">
                            @csrf
                            <div>
                              <div type="text" id="cardholder-name" class="mt-4 p-3 w-full rounded-md border-gray-200 hidden">{{ Auth::user()->name }}</div>
                            </div>

                            <label for="card-element" class="mt-4 underline">Credit or Debit Card:</label>
                          <div id="card-element" class="mt-4 p-4 border border-gray-200 rounded-md">
                            <!-- Elements will create input elements here -->
                          </div>

                          <!-- We'll put the error messages in this element -->
                          <div id="card-errors" role="alert"></div>

                          <button id="smtbutton" class="bg-secondary text-white p-2 mt-4 hover:bg-primary rounded-xl">Submit Payment
                          </button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
            <script src="https://js.stripe.com/v3/"></script>

            <script>
              var stripe = Stripe('pk_test_PRiglyumBDviljS7guqpxMOP');
              var elements = stripe.elements();

              // Set up Stripe.js and Elements to use in checkout form
              var style = {
                base: {
                  color: "#32325d",
                }
              };

              //Create an instance of the card Element.
              var card = elements.create("card", { style: style });

              //Add an instanc of the card Element into the 'card-element' <div>.
              card.mount("#card-element");

              //Handle real-time validation errors from the card Element.
              card.on('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                  displayError.textContent = event.error.message;
                } else {
                  displayError.textContent = '';
                }
              });
                //Handle form submision
                var form = document.getElementById('payment-form');
                var cardHolderName = document.getElementById('cardholder-name');

                form.addEventListener('submit', async function(ev) {
                  ev.preventDefault();

                  const { paymentMethod, error } = await stripe.createPaymentMethod(
                        'card', card, {
                            billing_details: { name: cardHolderName.value }
                        }
                    );
                  if (error) {
                      // Inform the user if there was and error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = error.message;
                  } else {
                      // Send the token to your server.
                   stripeTokenHandler(paymentMethod);
                  }
                });

              //Submit the form with the token ID.
              function stripeTokenHandler(paymentMethod) {
                //Insert the token ID into the form, so it gets submitted to the server.
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'paymentMethod');
                hiddenInput.setAttribute('value', paymentMethod.id);
                form.appendChild(hiddenInput);

                //Submit the form.
                form.submit();
              }
            </script>
        @endpush
        @push('styles')
          <style>

          </style>

        @endpush
    </x-app-layout>
</x-layout>

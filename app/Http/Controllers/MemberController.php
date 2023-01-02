<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MemberController extends Controller
{
    public function show()
    {
        return view('stripe.charge');
    }
    public function dashboard()
    {
        return view('members.dashboard', [
        'posts' => Post::latest()
        ->paginate(3)->withQueryString(),
        'products' => Product::latest()
        ->paginate(3)->withQueryString(),
    ]);
    }
    public function uncoveryourfit()
    {
        return view('members.uncoveryourfit', [
            'lessons' => Lesson::oldest()
            ->paginate(9)->withQueryString(),
        ]);
    }
    public function chargepost(Request $request)
    {
       try {
        auth()->user()->createOrGetStripeCustomer();
        auth()->user()->updateDefaultPaymentMethod($request->paymentMethod);
        auth()->user()->invoiceFor("Uncover Your Fit - Let's Get Motivated", 34900);
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
        return redirect('/dashboard')->with('success', 'Your payment was successful! You can access your payment details in your account settings.');
    }
}


/*
Route::get('/subscribe', function (User $user) {
    return view('stripe.subscribe', [ 'intent' => $user->createSetupIntent(),]);
})->middleware(['auth', 'verified', 'nonPayingCustomer', 'payingCustomer'])->name('subscribe');
Route::post('/subscribe', function (Request $request) {
    $request->user()->newSubscription(
        'cashier', $request->plan
    )->create($request->paymentMethod);
    return redirect('/dashboard');
})->middleware(['auth', 'verified', 'nonPayingCustomer', 'payingCustomer'])->name('subscribe.post');

Route::get('/subscribe2', function (User $user) {
    return view('stripe.subscribe2', [ 'intent' => $user->createSetupIntent(),]);
})->middleware(['auth', 'verified', 'nonPayingCustomer', 'payingCustomer'])->name('subscribe2');

Route::post('/subscribe2', function (Request $request) {
    $request->user()->newSubscription(
        'cashier', $request->plan
    )->create($request->paymentMethod);

    return redirect('/dashboard')->with('success', 'Your payment was successful! You can access your payment details in your account settings.');
})->middleware(['auth', 'verified', 'nonPayingCustomer', 'payingCustomer'])->name('subscribe2.post');
*/

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        try {
            $newsletter->subscribe(request('email'));

        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email is already signed up for our program launch.'
            ]);
        }
        return back()
            ->with('success', 'You are now signed up to get an invitation to our program launch!');
        }
}

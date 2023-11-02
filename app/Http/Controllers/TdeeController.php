<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TdeeController extends Controller
{
    public function index()
    {
        return view('pages.tdee');
    }
    public function calculateTdee(Request $request)
    {
        // Validation rules
        $rules = [
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'age' => 'required|numeric',
            'gender' => 'required|in:male,female',
            'activity_level' => 'required|in:sedentary,lightly_active,moderately_active,very_active,super_active',
        ];

        // Validate the request data
        $this->validate($request, $rules);

        // Store the input data in the session
        $request->flash();

        // Retrieve user input from the form
        $weightInPounds = $request->input('weight');
        $heightInInches = $request->input('height');
        $age = $request->input('age');
        $gender = $request->input('gender');
        $activityLevel = $request->input('activity_level');

        // Convert weight from pounds to kilograms (1 pound = 0.45359237 kilograms)
        $weightInKg = $weightInPounds * 0.45359237;

        // Convert height from inches to centimeters (1 inch = 2.54 centimeters)
        $heightInCm = $heightInInches * 2.54;

        // Perform the TDEE calculation based on the formulas
        if ($gender === 'male') {
            $bmr = 10 * $weightInKg + 6.25 * $heightInCm - 5 * $age + 5;
        } else {
            $bmr = 10 * $weightInKg + 6.25 * $heightInCm - 5 * $age - 161;
        }

        $activityFactors = [
            'sedentary' => 1.2,
            'lightly_active' => 1.375,
            'moderately_active' => 1.55,
            'very_active' => 1.725,
            'super_active' => 1.9,
        ];

        // Calculate TDEE based on the selected activity level
        $tdee = $bmr * $activityFactors[$activityLevel];

        // Calculate TDEE for the week
        $twee = $bmr * $activityFactors[$activityLevel] * 7;

        // Calculate calories burned for different activity levels
        $caloriesSedentary = $bmr * $activityFactors['sedentary'];
        $caloriesLightActivity = $bmr * $activityFactors['lightly_active'];
        $caloriesModerateActivity = $bmr * $activityFactors['moderately_active'];
        $caloriesVigorousActivity = $bmr * $activityFactors['very_active'];
        $caloriesSuperActive = $bmr * $activityFactors['super_active'];

        // Calculate ideal weight using JD Robinson formula in kilograms
        if ($gender === 'male') {
            $idealWeightKg = 52 + 1.9 * ($heightInInches - 60);
        } else {
            $idealWeightKg = 49 + 1.7 * ($heightInInches - 60);
        }

        // Convert ideal weight to pounds
        $idealWeight = $idealWeightKg * 2.20462;

        // Calculate BMI
        $bmi = ($weightInPounds / ($heightInInches * $heightInInches)) * 703;

        // Calculate maximum muscular potential (e.g., using a reference formula)
        // Adjust the formula as needed
        $maxMuscularPotential = ($heightInCm - 100) * 2.2;
        $maxMuscularPotentialt = $maxMuscularPotential / 0.95;
        $maxMuscularPotentialf = $maxMuscularPotential / 0.90;

        // Round down to the nearest integer
        $tdee = intval($tdee);
        $twee = intval($twee);
        $caloriesSedentary = intval($caloriesSedentary);
        $caloriesLightActivity = intval($caloriesLightActivity);
        $caloriesModerateActivity = intval($caloriesModerateActivity);
        $caloriesVigorousActivity = intval($caloriesVigorousActivity);
        $caloriesSuperActive = intval($caloriesSuperActive);
        $bmi = intval($bmi);
        $maxMuscularPotential = intval($maxMuscularPotential);
        $maxMuscularPotentialt = intval($maxMuscularPotentialt);
        $maxMuscularPotentialf = intval($maxMuscularPotentialf);
        $idealWeight = intval($idealWeight);
        $bmr = intval($bmr);

        //Format with commas
        $tdee = number_format($tdee);
        $twee = number_format($twee);
        $bmr = number_format($bmr);
        $caloriesSedentary = number_format($caloriesSedentary);
        $caloriesLightActivity = number_format($caloriesLightActivity);
        $caloriesModerateActivity = number_format($caloriesModerateActivity);
        $caloriesVigorousActivity = number_format($caloriesVigorousActivity);
        $caloriesSuperActive = number_format($caloriesSuperActive);


        // Define $tdee and set it to the calculated value
        $viewData = [
            'tdee' => $tdee,
            'twee' => $twee,
            'caloriesSedentary' => $caloriesSedentary,
            'caloriesLightActivity' => $caloriesLightActivity,
            'caloriesModerateActivity' => $caloriesModerateActivity,
            'caloriesVigorousActivity' => $caloriesVigorousActivity,
            'caloriesSuperActive' => $caloriesSuperActive,
            'bmi' => $bmi,
            'maxMuscularPotential' => $maxMuscularPotential,
            'maxMuscularPotentialt' => $maxMuscularPotentialt,
            'maxMuscularPotentialf' => $maxMuscularPotentialf,
            'idealWeight' => $idealWeight,
            'bmr' => $bmr,
        ];

        return view('pages.tdee', $viewData);
    }
}

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
            'bodyfat' => 'nullable|numeric|min:0|max:100',
        ];

        // Validate the request data
        $this->validate($request, $rules);

        // Store the input data in the session
        $request->flash();


        // Retrieve user input from the form
        $covertunit = $request->input('covertunit');
        $weight = $request->input('weight');
        $height = $request->input('height');
        $age = $request->input('age');
        $gender = $request->input('gender');
        $activityLevel = $request->input('activity_level');
        $bodyFatPercentage = $request->input('bodyfat');

        // Convert weight and height based on the unit system
        if ($covertunit == 'imperial') {
            // Convert weight from pounds to kilograms (1 pound = 0.45359237 kilograms)
            $weightInKg = $weight * 0.45359237;

            // Convert height from inches to centimeters (1 inch = 2.54 centimeters)
            $heightInCm = $height * 2.54;
        } else {
            // Assume weight is already in kilograms
            $weightInKg = $weight;

            // Assume height is already in centimeters
            $heightInCm = $height;
        }
        // Calculate Lean Body Mass
        $leanBodyMass = ($bodyFatPercentage) ? $weightInKg * (1 - $bodyFatPercentage / 100) : $weightInKg;

        // Perform the TDEE calculation based on the formulas
            //See if body fat was input
            if ($bodyFatPercentage) {
                $bmr = 370 + (21.6 * $leanBodyMass);
            } else {
                if ($covertunit == 'imperial') {
                    if ($gender === 'male') {
                        $bmr = 10 * $leanBodyMass + 6.25 * $heightInCm - 5 * $age + 5;
                    } else {
                        $bmr = 10 * $leanBodyMass + 6.25 * $heightInCm - 5 * $age - 161;
                    }
                } else {
                    if ($gender === 'male') {
                        $bmr = 10 * $leanBodyMass + 6.25 * $height - 5 * $age + 5;
                    } else {
                        $bmr = 10 * $leanBodyMass + 6.25 * $height - 5 * $age - 161;
                    }
                }
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

        //Macronutrients
        $bulk = $tdee + 500;
        $cut = $tdee - 500;
        $mp = $tdee * 0.20 / 4;
        $mc = $tdee * 0.50 / 4;
        $mf = $tdee * 0.30 / 9;
        $bp = $bulk * 0.25 / 4;
        $bc = $bulk * 0.55 / 4;
        $bf = $bulk * 0.20 / 9;
        $cp = $cut * 0.35 / 4;
        $cc = $cut * 0.40 / 4;
        $cf = $cut * 0.25 / 9;

        // Calculate calories burned for different activity levels
        $caloriesSedentary = $bmr * $activityFactors['sedentary'];
        $caloriesLightActivity = $bmr * $activityFactors['lightly_active'];
        $caloriesModerateActivity = $bmr * $activityFactors['moderately_active'];
        $caloriesVigorousActivity = $bmr * $activityFactors['very_active'];
        $caloriesSuperActive = $bmr * $activityFactors['super_active'];

        // Calculate ideal weight using JD Robinson formula in kilograms
        if ($covertunit == 'imperial') {
            if ($gender === 'male') {
                $idealWeightKg = 52 + 1.9 * ($height - 60);
            } else {
                $idealWeightKg = 49 + 1.7 * ($height - 60);
            }
        } else {
            if ($gender === 'male') {
                $idealWeightKg = 52 + 1.9 * (($height / 2.54) - 60);
            } else {
                $idealWeightKg = 49 + 1.7 * (($height / 2.54) - 60);
            }
        }

        // Calculate ideal weight and bmi
        if ($covertunit == 'imperial') {
            // Convert ideal weight to pounds
            $idealWeight = $idealWeightKg * 2.20462;

            // Calculate BMI
            $bmi = ($weightInKg / $heightInCm / $heightInCm) * 10000;
        } else {
            // Assume weight is already in kilograms
            $idealWeight = $idealWeightKg;
            // Calculate BMI
            $bmi = ($weight / $height / $height) * 10000;
        }

        // Calculate maximum muscular potential (e.g., using a reference formula)
        // Adjust the formula as needed
        if ($covertunit == 'imperial') {
            $maxMuscularPotential = ($heightInCm - 100) * 2.2;
            $maxMuscularPotentialt = $maxMuscularPotential / 0.95;
            $maxMuscularPotentialf = $maxMuscularPotential / 0.90;
        } else {
            $maxMuscularPotential = ($heightInCm - 100);
            $maxMuscularPotentialt = $maxMuscularPotential / 0.95;
            $maxMuscularPotentialf = $maxMuscularPotential / 0.90;
        }

        // Round down to the nearest integer
        $tdee = intval($tdee);
        $twee = intval($twee);
        $bulk = intval($bulk);
        $cut = intval($cut);
        $mp = intval($mp);
        $mc = intval($mc);
        $mf = intval($mf);
        $bp = intval($bp);
        $bc = intval($bc);
        $bf = intval($bf);
        $cp = intval($cp);
        $cc = intval($cc);
        $cf = intval($cf);
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
        $bulk = number_format($bulk);
        $cut = number_format($cut);
        $mp = number_format($mp);
        $mc = number_format($mc);
        $mf = number_format($mf);
        $bp = number_format($bp);
        $bc = number_format($bc);
        $bf = number_format($bf);
        $cp = number_format($cp);
        $cc = number_format($cc);
        $cf = number_format($cf);
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
            'bulk' => $bulk,
            'cut' => $cut,
            'mp' => $mp,
            'mc' => $mc,
            'mf' => $mf,
            'bp' => $bp,
            'bc' => $bc,
            'bf' => $bf,
            'cp' => $cp,
            'cc' => $cc,
            'cf' => $cf,
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
            'weight' => $weight,
            'weightInKg' => $weightInKg,
            'idealWeight' => $idealWeight,
            'bmr' => $bmr,
            'bodyFatPercentage' => $bodyFatPercentage,
        ];

        return view('pages.tdee', $viewData);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\GymExercise;
use Illuminate\Http\Request;

class GymExerciseController extends Controller
{
    public function index()
{
    $exercises = GymExercise::all();
    return view('dashboard', compact('exercises'));
}

    public function create()
    {
        return view('gym_exercises.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sets' => 'required|integer',
            'reps' => 'required|integer'
        ]);

        GymExercise::create($request->all());
        return redirect()->route('gym_exercises.index');
    }

    public function edit(GymExercise $exercise)
    {
        return view('gym_exercises.edit', compact('exercise'));
    }

    public function update(Request $request, GymExercise $exercise)
    {
        $request->validate([
            'name' => 'required',
            'sets' => 'required|integer',
            'reps' => 'required|integer'
        ]);
        
        $exercise->update($request->all());
        return redirect()->route('gym_exercises.index');
    }

    public function destroy(GymExercise $exercise)
    {
        $exercise->delete();
        return redirect()->route('gym_exercises.index');
    }

    public function toggleCompletion(GymExercise $exercise)
    {
        $exercise->completed = !$exercise->completed;
        $exercise->save();
        return redirect()->route('gym_exercises.index');
    }
    public function show(GymExercise $exercise)
{
    return view('gym_exercises.show', compact('exercise'));
}

public function toggle($id)
{
    $exercise = GymExercise::findOrFail($id);
    $exercise->completed = !$exercise->completed;
    $exercise->save();

    return redirect()->route('dashboard')->with('success', 'Exercise status updated!');
}
}
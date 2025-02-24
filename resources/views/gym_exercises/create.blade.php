@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Add New Exercise</h1>
    
    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <form method="POST" action="{{ route('gym_exercises.store') }}" class="space-y-4">
            @csrf
            
            <div>
                <label for="name" class="block text-gray-700 font-semibold">Exercise Name:</label>
                <input type="text" name="name" id="name" required class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label for="sets" class="block text-gray-700 font-semibold">Sets:</label>
                <input type="number" name="sets" id="sets" required class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label for="reps" class="block text-gray-700 font-semibold">Reps:</label>
                <input type="number" name="reps" id="reps" required class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition">Save Exercise</button>
        </form>
    </div>
@endsection

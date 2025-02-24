@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">{{ $exercise->name }}</h1>
    
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
        <p class="text-lg"><strong>Sets:</strong> {{ $exercise->sets }}</p>
        <p class="text-lg"><strong>Reps:</strong> {{ $exercise->reps }}</p>
        <p class="text-lg">
            <strong>Status:</strong> 
            @if ($exercise->completed)
                <span class="text-green-600 font-bold">✔ Completed</span>
            @else
                <span class="text-red-600 font-bold">✘ Not Done</span>
            @endif
        </p>
        
        <a href="{{ route('gym_exercises.index') }}" class="mt-4 inline-block bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition">Back to List</a>
    </div>
@endsection

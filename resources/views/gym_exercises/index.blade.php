@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Exercise List</h1>
    
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
        <a href="{{ route('gym_exercises.create') }}" class="block w-full text-center bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition">Add New Exercise</a>
        
        <ul class="mt-6 space-y-4">
            @foreach ($exercises as $exercise)
                <li class="flex flex-col bg-gray-100 p-4 rounded-lg shadow-md">
                    <div class="flex justify-between items-center">
                        <span class="font-semibold">{{ $exercise->name }} - {{ $exercise->sets }} sets x {{ $exercise->reps }} reps</span>
                        @if ($exercise->completed)
                            <span class="text-green-600 font-bold">✔ Completed</span>
                        @else
                            <span class="text-red-600 font-bold">✘ Not Done</span>
                        @endif
                    </div>
                    
                    <div class="flex space-x-2 mt-2">
                        <a href="{{ route('gym_exercises.edit', $exercise) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600 transition">Edit</a>
                        
                        <form method="POST" action="{{ route('gym_exercises.toggle', $exercise) }}">
                            @csrf @method('PATCH')
                            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 transition">Toggle Completion</button>
                        </form>
                        
                        <form method="POST" action="{{ route('gym_exercises.destroy', $exercise) }}">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
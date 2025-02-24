@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Gym Exercises</h1>
    
    <div class="mb-8">
        <h2 class="text-xl font-semibold text-green-600">✔ Completed Exercises</h2>
        <table class="w-full border-collapse border border-gray-300 mt-2">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Exercise</th>
                    <th class="border border-gray-300 px-4 py-2">Sets</th>
                    <th class="border border-gray-300 px-4 py-2">Reps</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($exercises->where('completed', true) as $exercise)
                    <tr class="text-center">
                        <td class="border border-gray-300 px-4 py-2">{{ $exercise->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $exercise->sets }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $exercise->reps }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('gym_exercises.edit', $exercise->id) }}" 
                               class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
                            <form action="{{ route('gym_exercises.toggle', $exercise->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Mark as Incomplete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mb-8">
        <h2 class="text-xl font-semibold text-red-600">✘ Incomplete Exercises</h2>
        <table class="w-full border-collapse border border-gray-300 mt-2">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Exercise</th>
                    <th class="border border-gray-300 px-4 py-2">Sets</th>
                    <th class="border border-gray-300 px-4 py-2">Reps</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($exercises->where('completed', false) as $exercise)
                    <tr class="text-center">
                        <td class="border border-gray-300 px-4 py-2">{{ $exercise->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $exercise->sets }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $exercise->reps }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('gym_exercises.edit', $exercise->id) }}" 
                               class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
                            <form action="{{ route('gym_exercises.toggle', $exercise->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Mark as Complete</button>
                            </form>
                            <form action="{{ route('gym_exercises.destroy', $exercise->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('gym_exercises.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add New Exercise</a>
    </div>
@endsection

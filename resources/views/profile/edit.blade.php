<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <!-- Hidden User ID Field -->
                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <!-- Name Field -->
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
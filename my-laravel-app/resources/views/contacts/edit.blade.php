@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-2xl mx-auto">
        <!-- Header Section -->
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edit Contact</h1>

        <!-- Form Section -->
        <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input type="text" name="name" id="name" value="{{ $contact->name }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm"
                       required>
            </div>

            <!-- Phone Field -->
            <div class="mb-6">
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ $contact->phone }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm"
                       required>
            </div>

            <!-- Email Field -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ $contact->email }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm"
                       required>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between">
                <a href="{{ route('contacts.index') }}"
                   class="bg-gray-600 text-black font-semibold py-2 px-6 rounded-md shadow-md">
                    Back
                </a>
                <button type="submit"
                        class="bg-yellow-600 text-black font-semibold py-2 px-6 rounded-md shadow-md">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

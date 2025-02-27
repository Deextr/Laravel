@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-2xl mx-auto">
        <!-- Header Section -->
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Add New Contact</h1>

        <!-- Form Section -->
        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input type="text" name="name" id="name" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500" 
                       placeholder="Enter name" required>
            </div>
            <div class="mb-6">
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                <input type="text" name="phone" id="phone" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500" 
                       placeholder="Enter phone number" required>
            </div>
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" id="email" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500" 
                       placeholder="Enter email" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" 
                        class="bg-yellow-600 hover:bg-yellow-700 text-black font-semibold py-2 px-6 rounded-md shadow-md transition duration-200 ease-in-out transform hover:scale-105">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">My Contacts</h1>
            <a href="{{ route('contacts.create') }}" 
               class="bg-yellow-600 hover:bg-yellow-700 text-black font-semibold py-2 px-5 rounded-md shadow-md transition duration-200 ease-in-out transform hover:scale-105">
                + Add New Contact
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Contacts Table -->
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse border border-gray-300 bg-white shadow-sm rounded-lg">
                <thead class="bg-gray-100">
                    <tr class="text-gray-700">
                        <th class="py-3 px-4 border-b text-left">Name</th>
                        <th class="py-3 px-4 border-b text-left">Phone</th>
                        <th class="py-3 px-4 border-b text-left">Email</th>
                        <th class="py-3 px-4 border-b text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($contacts as $contact)
                        <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                            <td class="py-3 px-4 text-gray-900 align-middle">{{ $contact->name }}</td>
                            <td class="py-3 px-4 text-gray-900 align-middle">{{ $contact->phone }}</td>
                            <td class="py-3 px-4 text-gray-900 align-middle">{{ $contact->email }}</td>
                            <td class="py-3 px-4 text-center align-middle">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('contacts.edit', $contact) }}" 
                                       class="bg-yellow-600 hover:bg-yellow-700 text-black py-1 px-4 rounded-md shadow-sm transition duration-200 ease-in-out transform hover:scale-105">
                                        Edit
                                    </a>
                                    <form action="{{ route('contacts.destroy', $contact) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-600 hover:bg-red-700 text-white py-1 px-4 rounded-md shadow-sm transition duration-200 ease-in-out transform hover:scale-105"
                                            onclick="return confirm('Are you sure you want to delete this contact?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- No Contacts Found -->
        @if($contacts->isEmpty())
            <p class="text-gray-600 text-center mt-6">No contacts found. Start by adding a new contact.</p>
        @endif
    </div>
</div>
@endsection
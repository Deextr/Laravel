<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800">Contact Management</h2>
    </x-slot>

    <div class="py-10">
        <!-- Fixed-width container -->
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-xl"> <!-- Reduced max-width to max-w-2xl -->
            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-500 text-white p-3 mb-6 rounded-lg shadow-sm text-center">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Add Contact Form -->
            <form action="{{ route('contacts.store') }}" method="POST" class="mb-8">
                @csrf
                <div class="space-y-4"> <!-- Use space-y-4 for vertical spacing -->
                    <!-- Name Field -->
                    <div>
                        <input type="text" name="name" placeholder="Name" class="p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 w-full" required>
                    </div>
                    <!-- Phone Field -->
                    <div>
                        <input type="text" name="phone" placeholder="Phone" class="p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 w-full" required>
                    </div>
                    <!-- Email Field -->
                    <div>
                        <input type="email" name="email" placeholder="Email" class="p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 w-full" required>
                    </div>
                </div>
                <!-- Add Contact Button -->
                <div class="mt-6">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 shadow-md w-full md:w-auto">
                        Add Contact
                    </button>
                </div>
            </form>

            <!-- Contact List -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="p-4 text-left">Name</th>
                            <th class="p-4 text-left">Phone</th>
                            <th class="p-4 text-left">Email</th>
                            <th class="p-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($contacts as $contact)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="p-4">{{ $contact->name }}</td>
                            <td class="p-4">{{ $contact->phone }}</td>
                            <td class="p-4">{{ $contact->email }}</td>
                            <td class="p-4">
                                <div class="flex space-x-4">
                                    <a href="{{ route('contacts.edit', $contact->id) }}" class="text-blue-600 hover:text-blue-800 transition duration-200">Edit</a>
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition duration-200">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Contact
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="name">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $contact->name) }}"
                                class="border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        </div>

                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone', $contact->phone) }}"
                                class="border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        </div>

                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $contact->email) }}"
                                class="border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        </div>

                        <div class="mt-4 flex space-x-2">
                            <button type="submit"
                            class="px-4 py-2 !bg-green-600 !text-white font-semibold rounded-md shadow-md hover:!bg-green-700 
                            focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                                Update
                            </button>
                            <a href="{{ route('contacts.index') }}"
                            class="px-4 py-2 !bg-red-600 !text-white font-semibold rounded-md shadow-md hover:!bg-red-700 
                            focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                Cancel
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

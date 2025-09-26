<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile Info') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="space-y-16">

            <!-- Profile Information -->
             <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">

                <header class="mb-4">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Profile Information') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __("Update your account's profile information and email address.") }}
                    </p>
                </header>

                <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data"
                    class="space-y-6">

                    @csrf
                    @method('patch')
                    <!-- Profile Photo -->
                    <div>
                        <label for="profile_photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Profile Photo
                        </label>

                        @if (Auth::user()->profile_photo)
                            <div class="my-2">
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo"
                                    class="h-20 w-20 rounded-full object-cover">
                            </div>
                        @endif

                        <input id="profile_photo" name="profile_photo" type="file"
                            class="w-full border rounded p-2 dark:bg-gray-900 dark:text-gray-300">
                    </div>

                    <!-- Name -->
                    <div>
                        <label for="name"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                        <input id="name" name="name" type="text"
                            value="{{ old('name', Auth::user()->name) }}"
                            class="w-full border rounded p-2 dark:bg-gray-900 dark:text-gray-300">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input id="email" name="email" type="email"
                            value="{{ old('email', Auth::user()->email) }}"
                            class="w-full border rounded p-2 dark:bg-gray-900 dark:text-gray-300">
                    </div>

                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md border border-black hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Save
                    </button>

                </form>
            </div>

            <!-- Update Password -->
             <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">

                <header class="mb-4">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Update Password') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Ensure your account is using a long, random password to stay secure.') }}
                    </p>
                </header>

                <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    @method('put')

                    <!-- Current Password -->
                    <div>
                        <label for="current_password"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Current Password</label>
                        <input id="current_password" name="current_password" type="password"
                            class="w-full border rounded p-2 dark:bg-gray-900 dark:text-gray-300">
                    </div>

                    <!-- New Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">New
                            Password</label>
                        <input id="password" name="password" type="password"
                            class="w-full border rounded p-2 dark:bg-gray-900 dark:text-gray-300">
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            class="w-full border rounded p-2 dark:bg-gray-900 dark:text-gray-300">
                    </div>

                    <button type="submit"
                        class="inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded-md border border-black hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Save
                    </button>

                </form>
            </div>

            <!-- Delete Account -->
             <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">

                <header class="mb-4">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Delete Account') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                    </p>
                </header>

                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        {{ __('Delete Account') }}
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>

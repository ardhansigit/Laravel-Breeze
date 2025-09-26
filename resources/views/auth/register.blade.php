<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Infinity Dashboard - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0f172a;
        }
        .register-container {
            background-color: #1a202c;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-radius: 1rem;
            max-width: 28rem;
        }
        .cta-button {
            background-color: #10b981;
            transition: background-color 0.2s ease-in-out;
        }
        .cta-button:hover {
            background-color: #047857;
        }
        input:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.5);
        }
    </style>
</head>

<body class="antialiased flex items-center justify-center min-h-screen">
    <div class="register-container p-8 w-full text-white">
        <h1 class="text-3xl font-bold text-center mb-6">
            <span class="text-teal-400">Register</span> for Infinity Dashboard
        </h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-400">{{ __('Name') }}</label>
                <input id="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-600 bg-gray-700 text-white focus:ring-teal-500 focus:border-teal-500" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                @error('name')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Username -->
            <div class="mt-4">
                <label for="username" class="block text-sm font-medium text-gray-400">{{ __('Username') }}</label>
                <input id="username" class="block mt-1 w-full rounded-md shadow-sm border-gray-600 bg-gray-700 text-white focus:ring-teal-500 focus:border-teal-500" type="text" name="username" value="{{ old('username') }}" required autocomplete="username" />
                @error('username')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-400">{{ __('Email') }}</label>
                <input id="email" class="block mt-1 w-full rounded-md shadow-sm border-gray-600 bg-gray-700 text-white focus:ring-teal-500 focus:border-teal-500" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" />
                @error('email')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-400">{{ __('Password') }}</label>
                <input id="password" class="block mt-1 w-full rounded-md shadow-sm border-gray-600 bg-gray-700 text-white focus:ring-teal-500 focus:border-teal-500"
                       type="password"
                       name="password"
                       required autocomplete="new-password" />
                @error('password')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-400">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" class="block mt-1 w-full rounded-md shadow-sm border-gray-600 bg-gray-700 text-white focus:ring-teal-500 focus:border-teal-500"
                       type="password"
                       name="password_confirmation" required autocomplete="new-password" />
                @error('password_confirmation')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-6">
                <a class="underline text-sm text-gray-400 hover:text-white" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit" class="cta-button w-full text-white font-bold py-3 px-4 rounded-md shadow-lg transition duration-200 mt-4">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</body>
</html>

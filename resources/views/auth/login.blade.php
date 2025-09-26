<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Infinity Dashboard - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0f172a;
        }
        .login-container {
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
    <div class="login-container p-8 w-full text-white">
        <h1 class="text-3xl font-bold text-center mb-6">
            <span class="text-teal-400">Log In</span> to Infinity Dashboard
        </h1>

        <!-- Session Status -->
        <div class="mb-4 text-sm text-green-600 dark:text-green-400">
            @if (session('status'))
                {{ session('status') }}
            @endif
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address & username -->
            <div>
                <label for="id_user" class="block text-sm font-medium text-gray-400">{{ __('Email or Username') }}</label>
                <input id="id_user" class="block mt-1 w-full rounded-md shadow-sm border-gray-600 bg-gray-700 text-white focus:ring-teal-500 focus:border-teal-500" type="text" name="id_user" value="{{ old('id_user') }}" required autofocus autocomplete="id_user" />
                @error('id_user')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-400">{{ __('Password') }}</label>
                <input id="password" class="block mt-1 w-full rounded-md shadow-sm border-gray-600 bg-gray-700 text-white focus:ring-teal-500 focus:border-teal-500"
                       type="password"
                       name="password"
                       required autocomplete="current-password" />
                @error('password')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="block mt-4 flex justify-between items-center">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-600 text-teal-500 shadow-sm focus:ring-teal-500" name="remember">
                    <span class="ml-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-400 hover:text-white" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-end mt-6">
                <button type="submit" class="cta-button w-full text-white font-bold py-3 px-4 rounded-md shadow-lg transition duration-200">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
</body>
</html>

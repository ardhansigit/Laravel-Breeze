<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Infinity Dashboard - Forgot Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0f172a;
        }
        .form-container {
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
    <div class="form-container p-8 w-full text-white">
        <h1 class="text-3xl font-bold text-center mb-6">
            <span class="text-teal-400">Forgot</span> Your Password?
        </h1>

        <div class="mb-4 text-sm text-gray-400">
            {{ __('Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <div class="mb-4 text-sm text-green-600 dark:text-green-400">
            @if (session('status'))
                {{ session('status') }}
            @endif
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-400">{{ __('Email') }}</label>
                <input id="email" class="block mt-1 w-full rounded-md shadow-sm border-gray-600 bg-gray-700 text-white focus:ring-teal-500 focus:border-teal-500" type="email" name="email" value="{{ old('email') }}" required autofocus />
                @error('email')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-6">
                <button type="submit" class="cta-button w-full text-white font-bold py-3 px-4 rounded-md shadow-lg transition duration-200">
                    {{ __('SUBMIT') }}
                </button>
            </div>
        </form>
    </div>
</body>
</html>

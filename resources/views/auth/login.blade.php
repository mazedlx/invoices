<!DOCTYPE html>
<html class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta
        http-equiv="X-UA-Compatible"
        content="IE=edge"
    >
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    <div class="flex items-center justify-center min-h-full px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <x-fas-money-bill-alt class="w-auto h-12 mx-auto text-gray-800" />
            </div>
            <form
                class="mt-8 space-y-6"
                action="{{ route('login') }}"
                method="POST"
            >
                @csrf
                <input
                    type="hidden"
                    name="remember"
                    value="true"
                >
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label
                            for="email-address"
                            class="sr-only"
                        >Email address</label>
                        <input
                            id="email-address"
                            name="email"
                            type="email"
                            autocomplete="email"
                            required
                            class="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none rounded-t-md focus:outline-none focus:ring-gray-800 focus:border-gray-800 focus:z-10 sm:text-sm"
                            placeholder="Email address"
                        >
                    </div>
                    <div>
                        <label
                            for="password"
                            class="sr-only"
                        >Password</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            required
                            class="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none rounded-b-md focus:outline-none focus:ring-gray-800 focus:border-gray-800 focus:z-10 sm:text-sm"
                            placeholder="Password"
                        >
                    </div>
                </div>

                <div>
                    <button
                        type="submit"
                        class="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md group hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800"
                    >
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <x-heroicon-s-lock-closed class="w-5 h-5 text-gray-800 group-hover:text-gray-400" />
                        </span>
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

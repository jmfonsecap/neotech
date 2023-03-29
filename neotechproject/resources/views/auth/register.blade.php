<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ __('messages.app.title') }} </title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>


    <section class="overflow-y-auto bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="mr-3 h-6 sm:h-9" src="https://raw.githubusercontent.com/jmfonsecap/neotech/main/NEOTECH%20LOGO.png" alt="Neotech logo">
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        {{ __('messages.auth.create.acount') }}
                    </h1>
                    <form method="POST" class="space-y-4 md:space-y-6 items-center" action="{{ route('register') }}">
                        @csrf
                        <div class="items-center grid grid-cols-3">
                            <div class="py-2 pr-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.auth.create.name') }} </label>
                                <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="account's name" required="">
                            </div>
                            <div class="py-2 pr-2">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.auth.create.email') }} </label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                            </div>
                            <div class="py-2 pr-2">
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.auth.create.phone') }} </label>
                                <input type="phone" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="312*******" required="">
                            </div>
                            <div class="py-2 pr-2">
                                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.auth.create.address') }} </label>
                                <input type="address" name="address" id="address" placeholder="CRRA 67 # ****" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                            <div class="py-2 pr-2">
                                <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.auth.create.country') }} </label>
                                <input type="country" name="country" id="country" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="United St****" required="">
                            </div>
                            <div class="py-2 pr-2">
                                <label for="postalCode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.auth.create.postalcode') }} </label>
                                <input type="postalCode" name="postalCode" id="postalCode" placeholder="05***" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                        </div>
                        <div class="items-center grid grid-cols-2">
                            <div class="py-2 pr-2">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.auth.create.password') }} </label>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                            <div class="py-2 pr-2">
                                <label for="password-confirm" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.auth.create.confirm') }} </label>
                                <input type="password" name="password_confirmation" id="password-confirm" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create an account</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
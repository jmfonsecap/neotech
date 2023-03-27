@extends('layouts.admin')
@section('content')

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
        <div class="mx-auto max-w-screen-sm mb-8 lg:mb-16">
            <h2 class="mb-4 text-2xl text-center tracking-tight font-bold text-gray-900 dark:text-gray-400"> {{ __('messages.admin.users.profile') }} </h2>
            <hr class="border-1 border-gray-500 my-5">
        </div>
        <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
            <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                <img class="h-full w-full rounded-lg sm:rounded-none sm:rounded-l-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png" alt="User image">
                <div class="p-5">
                    <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="#"> {{ $user->getName() }} </a>
                    </h3>
                    <span class="text-gray-500 dark:text-gray-400"> {{ $user->getEmail() }} </span>
                    <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">
                        {{ __('messages.admin.users.phoneconst') . $user->getPhone() }}
                    </p>
                    <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">
                        {{ __('messages.admin.users.country') . $user->getCountry() }}
                    </p>
                    <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">
                        {{ __('messages.admin.users.postalcode') . $user->getPostalCode() }}
                    </p>
                    <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">
                        {{ __('messages.admin.users.role') . $user->getRole() }}
                    </p>
                    <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">
                        {{ __('messages.admin.users.points') . $user->getPoints() }}
                    </p>
                    <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">
                        {{ __('messages.admin.users.address') . $user->getAddress() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
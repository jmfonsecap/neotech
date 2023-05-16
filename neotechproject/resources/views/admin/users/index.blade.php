@extends('layouts.admin') 
@section('content')

@if(sizeof($viewData["users"])>0)
    <div class="w-full relative overflow-x-auto pt-4">
    <p class="font-bold text-2xl text-center text-gray-500 dark:text-gray-400">{{ $viewData["title"] }}</p>
    <hr class="border-1 border-gray-500 my-5">
    

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    @foreach($viewData["users"][0]->getLabels() as $label)
                        <th scope="col" class="px-6 py-3">
                            {{ $label }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                
                @foreach($viewData["users"] as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->getName() }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $user->getEmail() }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->getRole() }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->getPhone() }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->getCountry() }}
                    </td>
                    <td class="px-6 py-4">
                        <button type="button" class="py-2 text-xs font-medium text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <a href="{{ route('admin.users.show', ['id' => $user->getId()]) }}">
                            {{ __('messages.admin.show') }}
                        </a> 
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@else
    <div class="bg-gray-900 w-full px-16 md:px-0 h-screen flex items-center justify-center">
        <div class="bg-white border border-gray-200 flex flex-col items-center justify-center px-4 md:px-8 lg:px-24 py-8 rounded-lg shadow-2xl">
            <p class="text-2xl md:text-3xl lg:text-5xl font-bold tracking-wider text-gray-500 mt-4"> {{ __('messages.admin.users.notfound') }} </p>
            <p class="text-gray-500 mt-4 pb-4 border-b-2 text-center"> {{ __('messages.admin.users.notfound.text') }} </p>
            <a href="{{ route('admin.home.index') }}" class="flex items-center space-x-2 bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 mt-6 rounded transition duration-150" title="Return Home">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                </svg>
                <span> {{ __('messages.admin.back') }} </span>
            </a>
        </div>
    </div>
@endif

@endsection
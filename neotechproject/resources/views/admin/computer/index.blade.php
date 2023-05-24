@extends('layouts.admin')
@section('content')

<div class="w-full relative overflow-x-auto pt-4">
    <p class="font-bold text-2xl text-center text-gray-500 dark:text-gray-400"> {{ $viewData["title"] }} </p>
    <hr class="border-1 border-gray-500 my-5">

    @if(session('status'))
        <div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
                <span class="font-medium"> {{ session('status') }} </span>
            </div>    
        </div>
    @endif
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            @if(sizeof($viewData["computers"])>0)
            <tr>
                @foreach($viewData["labels"] as $label)
                <th scope="col" class="px-6 py-3">
                    {{ $label }}
                </th>
                @endforeach
            </tr>
            @endif
        </thead>
        <tbody>

            @foreach($viewData["computers"] as $computer)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $computer->getName() }}
                </th>
                <td class="px-6 py-4">
                    {{ $computer->getStock() }}
                </td>
                <td class="px-6 py-4">
                    {{ $computer->getBrand() }}
                </td>
                <td class="px-6 py-4">
                    {{ $computer->getCategory() }}
                </td>
                <td class="px-6 py-4">
                    {{ $computer->getCurrentPrice() }}
                </td>
                <td class="px-6 py-4">
                    <button class="py-2 text-xs text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                        <a href="{{ route('admin.computer.show', ['id' => $computer->getId()]) }}">
                            {{ __('messages.admin.show') }}
                        </a>
                    </button>

                </td>
                <td class="px-6 py-4">
                    <button type="button" class="py-2 text-xs text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                        <a href="{{ route('admin.computer.edit', ['id' => $computer->getId()]) }}">
                            {{ __('messages.admin.edit') }}
                        </a>
                    </button>
                </td>
                <td class="px-6 py-4">
                    <button type="button" class="py-2 text-xs text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        <a href="{{ route('admin.computer.delete', ['id' => $computer->getId()]) }}">
                            {{__('messages.admin.delete') }}
                        </a>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
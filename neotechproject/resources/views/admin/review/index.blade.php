@extends('layouts.admin') 
@section('content')
    
<div class="w-full relative overflow-x-auto pt-4">
<p class="font-bold text-2xl text-center text-gray-500 dark:text-gray-400">{{ __('messages.admin.review.table.title') }}</p>
  <hr class="border-1 border-gray-500 my-5">


    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    @if(sizeof($viewData["reviews"])>0)
            <tr>
                @foreach($viewData["reviews"][0]->getLabels() as $label)
                <th scope="col" class="px-6 py-3">
                    {{ $label }}
                </th>
                @endforeach
            </tr>
            @endif
        <tbody>
            
            @foreach($viewData["reviews"] as $review)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $review->getId() }}
                </th>
                <td class="px-6 py-4">
                    {{ $review->getComputerId() }}
                </td>
                <td class="px-6 py-4">
                    {{ $review->getRating() }}
                </td>
                <td class="px-6 py-4">
                    {{ $review->getDescription() }}
                </td>
                <td class="px-6 py-4">
                <button class="py-2 text-xs text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                    <a href="{{ route('admin.review.show', ['id' => $review->getId()]) }}">
                    {{ __('messages.admin.show') }}
                    </a>
                </button>

                </td>
                <td class="px-6 py-4">
                <button type="button" class="py-2 text-xs text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                    <a href="{{ route('admin.review.edit', ['id' => $review->getId()]) }}">
                        {{ __('messages.admin.edit') }}
                    </a>    
                </button>
                </td>
                <td class="px-6 py-4">
                <button type="button" class="py-2 text-xs text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                    <a href="{{ route('admin.review.delete', ['id' => $review->getId()]) }}">
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
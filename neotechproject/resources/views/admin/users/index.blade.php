@extends('layouts.admin') 
@section('content')
    
<div class="relative overflow-x-auto pt-4">
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
                        Ver
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
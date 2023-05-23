@extends('layouts.admin') 
@section('content')
    

<div class="grid grid-cols-2 gap-4 py-4">
<a href="{{ route('admin.users.index') }}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="pl-4 object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://png.pngtree.com/thumb_back/fw800/background/20210227/pngtree-grainy-solid-color-background-image_570551.jpg" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> {{ __('messages.admin.banner.users') }} </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> {{ __('messages.admin.users.text') }} </p>
    </div>
</a>

<a href="{{ route('admin.computer.index') }}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="pl-4 object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://png.pngtree.com/thumb_back/fw800/background/20210227/pngtree-grainy-solid-color-background-image_570551.jpg" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> {{ __('messages.admin.banner.computers') }} </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> {{ __('messages.admin.computers.text') }} </p>
    </div>
</a>

<a href="{{ route('admin.part.index') }}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="pl-4 object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://png.pngtree.com/thumb_back/fw800/background/20210227/pngtree-grainy-solid-color-background-image_570551.jpg" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> {{ __('messages.admin.banner.parts') }} </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> {{ __('messages.admin.parts.text') }} </p>
    </div>
</a>


<a href="{{ route('admin.review.index') }}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="pl-4 object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://png.pngtree.com/thumb_back/fw800/background/20210227/pngtree-grainy-solid-color-background-image_570551.jpg" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> {{ __('messages.admin.banner.reviews') }} </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> {{ __('messages.admin.reviews.text') }} </p>
    </div>
</a>

<a href="{{ route('admin.type.index') }}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="pl-4 object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://png.pngtree.com/thumb_back/fw800/background/20210227/pngtree-grainy-solid-color-background-image_570551.jpg" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> {{ __('messages.admin.banner.type') }} </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> {{ __('messages.admin.type.text') }} </p>
    </div>
</a>

</div

@endsection
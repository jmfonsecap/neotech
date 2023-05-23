<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ __('messages.app.title') }} </title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class= "flex flex-col min-h-screen">

    <header>
        <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
            <div class="flex flex-wrap justify-between items-left mx-auto max-w-screen-xl">

                <a href="{{route('user.home.index')}}" class="flex items-center">
                    <img src="https://raw.githubusercontent.com/jmfonsecap/neotech/main/NEOTECH%20LOGO.png" class="mr-3 h-6 sm:h-9" alt="Neotech Logo" />
                </a>
                <div class="flex items-center lg:order-2">
                    @guest
                    <a href="{{ route('login') }}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">{{ __('messages.auth.login') }}</a>
                    <a href="{{ route('register') }}" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">{{ __('messages.auth.signup') }}</a>
                    @else 
                    <form id="logout" action="{{ route('logout') }}" method="POST"> 
                        <a role="button" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" 
                        onclick="document.getElementById('logout').submit();">{{ __('messages.auth.logout') }}</a> 
                        @csrf 
                    </form> 
                    @endguest
                    <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1
                        </svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                        <form role="search" action="{{route('search')}}" method="POST" class="hidden md:block md:pl-2">
                            <label for="topbar-search" class="sr-only">{{ __('messages.user.search') }}</label>
                            <div class="input group relative md:w-64 md:w-96">
                              <div
                                class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none"
                              >
                                <svg
                                  class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                  ></path>
                                </svg>
                              </div>
                              @csrf
                              <input
                                type="text"
                                name="query"
                                id="topbar-search"
                                class="form control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Search"
                                />
                                </div>
                            </form>
                            
                        </li>
                        <li>
                            <a href="{{route('user.home.index')}}" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">{{ __('messages.admin.dash.home') }}</a>
                        </li>
                        <li>
                            <a href="{{route('user.computer.index')}}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">{{ __('messages.admin.computers') }}</a>
                        </li>
                        <li>
                            <a href="{{route('user.part.index')}}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">{{ __('messages.admin.parts') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- content -->
    <div class="flex-grow dark:bg-gray-900">
        @yield('content')
    </div>

    <!-- footer -->
    
        <footer class="flex p-4 bg-white md:p-8 lg:p-10 dark:bg-gray-800">
        </footer>


</body>

</html>
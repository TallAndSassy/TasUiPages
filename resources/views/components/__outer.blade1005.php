OBE: See outer.blade.php - - no leading dashed
<x-tassy::base>

    <div class="h-screen flex overflow-hidden bg-gray-100" x-data="{ sidebarOpen: false }"
         @keydown.window.escape="sidebarOpen = false">
        <!-- Off-canvas menu for mobile -->

        <div x-show="sidebarOpen" class="md:hidden">
            <div @click="sidebarOpen = false" x-show="sidebarOpen" x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100" x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-30 transition-opacity ease-linear duration-300">
                <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
            </div>
            <div class="fixed inset-0 flex z-40">
                <div x-show="sidebarOpen" x-transition:enter-start="-translate-x-full"
                     x-transition:enter-end="translate-x-0" x-transition:leave-start="translate-x-0"
                     x-transition:leave-end="-translate-x-full"
                     class="flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-gray-800 transform ease-in-out duration-300 ">
                    <div class="absolute top-0 right-0 -mr-14 p-1">
                        <button x-show="sidebarOpen" @click="sidebarOpen = false"
                                class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-none focus:bg-gray-600"
                                aria-label="Close sidebar">
                            <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <div class="flex-shrink-0 flex items-center px-4">
                        <a href="/">
                            <x-tassy::admin_logo/>
                        </a>
                    </div>
                    <div class="mt-5 flex-1 h-0 overflow-y-auto">
                        @php

                            @endphp
                    </div>
                </div>
                <div class="flex-shrink-0 w-14">
                    <!-- Force sidebar to shrink to fit close icon -->
                </div>
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-55">
                <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900">
                    <a href="/"> <x-tassy::admin_logo/>
                    </a>
                </div>
                <div class="h-0 flex-1 flex flex-col overflow-y-auto">
                    <div class="flex-1 bg-gray-800">
{{--                        @livewire('sidenav')--}}
                        [Side Nav]
                    </div>
                    <div class="flex-shrink-0 flex bg-gray-700 align-bottom">
{{--                        @livewire('lowernav')--}}
                        [Lower Nav]
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <div class="hidden relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
                <button @click.stop="sidebarOpen = true"
                        class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:bg-gray-100 focus:text-gray-600 md:hidden"
                        aria-label="Open sidebar">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h7"/>
                    </svg>
                </button>

            </div>
            {{--      --------- SIDE NAV END (we'd put this into a blade if we knew more --}}

           <main class="flex-1 relative z-0 overflow-y-auto py-0 focus:outline-none" tabindex="0" x-data
                  x-init="$el.focus()">

               <div class="MenuUpperRight float-right">
                   <div class="p-3 ml-4 flex items-center md:ml-6">
                       <!-- Menu top right -->
                       <div class="NavigationLinks hidden space-x-8 sm:-my-px sm:ml-10 sm:flex mr-8">
                    {!! \TallAndSassy\TasUiPages\TasUiPages::getMenu('top', 'Across') !!}
                </div>
                <span>
                    <x-tassy::user-settings-dropdown/>
                </span>


{{--                       <a href='/admin/notifications'--}}
{{--                          class="p-1 text-gray-400 rounded-full hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:shadow-outline focus:text-gray-500"--}}
{{--                          aria-label="Notifications">--}}
{{--                           <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">--}}
{{--                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                     d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>--}}
{{--                           </svg>--}}
{{--                       </a>--}}
{{--                       <div @click.away="open = false" class="ml-3 relative" x-data="{ open: false }">--}}
{{--                           <div>--}}
{{--                               <button @click="open = !open"--}}
{{--                                       class="max-w-xs flex items-center text-sm rounded-full focus:outline-none focus:shadow-outline"--}}
{{--                                       id="user-menu" aria-label="User menu" aria-haspopup="true"--}}
{{--                                       x-bind:aria-expanded="open">--}}
{{--                                   <img class="h-8 w-8 rounded-full"--}}
{{--                                        src="https://secure.gravatar.com/avatar/{{ md5(\Illuminate\Support\Str::lower(Auth::user()->email)) }}?size=512&default=mp&rating=g"--}}
{{--                                        alt=""/>--}}
{{--                               </button>--}}
{{--                           </div>--}}
{{--                           <div x-show="open" x-transition:enter="transition ease-out duration-100"--}}
{{--                                x-transition:enter-start="transform opacity-0 scale-95"--}}
{{--                                x-transition:enter-end="transform opacity-100 scale-100"--}}
{{--                                x-transition:leave="transition ease-in duration-75"--}}
{{--                                x-transition:leave-start="transform opacity-100 scale-100"--}}
{{--                                x-transition:leave-end="transform opacity-0 scale-95"--}}
{{--                                class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">--}}

{{--                               <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical"--}}
{{--                                    aria-labelledby="user-menu">--}}
{{--                                   <a href="/myhome/profile"--}}
{{--                                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150"--}}
{{--                                      role="menuitem">Your Profile</a>--}}
{{--                                   <a href="/myhome/settings"--}}
{{--                                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150"--}}
{{--                                      role="menuitem">Settings</a>--}}
{{--                                   <a href="{{ route('logout') }}"--}}
{{--                                      onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();"--}}
{{--                                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150"--}}
{{--                                      role="menuitem"> {{ __('Logout') }}</a>--}}


{{--                                   <form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
{{--                                         style="display: none;">--}}
{{--                                       @csrf--}}
{{--                                   </form>--}}
{{--                               </div>--}}
{{--                           </div>--}}
{{--                       </div>--}}
                   </div>

               </div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    <!-- Replace with your content -->
                    <div class="py-1">

{{--                       @include('admin/_standard',['asrParams'=>$asrParams])--}}
                        Content Column goes here

                    </div>
                    <!-- /End replace -->
                </div>
            </main>


        </div>
    </div>



</x-tassy::base>

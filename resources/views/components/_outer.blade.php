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
                <div>
                    <nav x-data="{ open: false }" >
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <x-tassy::user-settings-dropdown/>
                        </div>

                        <!-- Small -->
                        <div class="-mr-2  align-right sm:hidden">
                            <button @click="open = ! open"

                                    class=" p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <span :class="{'hidden':  open}">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </span>
                                <span :class="{'hidden': ! open, 'w-screen': open}" class="ml-2">
                                   [X]
                                </span>

                            </button>
                        </div>

                        <!-- Responsive Navigation Menu -->
                        <div :class="{'block': open, 'hidden': ! open, 'w-screen': open}" class="hidden sm:hidden">
                            <!-- Responsive Settings Options -->
                            <div class="pt-4 pb-1 border-t border-gray-200">

                             <div class="mt-3 space-y-1">
                        <!-- Account Management -->
                        <x-jet-responsive-nav-link href="/user/profile" :active="request()->routeIs('profile.show')">
                            {{ __('Profile') }}
                        </x-jet-responsive-nav-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-responsive-nav-link href="/user/api-tokens" :active="request()->routeIs('api-tokens.index')">
                                {{ __('API Tokens') }}
                            </x-jet-responsive-nav-link>
                        @endif

                    <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-responsive-nav-link>
                        </form>

                        <!-- Team Management -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="border-t border-gray-200"></div>

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>

                            <!-- Team Settings -->
                            <x-jet-responsive-nav-link href="/teams/{{ Auth::user()->currentTeam->id }}"
                                                       :active="request()->routeIs('teams.show')">
                                {{ __('Team Settings') }}
                            </x-jet-responsive-nav-link>

                            <x-jet-responsive-nav-link href="/teams/create" :active="request()->routeIs('teams.create')">
                                {{ __('Create New Team') }}
                            </x-jet-responsive-nav-link>

                            <div class="border-t border-gray-200"></div>

                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link"/>
                            @endforeach
                        @endif
                    </div>
                            </div>
                        </div>
                    </nav>

                </div>




{{--               <div class="MenuUpperRight w-max sm:float-right">--}}
{{--                   <div class="p-3 ml-4 flex items-center md:ml-6">--}}
{{--                       <!-- Menu top right -->--}}
{{--                       <div class="NavigationLinks  space-x-8 sm:-my-px sm:ml-10 sm:flex mr-8">--}}
{{--                            {!! \TallAndSassy\TasUiPages\TasUiPages::getMenu('top', 'Across') !!}--}}
{{--                        </div>--}}
{{--                        <span>--}}
{{--                           @livewire("tassy::user-settings")--}}
{{--                        </span>--}}
{{--                   </div>--}}

{{--               </div>--}}
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

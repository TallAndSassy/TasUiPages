<x-tassy::base>
    <div class="h-screen  overflow-hidden bg-gray-100" x-data="{ sidebarOpen: false }">
        <div class="w-screen  bg-green-200">
            <div class="bg-green-500  grid grid-cols-8 pt-3 ml-3">
                <div class="AdminMenus bg-red-800 lg:hidden mx-auto"><a href="/"><x-tassy::admin_lgo /></a></div>
                <div class="AdminMenus bg-red-800 hidden lg:blockx pt-1"><a href="/"><x-tassy::admin_logo /></a></div>
                <div class="col-span-5 bg-red-300 invisible sm:visible pl-2"><span class="text-3xl">{!! $header !!}</span></div>
                <div class="TopMenu text-center">
                    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
                    </nav>
                </div>
                <div class="PersonalMenu text-right bg-blue-400 pr-2 md:text-center">
                    <span class="lg:hidden">: -( </span>
                    <span class="hidden lg:block">
                         <nav x-data="{ open: false }" >
                            <div class="text-center">
                                <x-tassy::user-settings-dropdown/>
                            </div>
                         </nav>
                    </span>
                </div>
            </div>
            <div class="Row2 bg-yellow-500  grid grid-cols-8 sm:hidden">
                <div class="BeSideBarNarrow_HSpacer bg-yellow-200 col-span-1">SN</div>
                <div class="HeaderText col-span-7 bg-red-300 pl-4"><span class="text-3xl">{!! $header !!}</span></div>
            </div>

        </div>
                <div class="grid grid-cols-8">
                    <div class="BeSideBarNarrow w-8 sm:hidden mx-2">
                        <>
                    </div>
                    <div class="BeSideBarNarrow w-24 hidden sm:flex">
                        [SideNav]
                    </div>
                    <div class="BeContent shadow p-3 ml-2  mr-2 mt-2 col-span-7 xl:col-span-6">{!! $slot  !!}</div>
                </div>


        <div class="sm:hidden">Smallest</div>
        <div class="hidden sm:block md:hidden">Sm</div>
        <div class="hidden md:block lg:hidden">Md</div>
        <div class="hidden lg:block xl:hidden">Lg</div>
        <div class="hidden xl:block 2xl:hidden">Xl</div>
    </div>


    <div class="Foot w-screen bg-yellow-500  grid grid-cols-8 ">
        <div class="BeSideBarNarrow_HSpacer bg-yellow-200 col-span-1"></div>
        <div class="HeaderText col-span-7 bg-yellow-700 text-center"><x-tassy::footer.content/></div>
    </div>

</x-tassy::base>


<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>


            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <!-- Navigation Links -->
                <div class="NavigationLinks hidden space-x-8 sm:-my-px sm:ml-10 sm:flex mr-8">
                    {!! \TallAndSassy\TasUiPages\TasUiPages::getMenu('top', 'Across') !!}
                </div>
                <span>
                    <x-tassy::user-settings-dropdown/>
                </span>

            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            {!! \TallAndSassy\TasUiPages\TasUiPages::getMenu('top', 'Stacked') !!}
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <x-tassy::user-settings-stacked/>
        </div>
    </div>
</nav>

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

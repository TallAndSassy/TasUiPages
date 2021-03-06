<div>
    <div class="flex items-center px-4">
        <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                 alt="{{ Auth::user()->name }}"/>
        </div>

        <div class="ml-3">
            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
        </div>
    </div>

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

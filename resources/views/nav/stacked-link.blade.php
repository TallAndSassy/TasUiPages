{{--Wrapper for jet-nav-link cuz I couldn't figure out how to make spatie/laravel-menu call the component
Mainly from jetstream when in hamburger mode
--}}
<span>
    @php
    $isRouteZO = request()->routeIs($routeIs)  ? 1 : 0;
    @endphp
     <x-jet-responsive-nav-link href="{{$href}}" :active="$isRouteZO">
         {!! $slot !!}
     </x-jet-responsive-nav-link>
</span>

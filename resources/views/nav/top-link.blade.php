{{--Wrapper for jet-nav-link cuz I couldn't figure out how to make spatie/laravel-menu call the component--}}
<span>
    @php
    $isRouteZO = request()->routeIs($routeIs)  ? 1 : 0;
    @endphp
     <x-jet-nav-link href="{{$href}}" :active="$isRouteZO">
         {!! $slot !!}
     </x-jet-nav-link>
</span>

<?php

namespace TallAndSassy\TasUiPages;

class TasUiPages
{
    static array $asrMenus = [];
    static function setMenu(string $enumName, \Spatie\Menu\Laravel\Menu $updateWith): \Spatie\Menu\Laravel\Menu {
         static::$asrMenus[$enumName] = $updateWith;
        return $updateWith;
    }

    static function getMenu(string $enumName, string $enumStyle_AcrossStacked): \Spatie\Menu\Laravel\Menu {
        $key = $enumName.$enumStyle_AcrossStacked;
        if ($enumName == 'top' && !array_key_exists($key,static::$asrMenus)) {
            static::$asrMenus[$key] = static::createMenu_top($enumStyle_AcrossStacked);
        }
        if (!array_key_exists($key,static::$asrMenus)) {
            static::$asrMenus[$key] = \Spatie\Menu\Laravel\Menu::new();
        }
        return static::$asrMenus[$key];

    }

    private static function createMenu_top(string $enumAcrossStacked, ?string $bladeLocator = null): \Spatie\Menu\Laravel\Menu {
        assert(in_array($enumAcrossStacked, ['Across','Stacked']));
        if ($enumAcrossStacked == 'Across' && !$bladeLocator) {
            $bladeLocator = 'tassy::nav/top-link';
        }
        if ($enumAcrossStacked == 'Stacked' && !$bladeLocator) {
            $bladeLocator = 'tassy::nav/stacked-link';
        }
        $tasTopMenu = \Spatie\Menu\Laravel\Menu::new()
        ->withoutParentTag()
        ->withoutWrapperTag()
        ->add(\Spatie\Menu\Laravel\View::create($bladeLocator,['href'=> '/','slot'=>'Home','routeIs'=>'home']))
        ->add(\Spatie\Menu\Laravel\View::create($bladeLocator,['href'=> '/dashboard','slot'=>__('Dashboard'),'routeIs'=>'dashboard']))
        ->add(\Spatie\Menu\Laravel\View::create($bladeLocator,['href'=> '/admin','slot'=>__('Admin'),'routeIs'=>'admin']))
        ->add(\Spatie\Menu\Laravel\View::create($bladeLocator,['href'=> '/grok','slot'=>'Grok','routeIs'=>'grok*']));
        return $tasTopMenu;

    }

}

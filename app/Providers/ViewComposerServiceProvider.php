<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Twitter;
use File;
use App\Sponsors;
use App\Supporters;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Menu
        view()->composer('layouts.nav', function ($view) {
            $menuItems = json_decode(File::get(resource_path('/assets/menu/menu.json')));
            $view->with('menuItems', $menuItems);
        });

        // Footer
        view()->composer('layouts.footer', function ($view) {
            $parameters = [
                'include_rts' => false,
                'screen_name' => 'jotb2018',
                'count' => 2,
                'format' => 'array',
                'exclude_replies' => true
            ];
            $tweets[0]['text'] = 'YO! Another 6 new speakers in our line-up: Please welcome to #JOTB2018 two usual suspects @sergeybykov & @rolandkuhn and four amazing #womenintech @Tweet_Cassandra @isabelcabezasm @julietsvq @jannabrummel  #DistributedSystems #SoftwareTesting #DevOps #IoT https://buff.ly/2DHovf2 ';
            $tweets[0]['id'] = '953693156637372416';
            if (config('app.env') != 'local') {
                try {
                    $tweets = Twitter::getUserTimeline($parameters);
                } catch (\Exception $e) {
                }
            }
            $view->with('tweets', $tweets);
        });

        view()->composer('modules.numbers', function ($view) {
            $numbers = json_decode(File::get(resource_path('/assets/numbers/numbers.json')));
            $view->with('numbers', $numbers);
        });

        // About
        view()->composer('about', function ($view) {
            $reasons = json_decode(File::get(resource_path('/assets/reasons/reasons.json')));
            $view->with('reasons', $reasons);
        });

        // Modules sponsors
        view()->composer('modules.sponsors', function ($view) {
            $sponsorsGroups = Sponsors::join('sponsors_groups', 'sponsors_groups.id', '=', 'sponsors.sponsors_groups_id')
                    ->select('sponsors.*', 'sponsors_groups.id AS sponsors_groups_id')
                    ->where('sponsors.published', 1)
                    ->where('sponsors_groups.published', 1)
                    ->orderBy('sponsors_groups.order', 'ASC')
                    ->get()
                    ->groupBy('sponsors_groups_id');

            $with = array_merge([
                'sponsorsGroups' => $sponsorsGroups
            ], $view->getData());

            $view->with($with);
        });

        // 404 error
        view()->composer('errors::404', function ($view) {
            $menuItems = json_decode(File::get(resource_path('/assets/menu/menu.json')));
            $view->with('menuItems', $menuItems);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

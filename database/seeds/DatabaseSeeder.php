<?php

use App\Speakers;
use App\Members;
use App\Supporters;
use App\Organizers;
use App\User;
use App\Workshops;
use App\Sponsors;
use App\SponsorsGroups;
use App\Jobs;
use App\Topics;
use App\Talk;
use App\ScheduleItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        Speakers::truncate();
        factory(App\Speakers::class, 15)->create();

        Members::truncate();
        factory(App\Members::class, 5)->create();

        Supporters::truncate();
        factory(App\Supporters::class, 10)->create();

        Workshops::truncate();
        factory(App\Workshops::class, 10)->create();
        SponsorsGroups::truncate();
        factory(App\SponsorsGroups::class, 5)->create();

        Sponsors::truncate();
        factory(App\Sponsors::class, 15)->create();

        Jobs::truncate();
        factory(App\Jobs::class, 15)->create();

        Topics::truncate();
        factory(App\Topics::class, 6)->create();

        Talk::truncate();
        factory(App\Talk::class, 10)->create();

        ScheduleItem::truncate();

        foreach (Talk::all() as $talk) {
            $talk->speakers()->sync(App\Speakers::all()->random(1)->first());
        }

        foreach (Workshops::all() as $workshop) {
            $workshop->speakers()->sync(App\Speakers::all()->random(1)->first());
        }

        App\VideoGroups::truncate();
        factory(App\VideoGroups::class, 4)->create();

        App\Videos::truncate();
        factory(App\Videos::class, 40)->create();

        App\EventImages::truncate();
        factory(App\EventImages::class, 4)->create();
        
        User::truncate();
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@admin.test';
        $user->password = bcrypt('123456');
        $user->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use \App\Speakers;
use \App\SponsorsGroups;
use \App\Sponsors;
use \App\Levels;
use \App\Topics;
use \App\Halls;
use \App\Talk;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Speakers::class, function (Faker\Generator $faker) {
    return [
        'firstname' => $faker->word,
        'lastname' => $faker->word,
        'twitter' => $faker->word,
        'position' => $faker->sentence(3),
        'company' => $faker->sentence(3),
        'description' => $faker->paragraph(30),
        'imagePath' => $faker->imageUrl(299, 367),
        'hype' => $faker->boolean,
        'home' => $faker->boolean,
        'published' => 1
    ];
});

$factory->define(App\Members::class, function (Faker\Generator $faker) {
    return [
        'firstname' => $faker->word,
        'lastname' => $faker->word,
        'twitter' => $faker->word,
        'position' => $faker->sentence(3),
        'company' => $faker->sentence(3),
        'description' => $faker->paragraph(3),
        'imagePath' => $faker->imageUrl(299, 367),
        'hype' => 0,
        'published' => 1
    ];
});

$factory->define(App\Supporters::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'url' => $faker->url,
        'imagePath' => $faker->imageUrl(460, 432),
        'type' => $faker->randomElement(['supporter' ,'organizer'])
    ];
});

$factory->define(App\SponsorsGroups::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->paragraph(3),
        'max' => $faker->randomNumber(1),
        'price' => $faker->randomNumber(4),
        'pack' => $faker->boolean,
    ];
});


$factory->define(App\Sponsors::class, function (Faker\Generator $faker) {
    $sponsorsGroupsIds = SponsorsGroups::all()->pluck('id')->toArray();
    return [
        'sponsors_groups_id' => $faker->randomElement($sponsorsGroupsIds),
        'title' => $faker->word,
        'url' => $faker->url,
        'description' => $faker->randomHtml(2, 3),
        'imagePath' => $faker->imageUrl(460, 432)
    ];
});


$factory->define(App\Workshops::class, function (Faker\Generator $faker) {
    $halls = Halls::getHallsWorkshops();
    $workshopsTypes = App\WorkshopsTypes::all();
    $time1 = date_create($faker->time($format = 'H:i:s'));
    return [
        'type' => $faker->randomElement($workshopsTypes),
        'title' => $faker->sentence(1),
        'intro' => $faker->paragraphs(3, true),
        'learn' => $faker->paragraphs(3, true),
        'requirements' => $faker->paragraphs(3, true),
        'companies' => $faker->paragraphs(3, true),
        'careers' => $faker->paragraphs(3, true),
        'plan' => $faker->paragraphs(3, true),
        'resources' => $faker->paragraphs(3, true),
        'materials' => $faker->paragraphs(3, true),
        'date' => $faker->sentence(1),
        'time' => $faker->sentence(1),
        'topics' => $faker->sentence(1),
        'target' => $faker->sentence(1),
        'attendees' => $faker->sentence(1),
        'included' => $faker->sentence(1),
        'price' => $faker->randomNumber(2),
        'hall' => $faker->randomElement($halls),
        'day1' => $time1->format('H:i') . ' to ' . date_add($time1, date_interval_create_from_date_string('1 hour'))->format('H:i'),
        'day2' => $faker->time($format = 'H:i:s'),
        'day3' => $faker->time($format = 'H:i:s'),
    ];
});

$factory->define(App\Jobs::class, function (Faker\Generator $faker) {
    $sponsorsIds = Sponsors::all()->pluck('id')->toArray();
    return [
        'sponsors_id' => $faker->randomElement($sponsorsIds),
        'title' => $faker->word,
        'description' => $faker->paragraph(3),
        'url' => $faker->url
    ];
});

$factory->define(App\Topics::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'color' => $faker->hexcolor
    ];
});

$factory->define(App\Talk::class, function (Faker\Generator $faker) {
    $topicIds = Topics::all()->pluck('id')->toArray();
    $levels = Levels::all();
    return [
        'title' => $faker->word,
        'intro' => $faker->randomHtml(1, 1),
        'description' => $faker->randomHtml(2, 3),
        'topic_id' => $faker->randomElement($topicIds),
        'level' => $faker->randomElement($levels),
    ];
});


$factory->define(App\ScheduleItem::class, function (Faker\Generator $faker) {
    $talkIds = Talk::all()->pluck('id')->toArray();
    $halls = Halls::all();
    $levels = Levels::all();
    $day = $faker->randomElement(App\Day::all());
    $initialDate = $faker->dateTimeBetween($startDate = $day . ' 08:00:00', $endDate = $day . ' 18:00:00', $timezone = null);
    return [
        'hall' => $faker->randomElement($halls),
        'day' => $day,
        'start_time' => $initialDate->format('Y-m-d H:i:s'),
        'end_time' => date_add($initialDate, date_interval_create_from_date_string('1 hour'))->format('Y-m-d H:i:s'),
        'talk_id' => $faker->randomElement($talkIds),
        'break_message' => $faker->word,
    ];
});

$factory->define(App\VideoGroups::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
    ];
});

$factory->define(App\Videos::class, function (Faker\Generator $faker) {
    $videoGroupsIds = App\VideoGroups::all()->pluck('id')->toArray();
    return [
        'video_groups_id' => $faker->randomElement($videoGroupsIds),
        'youTubeId' => '0UTOLRTwOX0'
    ];
});

$factory->define(App\EventImages::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
    ];
});

<?php

use App\Lead;
use App\Organization;
use App\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'organization_id' => function(){
            return factory(Organization::class)->create()->id;
        }
    ];
});

$factory->define(Organization::class, function( Faker $faker){
   return [
       'name' => $faker->name,
       'email' => $faker->unique()->safeEmail,
       'token' => str_random(24)
   ];
});

$factory->define(Lead::class, function(Faker $faker){
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'organization_id' => function(){
            return factory(Organization::class)->create()->id;
        },
        'user_id' => function(){
            return factory(User::class)->create()->id;
        },
    ];
});
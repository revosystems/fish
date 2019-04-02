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
    $faker->locale = 'es_ES';
    return [
        'name'              => $faker->firstname,
	    'surname1'          => $faker->lastName,
	    'surname2'          => $faker->lastName,
	    'enterprise'        => $faker->company,
	    'territory'         => $faker->city,
	    'department'        => $faker->jobTitle,
	    'position'          => $faker->bs,
	    'phone'             => $faker->PhoneNumber,
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => '$2y$12$EkoXUA79v5ywoph.oaDUQeplLw7sr54hJiXTGpL7L23O2VUnzhZsu', // 123456
        'remember_token'    => str_random(10),
        'organization_id'   => function(){
            return factory(Organization::class)->create()->id;
        }
    ];
});

$factory->define(Organization::class, function( Faker $faker){
    $faker->locale = 'es_ES';
   return [
       'name'   => $faker->name,
       'email'  => $faker->unique()->safeEmail,
       'token'  => str_random(24)
   ];
});

$factory->define(Lead::class, function(Faker $faker){
    $faker->locale = 'es_ES';
    return [
        'name'  => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'organization_id' => function(){
            return factory(Organization::class)->create()->id;
        },
        'user_id' => function(){
            return factory(User::class)->create()->id;
        },
    ];
});
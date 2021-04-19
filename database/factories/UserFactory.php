<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Productos;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10)
    ];
});
$factory->define(App\Usuario::class, function (Faker  $faker) {
    return [
        'nombre' => $faker->sentence(1),
        'apellido' => $faker->sentence(1),
        'telefono' => $faker->phoneNumber(1),
        'usuario' => $faker->text(6),
        'password' => $faker->text(6)
    ];
});
$factory->define(App\Productos::class, function (Faker  $faker) {
    return [
        'nombre' => $faker->word(1),
        'marca' => $faker->sentence(1),
        'descripcion' => $faker->text(30),
        'precio_adquirido' => $faker->randomFloat($nbMaxDecimals = 1, $min = 3, $max = 100), // 48.8932,
        'precio_venta' => $faker->randomFloat($nbMaxDecimals = 1, $min = 3, $max = 150), // 48.8932,
        'unidades' => $faker->numberBetween($min = 10, $max = 50),
        'estatus' => $faker->numberBetween($min = 1, $max = 1)
    ];
});

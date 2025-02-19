<?php

namespace Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class Migration
{
    public static function run()
    {
        Capsule::schema()->create('users', function ($table) {
            $table->id();
            $table->string('city');
            $table->string('email')->unique();
            $table->string('name');
            $table->string('phone');
            $table->string('state');
            $table->string('street');
            $table->string('street_number');
            $table->string('zipcode');
            $table->timestamps();
        });
    }

    public static function rollback()
    {
        Capsule::schema()->dropIfExists('users');
    }
}
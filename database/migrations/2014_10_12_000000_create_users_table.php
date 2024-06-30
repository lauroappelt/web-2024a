<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_admin');
            $table->timestamps();
        });

        User::create([
            'name' => 'lauro appelt',
            'email' => 'lauro@gmail.com',
            'is_admin' => true,
            'password' => Hash::make('superadmin'),
        ]);


        User::create([
            'name' => 'augusto zeni',
            'email' => 'augusto@gmail.com',
            'is_admin' => true,
            'password' => Hash::make('superadmin'),
        ]);


        User::create([
            'name' => 'enzo schuh',
            'email' => 'enzo@gmail.com',
            'is_admin' => true,
            'password' => Hash::make('superadmin'),
        ]);

        User::create([
            'name' => 'arthur lenhardt',
            'email' => 'arthur@gmail.com',
            'is_admin' => true,
            'password' => Hash::make('superadmin'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

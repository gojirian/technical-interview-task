<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });

        // Seed two pages: Home and About
        DB::table('pages')->insert([
            [
                'title' => 'Home',
                'description' => 'Welcome to the Home page.',
                'content' => '<h1>Home</h1><p>This is the home page content.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'About',
                'description' => 'About us page.',
                'content' => '<h1>About</h1><p>This is the about page content.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};

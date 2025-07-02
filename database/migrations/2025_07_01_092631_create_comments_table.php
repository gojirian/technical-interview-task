<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            /*
                INSTRUCTIONS FOR INTERVIEWEE:

                Replace this comment with code that creates a 'comments' table using Laravel's Schema Builder.
                Your migration should include:
                - An auto-incrementing primary key.
                - A text column for the comment body.
                - Polymorphic relationship columns for 'commentable' (i.e., commentable_id and commentable_type).
                - A nullable foreign key to the 'users' table, with 'set null' on delete.
                - Timestamps for created_at and updated_at.

                Write the code inside the Schema::create() closure.
                */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

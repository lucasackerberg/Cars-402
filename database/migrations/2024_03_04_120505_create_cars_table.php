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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            
=======
            $table->unsignedBigInteger('user_id');
            $table->text('status');
            $table->text('brand');
            $table->text('model');
            $table->text('year');
            $table->text('color');
            $table->text('registration');
            $table->text('problem_description');
>>>>>>> refs/remotes/origin/develop
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};

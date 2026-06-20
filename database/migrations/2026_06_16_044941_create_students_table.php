<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->enum('gender', ['male', 'female']);
            $table->string('phone', 20)->nullable();
            $table->string('email', 50)->unique();
            $table->tinyInteger('district');
<<<<<<< HEAD
            $table->string('subjects', 100)->nullable();
            $table->string('photo', 100);
=======
            $table->string('subjects' ,100)->nullable();
            $table->string('photo',100);
>>>>>>> da7d6348b6b35cf6719760dabc7e67313eb919d6

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

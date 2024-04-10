<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role')->references('id')->on('role');
            $table->timestamp('create_time')->useCurrent();
        });
       
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

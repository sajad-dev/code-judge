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
        Schema::create('arbitrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("questions_id")->constrained("questions")->cascadeOnDelete();
            $table->json("input");
            $table->json("output");
            $table->integer("time")->default(1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arbitrations');
    }
};

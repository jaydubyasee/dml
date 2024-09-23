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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->string('filename', 400);
            $table->boolean('checked_in')->default(false);
            $table->foreignId('client_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('project_id')
                ->nullable();
            $table->foreignId('job_id')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('status', ['To Do', 'In Progress', 'Completed'])->default('To Do');
            $table->foreignId('assigned_to')->constrained('users');  // User assigned to the task
            $table->foreignId('team_id')->constrained('teams');  // The team the task belongs to
            $table->foreignId('created_by')->constrained('users');  // Creator of the task
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestampsAndCreatedByUpdatedByToTables extends Migration
{
    public function up()
    {
        // Add nullable columns to 'teams' table
        Schema::table('teams', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable()->after('id');
            $table->unsignedBigInteger('updated_by')->nullable()->after('created_by');
            $table->timestamps();  // This will add 'created_at' and 'updated_at'
        });

        // Add nullable columns to 'tasks' table
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable()->after('id');
            $table->unsignedBigInteger('updated_by')->nullable()->after('created_by');
            $table->timestamps();  // This will add 'created_at' and 'updated_at'
        });

        // Add nullable columns to 'task_user' table
        Schema::table('task_user', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable()->after('id');
            $table->unsignedBigInteger('updated_by')->nullable()->after('created_by');
            $table->timestamps();  // This will add 'created_at' and 'updated_at'
        });
    }

    public function down()
    {
        // Drop columns from 'teams' table
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn(['created_by', 'updated_by']);
            $table->dropTimestamps();
        });

        // Drop columns from 'tasks' table
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn(['created_by', 'updated_by']);
            $table->dropTimestamps();
        });

        // Drop columns from 'task_user' table
        Schema::table('task_user', function (Blueprint $table) {
            $table->dropColumn(['created_by', 'updated_by']);
            $table->dropTimestamps();
        });
    }
}

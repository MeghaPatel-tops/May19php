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
        Schema::create('employee', function (Blueprint $table) {
            $table->id(); // primary key (auto increment)

            $table->string('empid')->unique(); // employee code like EMP001
            $table->string('name');
            $table->string('email')->unique();
            $table->decimal('salary', 10, 2);
            $table->date('joindate');

            // Foreign keys
            $table->foreignId('department_id')
                  ->references('id')->on('department')
                  ->onDelete('cascade');

            $table->foreignId('project_id')
                  ->references('id')->on('project')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};

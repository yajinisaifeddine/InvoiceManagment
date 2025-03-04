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
        Schema::create('companies', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (usually 'id')
            $table->string('name'); // Company name (string)
            $table->string('director'); // Director's name (string)
            $table->string('email'); // Company email (string)
            $table->string('phone'); // Company phone number (string)
            $table->string('logo'); // Path or filename for the company logo (string)
            $table->timestamps(); // Adds `created_at` and `updated_at` timestamp columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            if (Schema::hasColumn('companies', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
    }
};

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            // $table->rememberToken();
            $table->string('number_document')->nullable()->unique();
            $table->foreignId('type_document_id')
            ->nullable()
            ->constrained('type_documents')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->boolean('is_admin')->default(false);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

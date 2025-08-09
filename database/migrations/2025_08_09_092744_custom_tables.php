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
        Schema::create('clients', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('added_by');
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->string('business_name');
            $table->string('business_owner')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('address')->nullable();
            $table->string('type')->nullable();
            $table->boolean('website_exists')->default(false);
            $table->boolean('social_accounts_exists')->default(false);
            $table->string('website')->nullable();
            $table->json('social_accounts')->nullable();
            $table->json('website_issues')->nullable();
            $table->json('social_account_issues')->nullable();
            $table->string('audit_summary')->nullable();
            $table->string('notes')->nullable();
            $table->date('follow_up_dates')->nullable();
            $table->text('location')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->foreign('added_by')->on('users')->references('id');
            $table->foreign('last_updated_by')->on('users')->references('id');
        });

        Schema::create('activities', function(Blueprint $table) {
            $table->id();
            $table->string('event');
            $table->json('data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          Schema::dropIfExists('clients');
          Schema::dropIfExists('activities');
    }
};

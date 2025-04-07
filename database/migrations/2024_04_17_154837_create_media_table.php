<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();

        
            $table->string('attachmentable_type');
            $table->unsignedInteger('attachmentable_id');
            $table->index(['attachmentable_type', 'attachmentable_id']);
            $table->string('collection_name')->nullable();
            $table->string('path')->nullable();
            
            $table->nullableTimestamps();
        });
    }
};
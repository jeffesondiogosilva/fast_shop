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
        Schema::create('archives', function (Blueprint $table) {            
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();            
            $table->string('path')->nullable();            
            $table->string('extension')->nullable();                        
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Relacionado a um produto                
            $table->softDeletes();
            $table->timestamps();                        

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};

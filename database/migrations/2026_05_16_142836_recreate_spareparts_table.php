<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('items');

        Schema::create('spareparts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('part_number')->nullable();
            $table->string('brand');
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('stock_minimum')->default(0);
            $table->unsignedBigInteger('price');
            $table->string('unit')->default('pcs');
            $table->enum('condition', ['new', 'used'])->default('new');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spareparts');
    }
};

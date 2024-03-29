<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('phone');
            $table->text('address');
            $table->string('date');
            $table->string('time');
            $table->integer('meal_id');
            $table->string('quantity')->default(0);
            $table->string('status')->default('تتم المراجعة');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', ['going', 'notgoing','absent', 'leave']);
            $table->date('date');
            $table->time('home_pickup_time')->nullable();
            $table->time('home_drop_off_time')->nullable();
            $table->time('school_pick_up_time')->nullable();
            $table->time('school_drop_off_time')->nullable();
            $table->boolean('picked_by_parent')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_statuses');
    }
};

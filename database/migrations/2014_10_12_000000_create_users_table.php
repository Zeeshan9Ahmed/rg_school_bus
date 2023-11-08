<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('school_id')->nullable();
            $table->integer('driver_id')->nullable();
            $table->integer('parent_id')->nullable();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('profile_completed')->default(0);
            $table->boolean('is_approved')->default(0);
            $table->string('dob')->nullable();
            $table->enum('role',['admin','parent','child','driver','school'])->nullable();
            $table->enum('gender',['male','female'])->nullable();
            // $table->enum('signin_mode',['email','social'])->nullable();
            $table->timestamp('email_verified_at')->nullable();
            // $table->timestamp('phone_verified_at')->nullable();
            $table->string('driving_license')->nullable();
            $table->string('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('class')->nullable();
            $table->string('roll_number')->nullable();
            $table->string('shift_start_time')->nullable();
            $table->string('shift_end_time')->nullable();
            $table->string('device_type')->nullable();
            $table->string('device_token')->nullable();
            $table->string('social_type')->nullable();
            $table->string('social_token')->nullable();
            $table->boolean('is_social')->nullable();
            $table->enum('is_active',[0,1])->default(1);
            
            $table->boolean('push_notification')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        User::create(['first_name' => 'Test','last_name' => 'User', 'email' => 'test@getnada.com']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

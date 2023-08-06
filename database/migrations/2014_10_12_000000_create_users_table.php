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
            $table->id(); // int(11) auto_increment PK -> uuid
            $table->string('name'); // varchar(255)
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable(); //datetime, name need to be define
            $table->string('password');
            $table->rememberToken(); // 'remember_token' varchar
            $table->timestamps(); // 'created_at' timestamp default(now)
                                    // 'updated at'
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

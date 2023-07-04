<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartsOfAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charts_of_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_type');
            $table->float('level1', 20, 2)->nullable();
            $table->float('level2', 20, 2)->nullable();
            $table->float('level3', 20, 2)->nullable();
            $table->string('name');
            $table->boolean('isSchoolFee')->default(false);
            $table->string('description')->nullable();
            $table->string('notes')->nullable();
            $table->integer('school_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('charts_of_accounts');
    }
}

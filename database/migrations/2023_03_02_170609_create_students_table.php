<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('gender');
            $table->string('from');
            $table->string('parent');
            $table->string('parent_contact')->nullable();
            $table->foreignId('class_level_id')->constrained('class_levels')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('school_id')->nullable();
            $table->boolean('permission_received')->default(false);
            $table->boolean('permission_seen')->default(false);
            $table->boolean('head_permission')->default(false);
            $table->boolean('financial_secreatary_permission')->default(false);
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
        Schema::dropIfExists('students');
    }
}

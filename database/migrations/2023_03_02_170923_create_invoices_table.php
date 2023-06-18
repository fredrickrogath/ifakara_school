<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('narration');
            $table->integer('school_id');
            $table->boolean('status')->default(false);
            $table->boolean('status_from_financial')->default(false);
            $table->boolean('starred')->default(false);
            $table->boolean('status_from_financial_bishop')->default(false);
            $table->boolean('status_from_head')->default(false);
            $table->boolean('status_from_financial_internalAuditor')->default(false);
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('invoices');
    }
}

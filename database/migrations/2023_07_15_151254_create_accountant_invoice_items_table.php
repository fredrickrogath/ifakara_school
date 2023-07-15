<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountantInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountant_invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accountant_invoice_id')->constrained('accountant_invoices')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('school_id');
            $table->string('description');
            $table->string('name');
            $table->integer('price');
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
        Schema::dropIfExists('accountant_invoice_items');
    }
}

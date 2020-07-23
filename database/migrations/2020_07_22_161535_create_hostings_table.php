<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostings', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name')->nullable();
            $table->string('storage')->nullable();
            $table->string('monthly_transfer')->nullable();
            $table->string('control_panel')->nullable();
            $table->string('domain')->nullable();
            $table->string('subdomain')->nullable();
            $table->string('email_account')->nullable();
            $table->string('database')->nullable();
            $table->integer('old_price')->nullable();
            $table->integer('final_price')->nullable();
            $table->integer('status')->default('0');
            $table->integer('created_by')->nullable();
            $table->integer('publish_by')->nullable();
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
        Schema::dropIfExists('hostings');
    }
}

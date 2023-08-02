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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->boolean('anonymous')->default(0);
            $table->bigInteger('amount');
            $table->bigInteger('fee')->default(0);
            $table->text('message')->nullable();
            $table->boolean('paid')->default(0);
            // payment related
            $table->string('uuid', 100)->unique();
            $table->string('ref_id', 100)->nullable();
            $table->string('payment_method', 50);
            $table->text('payment_url')->nullable();
            $table->text('payment_json')->nullable();
            $table->dateTime('expired_at');
            $table->dateTime('paid_at')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('campaign_id')->references('id')->on('campaigns')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};

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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->string('lawyer_name');
            $table->string('service_type');
            $table->decimal('payment_amount', 10, 2);
            $table->string('payment_method');
            $table->date('case_date');
            $table->dateTime('meeting_datetime');
            $table->string('meeting_status')->default('scheduled');
            $table->text('case_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('owner_percentages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('percentage');
            $table->enum('type', ['%', '$'])->default('%');            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('owner_percentages');
    }
};

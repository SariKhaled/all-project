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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string("student_id",20);
            $table->string("student_name",45);
            $table->string('student_email')->unique();
            $table->boolean('urgent')->default(false);
          
            $table->string('image',150)->nullable();
            $table->enum("type",["complaint","suggestion"]);
            $table->enum("status",["open","closed"])->default("open");
            $table->string("title",100);
            $table->timestamp("closed_date")->nullable();
            $table->text("response")->nullable();
            $table->text("message");
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
        Schema::dropIfExists('complaints');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('type',100)->nullable();
            $table->string('cpu')->nullable();
            $table->string('ram')->nullable();
            $table->string('storage')->nullable();
            $table->string('version_office')->nullable();
            $table->string('model')->nullable();
            $table->string('mark')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('condition')->nullable();
            $table->string('details')->nullable();
            $table->string('area')->nullable();
            $table->enum('status',[0,1])->default(1);
            $table->unsignedBigInteger('employees_id')->unique()->nullable();
            $table->foreign('employees_id')
            ->references('id')
            ->on('employees')
            ->onDelete('set null');
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
        Schema::dropIfExists('computers');
    }
}

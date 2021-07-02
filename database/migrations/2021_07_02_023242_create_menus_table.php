<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->integer('sec_no')->nullable();
            $table->string('text');
            $table->string('route')->nullable();
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
            $table->string('target')->nullable();
            $table->string('badge_text')->nullable();
            $table->string('badge_context')->nullable();
            $table->boolean('badge_pill')->nullable();
            $table->string('fa_family')->nullable();
            $table->boolean('is_section')->nullable();
            $table->boolean('is_route')->nullable();
            $table->string('can')->nullable();
            $table->foreignId('parent_id')->nullable();
            $table->timestamps();
        });

        Schema::table('menus',function (Blueprint $table){
            $table->foreign('parent_id')->references('id')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}

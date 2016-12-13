<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrawlersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawlers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en')->nullable();
            $table->string('vi')->nullable();
            $table->string('image')->nullable();
            $table->string('filmid')->nullable();
            $table->string('link')->unique();
            $table->string('year')->nullable();
            $table->string('episode')->nullable();
            $table->string('episodeid')->nullable();
            $table->string('total')->nullable();
            $table->string('trailer')->nullable();
            $table->string('category')->nullable();
            $table->string('g_folder_id')->nullable();
            $table->string('source')->nullable();
            $table->string('folder_name')->nullable();
            $table->string('enable')->default(1);
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
        Schema::dropIfExists('crawlers');
    }
}

<?php

// use PragmaRX\Tracker\Support\Migration;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackerDevicesTable extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    // private $table = 'tracker_devices';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // $this->builder->create(
        //     $this->table,
        //     function ($table) {
        //         $table->bigIncrements('id');

        //         $table->string('kind', 16)->index();
        //         $table->string('model', 64)->index();
        //         $table->string('platform', 64)->index();
        //         $table->string('platform_version', 16)->index();
        //         $table->boolean('is_mobile');

        //         $table->unique(['kind', 'model', 'platform', 'platform_version']);

        //         $table->timestamps();
        //         $table->index('created_at');
        //         $table->index('updated_at');
        //     }
        // );

        Schema::create('tracker_devices',function(Blueprint $table){
            $table->id();
            
            $table->string('kind',16)->index();
            $table->string('model',64)->index();
            $table->string('platform',64)->index();
            $table->string('platform_version',16)->index();
            $table->boolean('is_mobile');

            $table->unique(['kind','model','platform','platform_version']);
            
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
        // $this->drop($this->table);
        Schema::drop('tracker_devices');
    }
}

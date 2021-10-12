<?php

// use PragmaRX\Tracker\Support\Migration;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackerSystemClassesTable extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    // private $table = 'tracker_system_classes';

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

        //         $table->string('name')->index();

        //         $table->timestamps();
        //         $table->index('created_at');
        //         $table->index('updated_at');
        //     }
        // );
        Schema::create('tracker_system_classes',function(Blueprint $table){
            $table->id();
            
            $table->string('name')->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function migrateDown()
    {
        // $this->drop($this->table);
        Schema::drop('tracker_system_classes');
    }
}

<?php

// use PragmaRX\Tracker\Support\Migration;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackerSessionsTable extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    // private $table = 'tracker_sessions';

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

        //         $table->string('uuid')->unique()->index();
        //         $table->bigInteger('user_id')->unsigned()->nullable()->index();
        //         $table->bigInteger('device_id')->unsigned()->nullable()->index();
        //         $table->bigInteger('agent_id')->unsigned()->nullable()->index();
        //         $table->string('client_ip')->index();
        //         $table->bigInteger('referer_id')->unsigned()->nullable()->index();
        //         $table->bigInteger('cookie_id')->unsigned()->nullable()->index();
        //         $table->bigInteger('geoip_id')->unsigned()->nullable()->index();
        //         $table->boolean('is_robot');

        //         $table->timestamps();
        //         $table->index('created_at');
        //         $table->index('updated_at');
        //     }
        // );

        Schema::create('tracker_sessions',function(Blueprint $table){
            $table->id();

            $table->string('uuid')->unique()->index();
            $table->bigInteger('user_id')->unsigned()->nullable()->index();
            $table->bigInteger('device_id')->unsigned()->nullable()->index();
            $table->bigInteger('agent_id')->unsigned()->nullable()->index();
            $table->string('client_ip')->index();
            $table->bigInteger('referer_id')->unsigned()->nullable()->index();
            $table->bigInteger('cookie_id')->unsigned()->nullable()->index();
            $table->bigInteger('geoip_id')->unsigned()->nullable()->index();
            $table->boolean('is_robot');

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
        Schema::drop('tracker_sessions');
    }
}

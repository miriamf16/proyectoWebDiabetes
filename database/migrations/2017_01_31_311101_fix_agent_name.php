<?php

// use PragmaRX\Tracker\Support\Migration;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixAgentName extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    // private $table = 'tracker_agents';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('tracker_agents',function(Blueprint $table){
            $table->dropUnique('tracker_agents_name_unique');
            // $table->mediumText('name')->change();
            // $table->unique('id', 'tracker_agents_name_unique'); // this is a dummy index
        });

        Schema::table('tracker_agents',function(Blueprint $table){
            $table->mediumText('name')->change();
        });

        Schema::table('tracker_agents',function(Blueprint $table){
            $table->unique('id', 'tracker_agents_name_unique'); // this is a dummy index
        });
        // try {
        //     $this->builder->table(
        //         $this->table,
        //         function ($table) {
        //             $table->dropUnique('tracker_agents_name_unique');
        //         }
        //     );

        //     $this->builder->table(
        //         $this->table,
        //         function ($table) {
        //             $table->mediumText('name')->change();
        //         }
        //     );

        //     $this->builder->table(
        //         $this->table,
        //         function ($table) {
        //             $table->unique('id', 'tracker_agents_name_unique'); // this is a dummy index
        //         }
        //     );
        // } catch (\Exception $e) {
        //     dd($e->getMessage());
        // }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // try {
        //     $this->builder->table(
        //         $this->table,
        //         function ($table) {
        //             $table->string('name', 255)->change();
        //             $table->unique('name');
        //         }
        //     );
        // } catch (\Exception $e) {
        // }

        Schema::table('tracker_agents',function(Blueprint $table){
            $table->string('name', 255)->change();
            $table->unique('name');
        });
    }
}

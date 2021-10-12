<?php

// use PragmaRX\Tracker\Support\Migration;
use PragmaRX\Tracker\Vendor\Laravel\Models\Agent;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgentNameHash extends Migration
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

            $table->string('name_hash', 65)->nullable();
        });

        Agent::all()->each(function ($agent) {
            $agent->name_hash = hash('sha256', $agent->name);

            $agent->save();
        });

        Schema::table('tracker_agents',function(Blueprint $table){
            $table->unique('name_hash');

        });

        // try {
        //     $this->builder->table(
        //         $this->table,
        //         function ($table) {
        //             $table->dropUnique('tracker_agents_name_unique');

        //             $table->string('name_hash', 65)->nullable();
        //         }
        //     );

        //     Agent::all()->each(function ($agent) {
        //         $agent->name_hash = hash('sha256', $agent->name);

        //         $agent->save();
        //     });

        //     $this->builder->table(
        //         $this->table,
        //         function ($table) {
        //             $table->unique('name_hash');
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
        //             $table->dropUnique('tracker_agents_name_hash_unique');

        //             $table->dropColumn('name_hash');

        //             $table->mediumText('name')->unique()->change();
        //         }
        //     );
        // } catch (\Exception $e) {
        // }

        Schema::table('tracker_agents',function(Blueprint $table){
            $table->dropUnique('tracker_agents_name_hash_unique');

            $table->dropColumn('name_hash');

            $table->mediumText('name')->unique()->change();
        });
    }
}

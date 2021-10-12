<?php

// use PragmaRX\Tracker\Support\Migration;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrackerRefererColumns extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    // private $table = 'tracker_referers';

    // private $foreign = 'tracker_referers_search_terms';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // $this->builder->table(
        //     $this->table,
        //     function ($table) {
        //         $table->string('medium')->nullable()->index();
        //         $table->string('source')->nullable()->index();
        //         $table->string('search_terms_hash')->nullable()->index();
        //     }
        // );

        Schema::table('tracker_referers',function(Blueprint $table){
            $table->string('medium')->nullable()->index();
            $table->string('source')->nullable()->index();
            $table->string('search_terms_hash')->nullable()->index();
        });

        // $this->builder->table($this->foreign, function ($table) {
        //     $table->foreign('referer_id', 'tracker_referers_referer_id_fk')
        //         ->references('id')
        //         ->on('tracker_referers')
        //         ->onUpdate('cascade')
        //         ->onDelete('cascade');
        // });

        Schema::table('tracker_referers_search_terms',function(Blueprint $table){
            $table->foreign('referer_id', 'tracker_referers_referer_id_fk')
                ->references('id')
                ->on('tracker_referers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracker_referers',function(Blueprint $table){
            $table->dropColumn('medium');
            $table->dropColumn('source');
            $table->dropColumn('search_terms_hash');
        });
        // $this->builder->table(
        //     $this->table,
        //     function ($table) {
        //         $table->dropColumn('medium');
        //         $table->dropColumn('source');
        //         $table->dropColumn('search_terms_hash');
        //     }
        // );

        // $this->builder->table(
        //     $this->foreign,
        //     function ($table) {
        //         $table->dropForeign('tracker_referers_referer_id_fk');
        //     }
        // );
        
        Schema::table('tracker_referers_search_terms',function(Blueprint $table){
            $table->dropForeign('tracker_referers_referer_id_fk');
        });
    }
}

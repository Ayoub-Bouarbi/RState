<?php

use App\Models\Agent;
use App\Models\City;
use App\Models\Meeting;
use App\Models\PropertyType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->string("description");
            $table->string("address");
            $table->float("price");
            $table->string('for');
            $table->string("status");
            $table->integer("rooms");
            $table->integer("baths");
            $table->integer("beds");
            $table->foreignIdFor(PropertyType::class);
            $table->foreignIdFor(City::class);
            $table->foreignIdFor(Agent::class);
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
        Schema::dropIfExists('properties');
    }
}

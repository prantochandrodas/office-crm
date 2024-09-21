<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('customer_projects', function (Blueprint $table) {
            $table->string('status')->nullable()->comment('status:1->contact-client 2->wanted-client 3->our-client 4->manager-wanted-client 5->non-prospective-clients')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_projects', function (Blueprint $table) {
            $table->string('status')->nullable()->change();
        });
    }
};

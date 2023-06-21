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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->date('submitted_at');
            $table->smallInteger('is_qualified')->default(0);
            $table->smallInteger('is_photo_valid')->default(0);
            $table->smallInteger('payment_status')->default(0);
            $table->double('score', 10, 2)->nullable();
            $table->timestamps();
            $table->foreignId('candidate_id')->constrained('candidates');
            $table->foreignId('profile_id')->constrained('profiles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropForeign('applications_candidate_id_foreign');
            $table->dropColumn('candidate_id');
            $table->dropForeign('applications_profile_id_foreign');
            $table->dropColumn('profile_id');
        });

        Schema::dropIfExists('applications');
    }
};

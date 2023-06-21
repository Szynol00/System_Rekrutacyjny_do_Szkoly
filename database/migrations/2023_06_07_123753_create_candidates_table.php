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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('candidate_index', 6)->unique();
            $table->double('mathematics_score', 5, 2);
            $table->double('polish_score', 5, 2);
            $table->double('english_score', 5, 2);
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users');
        });

        // Generowanie unikalnego indeksu kandydata
        Schema::table('candidates', function (Blueprint $table) {
            $table->index('candidate_index');
        });
    }

    /**
     * Reverse the migrations.S
     */
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropIndex('candidates_candidate_index_index');
            $table->dropForeign('candidates_user_id_foreign');
            $table->dropColumn('user_id');
        });

        Schema::dropIfExists('candidates');
    }
};

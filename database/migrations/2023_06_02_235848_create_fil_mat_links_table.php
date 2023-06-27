<?php

use App\Models\Fil;
use App\Models\Mat;
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
        Schema::create('fil_mat_links', function (Blueprint $table) {
            $table->id('id');
            $table->foreignIdFor(Fil::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Mat::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->float('masse_horaire');
            $table->float('credit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fil_mat_links');
    }
};

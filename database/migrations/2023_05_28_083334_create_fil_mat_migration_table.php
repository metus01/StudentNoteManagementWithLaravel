<?php

use App\Models\Fil;
use App\Models\Mat;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fil_mat', function (Blueprint $table) {
            $table->foreignIdFor(Fil::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Mat::class)->constrained()->cascadeOnDelete();
            $table->primary(['fil_id' , 'mat_id']);
            $table->integer('credit');
            $table->integer('masse_horaire');
            $table->mediumText('observations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fil_mat');
    }
};

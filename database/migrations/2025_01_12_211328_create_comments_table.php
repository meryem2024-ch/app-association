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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Clé étrangère vers la table utilisateur
            $table->unsignedBigInteger('association_id'); // Clé étrangère vers la table association
            $table->text('comment');
            $table->timestamps();

            // Définir les relations
            $table->foreign('user_id')->references('id')->on('utilisateur')->onDelete('cascade');
            $table->foreign('association_id')->references('id')->on('associations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

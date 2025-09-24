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
        Schema::create('fighters', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName');
            $table->string('LastName');
            $table->unsignedInteger('age');
            $table->unsignedInteger('weight');
            $table->unsignedInteger('height');
            $table->decimal('BMI',3,1)->storedAs('weight/POW((height/100),2)');
            $table->string('BMI_Category') ->storedAs (
               "
                CASE
                    WHEN BMI < 18.5 THEN 'Maigreur'
                    WHEN BMI >= 18.5 AND BMI <= 24.9 THEN 'Normal'     
                    WHEN BMI > 25 AND BMI <= 29.9  THEN 'Surpoids'
                    ELSE 'Obesité'
                END 
               ");
            $table->string('MMA_Weight_class') -> storedAs(
                "
                CASE
                    WHEN weight >= 10 AND weight <= 56.7 THEN 'Fly weight'
                    WHEN weight >= 56.8 AND weight <= 61.2 THEN 'Bantam weight'
                    WHEN weight >= 61.3 AND weight <= 65.8 THEN 'Feather weight'
                    WHEN weight >= 65.9 AND weight <= 70.3 THEN 'Light weight'
                    WHEN weight >= 70.4 AND weight <= 77.1 THEN 'Welter weight'
                    WHEN weight >= 77.2 AND weight <= 83.9 THEN 'Middle weight'
                    WHEN weight >= 84.0 AND weight <= 93.0 THEN 'Light Heavy weight'
                    WHEN weight >= 93.1 AND weight <= 120.2 THEN 'Heavy weight'
                    ELSE 'Super Heavy'
                END
                "
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fighters');
    }
};

<?php

declare(strict_types=1);

namespace Jackhelodeon;

class BmiCalculator
{

    public const BMI_UNDER = "Your result suggests you are underweight!";
    public const BMI_NORMAL = "Your result suggests you are a healthy weight :)";
    public const BMI_OVER = "Your result suggests you are overweight!";
    public const BMI_EXTREME = "Your result suggests you are extremely fat!!!";
    public const BMI_SUP_EXTREME = "Your result suggests you are extremely super fat!!!";

    public function __construct(
        private int|float $weight,
        private int|float $height,
        private int $units,
        private int|float $bmi = 0,
    ) {}

    public function doBMI(): array
    {
        $units = $this->units;
        if ($units === 1) {
            $this->calculateImperial();
        } else {
            $this->calculateMetric();
        }

        $result = $this->bmi;
        if ($result < 18.5) {
            $message = self::BMI_UNDER;
        } elseif ($result >= 18.5 && $result <= 24.9) {
            $message = self::BMI_NORMAL;
        } elseif ($result >= 25 && $result <= 29.9) {
            $message = self::BMI_OVER;
        } elseif ($result >= 30 && $result <= 39.9) {
            $message = self::BMI_EXTREME;
        } else {
            $message = self::BMI_SUP_EXTREME;
        }

        return [
            'bmi' => round($result, 1),
            'message' => $message,
            'type' => $units === 1 ? 1 : 0,
        ];
    }

    private function calculateMetric(): void
    {
        $weight = $this->weight;
        $height = $this->height;

        // convert cm to m
        $heightMetres = $height / 100;

        $result = ($weight / ($heightMetres * $heightMetres));
        $this->bmi = $result;
    }

    private function calculateImperial(): void
    {
        $weight = $this->weight;
        $height = $this->height;

        // convert st to ib
        $weightPounds = $weight * 14;

        $result = ($weightPounds / ($height * $height)) * 703;
        $this->bmi = $result;
    }
}

// https://drbillsukala.com/body-mass-index-calculator/#:~:text=BMI%20imperial%20formula&text=The%20US%20imperial%20formula%20for,in%20inches%20(height%20squared).
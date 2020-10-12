<?php declare(strict_types=1);


class InvestmentCalculator
{
    public function calculateTotal(int $sum, int $term, int $percent): float
    {
        $invest = $sum;
        for ($year = 1; $year <= $term; $year++) {
            $invest += $invest * $percent / 100;
        }
        return $invest;
    }
}
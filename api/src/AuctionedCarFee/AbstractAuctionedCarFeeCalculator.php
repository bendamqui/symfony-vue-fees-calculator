<?php

namespace App\AuctionedCarFee;

abstract class AbstractAuctionedCarFeeCalculator
{
    public function __construct(protected readonly float $price){}

    /**
     * Abstract functions that don't need to be part of the interface but that make sure
     * the children provide a way to access the data required to perform the calculations.
     */
    protected abstract function getStorageFees(): float;
    protected abstract function getBaseFeePercentage(): float;
    protected abstract function getMinBaseFees(): float;
    protected abstract function getMaxBaseFees(): float;
    protected abstract function getSpecialFeesPercentage(): float;

    public function calculateBaseBuyerFees(): float
    {
        $fees = $this->price * $this->getBaseFeePercentage();
        $adjustedFees = match (true) {
            $fees <= $this->getMinBaseFees() => $this->getMinBaseFees(),
            $fees >= $this->getMaxBaseFees() => $this->getMaxBaseFees(),
            default => $fees
        };
        return round($adjustedFees, 2);
    }

    public function calculateAssociationFees(): float
    {
        $amount = match (true) {
            $this->price >= 1 && $this->price <= 500 => 5,
            $this->price > 500 && $this->price <= 1000 => 10,
            $this->price > 1000 && $this->price <= 3000 => 15,
            $this->price > 3000 => 20,
            default => 5
        };
        return round($amount, 2);
    }

    public function calculateSpecialSellerFees(): float
    {
        return round($this->price * $this->getSpecialFeesPercentage(),2);
    }

    public function calculateStorageFees(): float
    {
        return round($this->getStorageFees(),2);
    }

    public function calculateTotalFees(): float
    {
        $sum = array_sum([
            $this->price,
            $this->calculateBaseBuyerFees(),
            $this->calculateSpecialSellerFees(),
            $this->calculateAssociationFees(),
            $this->calculateStorageFees()
        ]);
        return round($sum, 2);
    }
}

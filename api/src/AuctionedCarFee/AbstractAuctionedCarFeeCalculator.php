<?php

namespace App\AuctionedCarFee;

abstract class AbstractAuctionedCarFeeCalculator
{
    public function __construct(protected readonly float $price){}

    /**
     * Abstract functions that don't need to be part of the interface but that make sure
     * the children provide a way to access the data required to perform the calculations.
     */
    protected abstract function getStorageFee(): float;
    protected abstract function getBaseFeePercentage(): float;
    protected abstract function getMinBaseFee(): float;
    protected abstract function getMaxBaseFee(): float;
    protected abstract function getSpecialFeePercentage(): float;

    public function calculateBaseBuyerFee(): float
    {
        $fees = $this->price * $this->getBaseFeePercentage();
        $adjustedFees = match (true) {
            $fees <= $this->getMinBaseFee() => $this->getMinBaseFee(),
            $fees >= $this->getMaxBaseFee() => $this->getMaxBaseFee(),
            default => $fees
        };
        return round($adjustedFees, 2);
    }

    public function calculateAssociationFee(): float
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

    public function calculateSpecialSellerFee(): float
    {
        return round($this->price * $this->getSpecialFeePercentage(),2);
    }

    public function calculateStorageFee(): float
    {
        return round($this->getStorageFee(),2);
    }

    public function calculateTotalFees(): float
    {
        $sum = array_sum([
            $this->price,
            $this->calculateBaseBuyerFee(),
            $this->calculateSpecialSellerFee(),
            $this->calculateAssociationFee(),
            $this->calculateStorageFee()
        ]);
        return round($sum, 2);
    }
}

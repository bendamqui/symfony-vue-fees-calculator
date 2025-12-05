<?php
namespace App\AuctionedCarFee;

class DeluxeAuctionedCarFeeCalculator extends AbstractAuctionedCarFeeCalculator implements AuctionedCarFeeCalculatorInterface
{
    protected function getStorageFee(): float
    {
        return 100;
    }

    protected function getBaseFeePercentage(): float
    {
        return 0.1;
    }

    protected function getMinBaseFee(): float
    {
        return 25;
    }

    protected function getMaxBaseFee(): float
    {
        return 200;
    }

    protected function getSpecialFeePercentage(): float
    {
        return 0.04;
    }
}

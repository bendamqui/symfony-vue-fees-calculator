<?php
namespace App\AuctionedCarFee;

class DeluxeAuctionedCarFeeCalculator extends AbstractAuctionedCarFeeCalculator implements AuctionedCarFeeCalculatorInterface
{
    protected function getStorageFees(): float
    {
        return 100;
    }

    protected function getBaseFeePercentage(): float
    {
        return 0.1;
    }

    protected function getMinBaseFees(): float
    {
        return 25;
    }

    protected function getMaxBaseFees(): float
    {
        return 200;
    }

    protected function getSpecialFeesPercentage(): float
    {
        return 0.04;
    }
}

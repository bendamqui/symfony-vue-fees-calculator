<?php
namespace App\AuctionedCarFee;

class StandardAuctionedCarFeeCalculator extends AbstractAuctionedCarFeeCalculator implements AuctionedCarFeeCalculatorInterface
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
        return 10;
    }

    protected function getMaxBaseFee(): float
    {
        return 50;
    }
    protected function getSpecialFeePercentage(): float
    {
        return 0.02;
    }
}

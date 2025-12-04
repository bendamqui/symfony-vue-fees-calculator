<?php
namespace App\AuctionCarFees;

class StandardAuctionCarFees extends AbstractAuctionCarFees implements IAuctionCarFees
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
        return 10;
    }

    protected function getMaxBaseFees(): float
    {
        return 50;
    }
    protected function getSpecialFeesPercentage(): float
    {
        return 0.02;
    }
}

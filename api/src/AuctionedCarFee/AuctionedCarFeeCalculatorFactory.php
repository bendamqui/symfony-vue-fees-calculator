<?php

namespace App\AuctionedCarFee;

class AuctionedCarFeeCalculatorFactory
{
    public function make(AuctionedCarFeeEnum $type, float $price): AuctionedCarFeeCalculatorInterface
    {
        return match ($type) {
            AuctionedCarFeeEnum::Standard => new StandardAuctionedCarFeeCalculator($price),
            AuctionedCarFeeEnum::Deluxe => new DeluxeAuctionedCarFeeCalculator($price),
        };
    }
}

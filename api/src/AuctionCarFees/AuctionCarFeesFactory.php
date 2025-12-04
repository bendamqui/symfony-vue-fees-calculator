<?php

namespace App\AuctionCarFees;

class AuctionCarFeesFactory
{
    public function make(AuctionCarFeesEnum $type, float $price): IAuctionCarFees
    {
        return match ($type) {
            AuctionCarFeesEnum::Standard => new StandardAuctionCarFees($price),
            AuctionCarFeesEnum::Deluxe => new DeluxeAuctionCarFees($price),
        };
    }
}

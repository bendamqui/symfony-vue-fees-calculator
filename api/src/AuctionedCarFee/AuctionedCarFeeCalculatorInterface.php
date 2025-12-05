<?php

namespace App\AuctionedCarFee;

interface AuctionedCarFeeCalculatorInterface
{
    public function calculateBaseBuyerFees(): float;
    public function calculateSpecialSellerFees(): float;
    public function calculateAssociationFees(): float;
    public function calculateStorageFees(): float;
    public function calculateTotalFees(): float;
}

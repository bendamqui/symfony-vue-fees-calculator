<?php

namespace App\AuctionedCarFee;

interface AuctionedCarFeeCalculatorInterface
{
    public function calculateBaseBuyerFee(): float;
    public function calculateSpecialSellerFee(): float;
    public function calculateAssociationFee(): float;
    public function calculateStorageFee(): float;
    public function calculateTotalFees(): float;
}

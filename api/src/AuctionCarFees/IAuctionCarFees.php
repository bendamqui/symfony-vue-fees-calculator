<?php

namespace App\AuctionCarFees;

interface IAuctionCarFees
{
    public function calculateBaseBuyerFees(): float;
    public function calculateSpecialSellerFees(): float;
    public function calculateAssociationFees(): float;
    public function calculateStorageFees(): float;
    public function calculateTotalFees(): float;
}

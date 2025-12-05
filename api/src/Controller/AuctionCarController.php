<?php

namespace App\Controller;

use App\AuctionedCarFee\AuctionedCarFeeEnum;
use App\AuctionedCarFee\AuctionedCarFeeCalculatorFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;

class AuctionCarController extends AbstractController
{
    #[Route('/auction-car/fees')]
    public function home(
        #[MapQueryParameter] float               $price,
        #[MapQueryParameter] AuctionedCarFeeEnum $carType,
        AuctionedCarFeeCalculatorFactory         $auctionCarFeesFactory
    ): Response
    {
        $auctionCarFees = $auctionCarFeesFactory->make($carType, $price);
        return $this->json([
            "price" => $price,
            "carType" => $carType,
            "baseBuyerFee" => $auctionCarFees->calculateBaseBuyerFee(),
            "specialSellerFee" => $auctionCarFees->calculateSpecialSellerFee(),
            "extraAssociationFee" => $auctionCarFees->calculateAssociationFee(),
            "storageFee" => $auctionCarFees->calculateStorageFee(),
            "total" => $auctionCarFees->calculateTotalFees()
        ]);
    }
}

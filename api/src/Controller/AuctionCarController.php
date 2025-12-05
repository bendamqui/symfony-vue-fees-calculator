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
        #[MapQueryParameter] float               $price, // @todo >= 1
        #[MapQueryParameter] AuctionedCarFeeEnum $carType,
        AuctionedCarFeeCalculatorFactory         $auctionCarFeesFactory
    ): Response
    {
        $auctionCarFees = $auctionCarFeesFactory->make($carType, $price);
        return $this->json([
            "price" => $price,
            "carType" => $carType,
            "baseBuyerFees" => $auctionCarFees->calculateBaseBuyerFees(),
            "specialSellerFees" => $auctionCarFees->calculateSpecialSellerFees(),
            "extraAssociationFees" => $auctionCarFees->calculateAssociationFees(),
            "storageFees" => $auctionCarFees->calculateStorageFees(),
            "total" => $auctionCarFees->calculateTotalFees()
        ]);
    }
}

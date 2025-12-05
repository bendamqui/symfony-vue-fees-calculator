<?php

namespace App\Tests;

use App\AuctionedCarFee\AuctionedCarFeeEnum;
use App\AuctionedCarFee\AuctionedCarFeeCalculatorFactory;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class AuctionCarFeesTest extends TestCase
{
    #[DataProvider('carsDataProvider')]
    public function testSomething(AuctionedCarFeeEnum $type, float $price, array $expected)
    {
        $auctionCarFees = new AuctionedCarFeeCalculatorFactory()->make($type, $price);
        $this->assertEquals($expected["baseBuyerFee"], $auctionCarFees->calculateBaseBuyerFee());
        $this->assertEquals($expected["specialSellerFee"], $auctionCarFees->calculateSpecialSellerFee());
        $this->assertEquals($expected["associationFee"], $auctionCarFees->calculateAssociationFee());
        $this->assertEquals($expected["storageFee"], $auctionCarFees->calculateStorageFee());
        $this->assertEquals($expected["total"], $auctionCarFees->calculateTotalFees());
    }

    public static function carsDataProvider(): array
    {
        return [
            [
                "type" => AuctionedCarFeeEnum::Standard,
                "price" => 398.00,
                "expected" => self::makeCarFees(
                    39.80,
                    7.96,
                    5.00,
                    100.00,
                    550.76

                )
            ],
            [
                "type" => AuctionedCarFeeEnum::Standard,
                "price" => 501.00,
                "expected" => self::makeCarFees(
                    50.00,
                    10.02,
                    10.00,
                    100.00,
                    671.02

                )
            ],
            [
                "type" => AuctionedCarFeeEnum::Standard,
                "price" => 57.00,
                "expected" => self::makeCarFees(
                    10.00,
                    1.14,
                    5.00,
                    100.00,
                    173.14

                )
            ],
            [
                "type" => AuctionedCarFeeEnum::Deluxe,
                "price" => 1800.00,
                "expected" => self::makeCarFees(
                    180.00,
                    72.00,
                    15.00,
                    100.00,
                    2167.00

                )
            ],
            [
                "type" => AuctionedCarFeeEnum::Standard,
                "price" => 1100,
                "expected" => self::makeCarFees(
                    50.00,
                    22.00,
                    15.00,
                    100.00,
                    1287.00

                )
            ],
            [
                "type" => AuctionedCarFeeEnum::Deluxe,
                "price" => 1000000.00,
                "expected" => self::makeCarFees(
                    200.00,
                    40000.00,
                    20.00,
                    100.00,
                    1040320.00

                )
            ]
        ];
    }

    public static function makeCarFees(
        float $baseBuyerFees,
        float $specialSellerFees,
        float $associationFees,
        float $storageFees,
        float $total,
    ): array
    {
        return [
            "baseBuyerFee" => $baseBuyerFees,
            "specialSellerFee" => $specialSellerFees,
            "associationFee" => $associationFees,
            "storageFee" => $storageFees,
            "total" => $total
        ];
    }
}

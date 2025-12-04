<?php

namespace App\Tests;

use App\AuctionCarFees\AuctionCarFeesEnum;
use App\AuctionCarFees\AuctionCarFeesFactory;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class AuctionCarFeesTest extends TestCase
{
    #[DataProvider('carsDataProvider')]
    public function testSomething(AuctionCarFeesEnum $type, float $price, array $expected)
    {
        $auctionCarFees = new AuctionCarFeesFactory()->make($type, $price);
        $this->assertEquals($expected["baseBuyerFees"], $auctionCarFees->calculateBaseBuyerFees());
        $this->assertEquals($expected["specialSellerFees"], $auctionCarFees->calculateSpecialSellerFees());
        $this->assertEquals($expected["associationFees"], $auctionCarFees->calculateAssociationFees());
        $this->assertEquals($expected["storageFees"], $auctionCarFees->calculateStorageFees());
        $this->assertEquals($expected["total"], $auctionCarFees->calculateTotalFees());
    }

    public static function carsDataProvider(): array
    {
        return [
            [
                "type" => AuctionCarFeesEnum::Standard,
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
                "type" => AuctionCarFeesEnum::Standard,
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
                "type" => AuctionCarFeesEnum::Standard,
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
                "type" => AuctionCarFeesEnum::Deluxe,
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
                "type" => AuctionCarFeesEnum::Standard,
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
                "type" => AuctionCarFeesEnum::Deluxe,
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
            "baseBuyerFees" => $baseBuyerFees,
            "specialSellerFees" => $specialSellerFees,
            "associationFees" => $associationFees,
            "storageFees" => $storageFees,
            "total" => $total
        ];
    }
}

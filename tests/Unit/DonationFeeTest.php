<?php

namespace Tests\Unit;

use App\DonationFee;
use App\Exceptions\CommissionPercentageException;
use App\Exceptions\DonationException;
use Mockery\Exception;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DonationFeeTest extends TestCase
{
    /**
     * Test de la commission prélevée par le site.
     *
     * @throws \Exception
     */
    public function testCommissionAmountGetter()
    {
        // Etant donné une donation de 200 et une commission de 10%.
        $donationFees = new DonationFee(200, 10);

        // Lorsqu'on appelle la méthode getCommissionAmount().
        $actual = $donationFees->getCommissionAmount();

        // Alors la Valeur de la commission doit être de 20.
        $expected = 20;
        $this->assertEquals($expected, $actual);
    }

    public function testAmountCollected()
    {
        // Etant donné une donation de 200 et une commission de 10%.
        $donationFees = new DonationFee(200, 10);

        // Lorsqu'on appelle la méthode getAmountCollected().
        $actual = $donationFees->getAmountCollected();

        // Alors la valeur du montant perçu par le porteur du projet doit être de 180.
        $expected = 180;
        $this->assertEquals($expected, $actual);
    }

    public function testValidPercentageException()
    {
        $this->expectException(CommissionPercentageException::class);
        $donationFees = new DonationFee(300, 33);
    }

    public function testValidDonationException()
    {
        $this->expectException(DonationException::class);
        $donationFees = new DonationFee(33, 10);
    }

    public function testFixedAndCommissionFeeAmount()
    {
        // Etant donné une donation de 500 et une commission de 10%.
        $donationFees = new DonationFee(500, 10);

        // Lorsqu'on appelle la méthode getFixedAndCommissionFeeAmount().
        $actual = $donationFees->getFixedAndCommissionFeeAmount();

        // Alors la valeur du montant total de la commission doit être de 100.
        $expected = 100;
        $this->assertEquals($expected, $actual);
    }

    public function testMaximumFeeAmount()
    {
        // Etant donné une donation de 1000000 et une commission de 25%.
        $donationFees = new DonationFee(1000000, 25);

        // Lorsqu'on appelle la méthode getFixedAndCommissionFeeAmount().
        $actual = $donationFees->getFixedAndCommissionFeeAmount();

        // Alors la valeur du montant total de la commission doit être de 500 MAXIMUM.
        $expected = 500;
        $this->assertEquals($expected, $actual);
    }
}

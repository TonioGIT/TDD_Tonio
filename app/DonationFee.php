<?php
/**
 * Created by PhpStorm.
 * User: laurentbeauvisage
 * Date: 07/05/2018
 * Time: 14:07
 */

namespace App;


use App\Exceptions\CommissionPercentageException;
use App\Exceptions\DonationException;
use Tests\TestCase;
use App\Commission;

class DonationFee
{

    private $donation;
    private $commissionPercentage;
    const fixedFee = 50;


    public function __construct($donation, $commissionPercentage)
    {
        if ($commissionPercentage < 0 || $commissionPercentage > 30)
        {
//             throw new \Exception('Commission percentage invalid !');
            throw new CommissionPercentageException();
        }
        if (is_int($donation) && $donation < 100)
        {
            throw new DonationException();
        }

        $this->donation = $donation;
        $this->commissionPercentage = $commissionPercentage;
    }

    public function getCommissionAmount()
    {
        $commissionAmount = $this->donation/100 * $this->commissionPercentage;
        return $commissionAmount;
    }

    public function getAmountCollected()
    {
        $amountCollected = $this->donation - ($this->getCommissionAmount()) - self::fixedFee;
        return $amountCollected;
    }

    public function getFixedAndCommissionFeeAmount()
    {
        $fixedAndCommissionFeeAmount = $this->getCommissionAmount() + self::fixedFee;

        if ($fixedAndCommissionFeeAmount > 500)
        {
            $this->donation = $this->donation + ($fixedAndCommissionFeeAmount - 500);
            $fixedAndCommissionFeeAmount = 500;
        }

        return $fixedAndCommissionFeeAmount;
    }

    public function getSummary()
    {
        $summaryArray = [
            "donation" => $this->donation,
            "fixedFee" => self::fixedFee,
            "commission" => $this->getCommissionAmount(),
            "fixedAndCommission" => $this->getFixedAndCommissionFeeAmount(),
            "amountCollected" => $this->getAmountCollected(),
        ];
        return $summaryArray;
    }
}
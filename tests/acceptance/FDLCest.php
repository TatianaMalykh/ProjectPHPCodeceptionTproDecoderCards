<?php

include('TestsCest.php');

class FDLCest extends TestsCest
{
    public $guid = 'MXLB-7560-BQCK-1508';
    public $currency = 'EUR';
    public $amount = '11';
    public $environment = "test";
    public $f_extended = '301';

    public function SmsNon3dMerchantSide(AcceptanceTester $I)
    {
        $rs = "FD01";
        $card = $I->card_fdl_No3D_test();
        $this->smsNon3d($I, $rs, $card);
    }

    public function SmsNon3dGWSide(AcceptanceTester $I)
    {
        $rs = "FD03";
        $card = $I->card_fdl_No3D_test();
        $this->smsNon3d($I, $rs, $card);
    }

    public function DmsNon3dMerchantSide(AcceptanceTester $I)
    {
        $rs = "FD01";
        $card = $I->card_fdl_No3D_test();
        $this->dmsNon3d($I, $rs, $card);
    }

    public function DmsNon3dGWSide(AcceptanceTester $I)
    {
        $rs = "FD03";
        $card = $I->card_fdl_No3D_test();
        $this->dmsNon3d($I, $rs, $card);
    }

    public function Sms3dMerchantSide(AcceptanceTester $I)
    {
        $rs = "FD02";
        $card = $I->card_fdl_3D_test();
        $this->sms3d($I, $rs, $card);
    }

    public function Sms3dGWSide(AcceptanceTester $I)
    {
        $rs = "FD04";
        $card = $I->card_fdl_3D_test();
        $this->sms3d($I, $rs, $card);
    }

    public function Dms3dMerchantSide(AcceptanceTester $I)
    {
        $rs = "FD02";
        $card = $I->card_fdl_3D_test();
        $this->dms3d($I, $rs, $card);
    }


    public function Dms3dGWSide(AcceptanceTester $I)
    {
        $rs = "FD04";
        $card = $I->card_fdl_3D_test();
        $this->dms3d($I, $rs, $card);
    }

    public function refundSms(AcceptanceTester $I)
    {
        $rs = "FD01";
        $card = $I->card_fdl_No3D_test();
        $this->refund($I, $rs, $card);
    }
    public function recurrentSmsNo3D(AcceptanceTester $I)
    {
        $rsOriginalTransaction = "FD01";
        $rsRecurrent = "FD05";
        $card = $I->card_fdl_No3D_test();
        $this->recurrentSms($I, $rsOriginalTransaction, $rsRecurrent, $card);
    }
}
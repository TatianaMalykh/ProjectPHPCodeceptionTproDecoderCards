<?php

include('TestsCest.php');

class PayOnCest extends TestsCest
{

    public $guid = 'MXLB-7560-BQCK-1508';
    public $currency = 'EUR';
    public $amount = '105';
    public $environment = "test";
    public $f_extended = '301';

    public function SmsNon3dMerchantSide(AcceptanceTester $I)
    {
        $rs = "PO01";
        $card = $I->card_payOn_3D_test();
        $this->smsNon3d($I, $rs, $card);
    }

    protected function SmsNon3dGWSide(AcceptanceTester $I)
    {
        $rs = "PO03";
        $card = $I->card_payOn_3D_test();
        $this->smsNon3d($I, $rs, $card);
    }

    protected function DmsNon3dMerchantSide(AcceptanceTester $I)
    {
        $rs = "PO01";
        $card = $I->card_payOn_3D_test();
        $this->dmsNon3d($I, $rs, $card);
    }

    protected function DmsNon3dGWSide(AcceptanceTester $I)
    {
        $rs = "PO03";
        $card = $I->card_payOn_3D_test();
        $this->dmsNon3d($I, $rs, $card);
    }

    protected function Sms3dMerchantSide(AcceptanceTester $I)
    {
        $rs = "PO01";
        $card = $I->card_payOn_3D_test();
        $this->sms3d($I, $rs, $card);
    }

    protected function Sms3dGWSide(AcceptanceTester $I)
    {
        $rs = "PO03";
        $card = $I->card_payOn_3D_test();
        $this->sms3d($I, $rs, $card);
    }

    protected function Dms3dMerchantSide(AcceptanceTester $I)
    {
        $rs = "PO01";
        $card = $I->card_payOn_3D_test();
        $this->dms3d($I, $rs, $card);
    }


    protected function Dms3dGWSide(AcceptanceTester $I)
    {
        $rs = "PO03";
        $card = $I->card_payOn_3D_test();
        $this->dms3d($I, $rs, $card);
    }

    protected function CrdNon3dMerchantSide(AcceptanceTester $I)
    {
        $rs = "PO01";
        $card = $I->card_payOn_3D_test();
        $this->crd($I, $rs, $card);
    }

    protected function CrdNon3dGWSide(AcceptanceTester $I)
    {
        $rs = "PO03";
        $card = $I->card_payOn_3D_test();
        $this->crd($I, $rs, $card);
    }
    protected function P2pNon3dMerchantSide(AcceptanceTester $I)
    {
        $rs = "PO01";
        $card = $I->card_payOn_3D_test();
        $this->p2p($I, $rs, $card);
    }

    protected function P2pNon3dGWSide(AcceptanceTester $I)
    {
        $rs = "PO03";
        $card = $I->card_payOn_3D_test();
        $this->p2p($I, $rs, $card);
    }

    protected function recurrentSmsNo3D(AcceptanceTester $I)
    {
        $rsOriginalTransaction = "PO01";
        $rsRecurrent = "PO05";
        $card = $I->card_payOn_3D_test();
        $this->recurrentSms($I, $rsOriginalTransaction, $rsRecurrent, $card);
    }

    protected function refundSms(AcceptanceTester $I)
    {
        $rs = "PO01";
        $card = $I->card_payOn_3D_test();
        $this->refund($I, $rs, $card);
    }

}
<?php

use Helper\CardsConfig;

include('TestsCest.php');

class TransactProCest extends TestsCest
{
    public $guid = 'MXLB-7560-BQCK-1508';
    public $currency = 'EUR';
    public $amount = '10050';
    public $environment = "test";
    public $f_extended = '301';

    protected function SmsNon3dMerchantSide(AcceptanceTester $I)
    {
        $rs = "TP01";
        $card = CardsConfig::$card_tpro_3D_test;
        $this->smsNon3d($I, $rs, $card);
    }

    protected function SmsNon3dGWSide(AcceptanceTester $I)
    {
        $rs = "TP03";
        $card = CardsConfig::$card_tpro_3D_test;
        $this->smsNon3d($I, $rs, $card);
    }

    protected function DmsNon3dMerchantSide(AcceptanceTester $I)
    {
        $rs = "TP01";
        $card = CardsConfig::$card_tpro_3D_test;
        $this->dmsNon3d($I, $rs, $card);
    }

    protected function DmsNon3dGWSide(AcceptanceTester $I)
    {
        $rs = "TP03";
        $card = CardsConfig::$card_tpro_3D_test;
        $this->dmsNon3d($I, $rs, $card);
    }

    public function Sms3dMerchantSide(AcceptanceTester $I)
    {
        $rs = "TP02";
        $card = $I->card_tpro_prod_6850();
        $this->sms3d($I, $rs, $card);
    }

    protected function Sms3dGWSide(AcceptanceTester $I)
    {
        $rs = "TP04";
        $card = CardsConfig::$card_tpro_3D_test;
        $this->sms3d($I, $rs, $card);
    }

    protected function Dms3dMerchantSide(AcceptanceTester $I)
    {
        $rs = "TP02";
        $card = CardsConfig::$card_tpro_3D_test;
        $this->dms3d($I, $rs, $card);
    }


    protected function Dms3dGWSide(AcceptanceTester $I)
    {
        $rs = "TP04";
        $card = CardsConfig::$card_tpro_3D_test;
        $this->dms3d($I, $rs, $card);
    }

    protected function CrdNon3dMerchantSide(AcceptanceTester $I)
    {
        $rs = "TP01";
        $card = CardsConfig::$card_tpro_3D_test;
        $this->crd($I, $rs, $card);
    }

    protected function CrdNon3dGWSide(AcceptanceTester $I)
    {
        $rs = "TP03";
        $card = CardsConfig::$card_tpro_3D_test;
        $this->crd($I, $rs, $card);
    }
    protected function P2pNon3dMerchantSide(AcceptanceTester $I)
    {
        $rs = "TP01";
        $card = CardsConfig::$card_tpro_3D_test;
        $this->p2p($I, $rs, $card);
    }

    protected function P2pNon3dGWSide(AcceptanceTester $I)
    {
        $rs = "TP03";
        $card = CardsConfig::$card_tpro_3D_test;
        $this->p2p($I, $rs, $card);
    }

    protected function recurrentSmsNo3D(AcceptanceTester $I)
    {
        $rsOriginalTransaction = "TP01";
        $rsRecurrent = "TP05";
        $card = CardsConfig::$card_tpro_3D_test;
        $this->recurrentSms($I, $rsOriginalTransaction, $rsRecurrent, $card);
    }

    protected function refundSms(AcceptanceTester $I)
    {
        $rs = "TP01";
        $card = CardsConfig::$card_tpro_3D_test;
        $this->refund($I, $rs, $card);
    }
}
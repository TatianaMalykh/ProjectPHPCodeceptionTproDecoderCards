<?php

namespace Helper;

use AcceptanceTester;
use Codeception\Module;
use Exception;

class FormsFunctions extends Module
{

    public function fillFields(AcceptanceTester $I, $mode, $params = array())
    {
        foreach ($params as $key => $value) {
            $this->checkElement($I, $mode, $key, $value);
        };
    }

    public function checkElement(AcceptanceTester $I, $mode, $key, $value)
    {
        try {
            if (!$value) {
                $I->click([$mode => $key]);
            } else if ($value && $key != "cc_expire_month" && $key != "cc_expire_year") {
                $I->fillField($key, $value);
            } else if ($key == "cc_expire_month" OR $key == "cc_expire_year") {
                $I->selectOption($key, $value);
            }

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function init(AcceptanceTester $I, $paramsInit, $type, $rs)
    {
        $I->amOnPage('init.php');
        $paramsInit[$rs] = '';
        $paramsInit[$type] = '';
        $this->fillFields($I, "id", $paramsInit);
        $I->wait(1);
        $I->click('Process');
        $body = $I->grabTextFrom('body');
        $pattern_merch_side = '/OK:([a-f0-9]{1,40}$)/';
        $pattern_gw_side = '/RedirectOnsite:(.*)/';

        if (preg_match($pattern_merch_side, $body, $matches)) {
            $init_transaction_id = trim($matches[1]);
            $I->comment("Init_transaction is success, enter card data to merchant side, id: " . $init_transaction_id);
            $I->amOnPage('charge.php');

            return $init_transaction_id;
        } else if (preg_match($pattern_gw_side, $body, $matches)) {
            $link = trim($matches[1]);
            $I->amOnUrl($link);
            $pattern_init_id = '/OK:([a-f0-9]+)~(.*)/';
            preg_match($pattern_init_id, $body, $matches);
            $init_transaction_id = trim($matches[1]);
            $I->comment("Init_transaction is success, enter card data to GW side, id: " . $init_transaction_id);

            return $init_transaction_id;
        }

        $I->assertTrue(false, "Init_transaction is failed: " . $body);
        return null;
    }

    public function charge(AcceptanceTester $I, $type, $paramsCharge, $card, $init_transaction_id)
    {
        $params_charge = $paramsCharge + $card;
        $params_charge['init_transaction_id'] = $init_transaction_id;
        $params_charge[$type] = '';

        $I->fillFields($I, "id", $params_charge);

        $I->wait(1);
        $I->click(['id' => 'ln_submit']);
        $I->wait(1);
        $body = $I->grabTextFrom('body');
        return $body;
    }

    public function completeDMS(AcceptanceTester $I, $paramsCompleteDMS, $init_transaction_id, $environment)
    {
        $I->amOnUrl('http://192.168.1.10/test_fpn_ppg/forms/complete.php');
        $paramsCompleteDMS[$environment] = '';
        $paramsCompleteDMS['init_transaction_id'] = $init_transaction_id;
        $I->fillFields($I, "id", $paramsCompleteDMS);

        $I->wait(1);
        $I->click('Process');
        $I->wait(1);
        $body = $I->grabTextFrom('body');
        return $body;
    }

    public function check3D(AcceptanceTester $I, $body, $card)
    {
        $pattern_3D = '/Redirect:(.*)/';
        if (preg_match($pattern_3D, $body, $matches)) {
            $link = trim($matches[1]);
            $I->amOnUrl($link);
        }
        $I->fillFields($I, "id", $card);
        $I->wait(1);
        if($card['issuer']=='FDL') {$I->click('submit');};
        if($card['issuer']=='TPro'){ $I->click('validate_3d');};
    }

    public function refund(AcceptanceTester $I, $guid, $init_transaction_id, $environment, $amount)
    {
        $I->amOnUrl('http://192.168.1.10/test_fpn_ppg/forms/refund.php');
        $params_refund['account_guid'] = $guid;
        $params_refund['init_transaction_id'] = $init_transaction_id;
        $params_refund['amount_to_refund'] = $amount;
        $params_refund[$environment.'_refund'] = '';

        $I->fillFields($I, "id", $params_refund);

        $I->click('Process');
        $body = $I->grabTextFrom('body');
        $I->wait(1);

        $I->assertRegExp('/Refund Success/', $body, "Refund failed");

    }

    public function initRecurrent(AcceptanceTester $I, $guid, $init_transaction_id, $type, $amount, $rsRecurrent)
    {
        $I->amOnUrl('http://192.168.1.10/test_fpn_ppg/forms/initrec.php');
        $params_recurrent['guid'] = $guid;
        $params_recurrent['original_init_id'] = $init_transaction_id;
        $params_recurrent['amount'] = $amount;
        $params_recurrent[$type] = '';
        $params_recurrent[$rsRecurrent] = '';

        $I->fillFields($I, "id", $params_recurrent);

        $I->click('Process');

        $body = $I->grabTextFrom('body');
        $I->wait(1);
        $pattern_merch_side = '/OK:([a-f0-9]{1,40}$)/';
        if (preg_match($pattern_merch_side, $body, $matches)) {
            $init_transaction_id = trim($matches[1]);
            $I->amOnPage('charge.php');

            return $init_transaction_id;
        }

        $I->assertTrue(false, "Init_recurrent is failed: " . $body);
        return null;
    }

    public function chargeRecurrent(AcceptanceTester $I, $type, $f_extended, $init_transaction_id)
    {
        $I->amOnUrl('http://192.168.1.10/test_fpn_ppg/forms/chargerec.php');
        $params_recurrent['init_transaction_id'] = $init_transaction_id;
        $params_recurrent[$type] = '';
        $params_recurrent['f_extended'] = $f_extended;
        $I->fillFields($I, "id", $params_recurrent);
        $I->wait(1);
        $I->click('Process');

    }

    public function status(AcceptanceTester $I, $params_status, $init_transaction_id, $environment)
    {
        $I->amOnUrl('http://192.168.1.10/test_fpn_ppg/forms/status.php');
        $params_status['init_transaction_id'] = $init_transaction_id;
        $params_status[$environment] = '';

        $I->fillFields($I, "id", $params_status);

        $I->click('Process');
        $body = $I->grabTextFrom('body');
        $I->wait(1);

        $pattern_resultCode = '/ResultCode:([a-f0-9]{1,3})/';
        preg_match($pattern_resultCode, $body, $matches);
        $resultCode = trim($matches[1]);

        $I->assertRegExp('/Status:Success/', $body, "ResultCode: " . $resultCode . ": " . $body);

    }


}
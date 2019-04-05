<?php
/**
 * Created by PhpStorm.
 * User: tm
 * Date: 28.06.17
 * Time: 8:45
 */

namespace Helper;

use Codeception\Module;


class Params extends Module
{
    public function getParamsInit($guid, $amount, $currency)
    {
        $paramsInit[$guid] = '';
        $paramsInit['amount'] = $amount;
        $paramsInit[$currency] = '';
        return $paramsInit;
    }

    public function getParamsCharge($f_extended)
    {
        $paramsCharge['f_extended'] = $f_extended;
        return $paramsCharge;
    }

    public function getParamsCompleteDMS($guid, $f_extended, $amount)
    {
        $paramsComplete[$guid] = '';
        $paramsComplete['f_extended'] = $f_extended;
        $paramsComplete['charge_amount'] = $amount;
        return $paramsComplete;
    }

    public function getParamsStatus($guid, $f_extended)
    {
        $paramsStatus[$guid] = '';
        $paramsStatus['f_extended'] = $f_extended;
        $paramsStatus['transaction_status'] = '';

        return $paramsStatus;
    }

}
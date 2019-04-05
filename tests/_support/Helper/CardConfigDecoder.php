<?php

namespace Helper;
use Codeception\Module;

class CardConfigDecoder extends Module
{
    public function card_tpro_prod_6850()//534219******6850
    {
        $card = array('cc' => Decoder::undecode('eJwzNTYxMrQ0tjQxMDAwszA1AAAblwM8'),
            'cvv' => Decoder::undecode('eJwzNzYBAAFCdAJ8='),
            'expire' => Decoder::undecode('eJwzMNE3tAAAAuwA/Q=='),
            'cc_expire_month' => '04',
            'cc_expire_year' => '18',
            'pwd_3d' => Decoder::undecode('eJwzNDA2NDMGAAQaAS8='),
            'issuer' => 'TPro'
        );

        return $card;
    }

    public function card_fdl_3D_test()//541333******0019
    {
        $card = array('cc' => Decoder::undecode('eJwzNTE0NjY2gAJDSwAaoQMe'),
            'expire' => Decoder::undecode('eJwzMNQ3tAAAAuAA+g=='),
            'cc_expire_month' => '01',
            'cc_expire_year' => '18',
            'cvv' => Decoder::undecode('eJwztbAEAAFLAKc='),
            'issuer'=> 'FDL',
            'password' => Decoder::undecode('eJzLyMwrAQAELwG0'),
        );
        return $card;
    }

    public function card_fdl_No3D_test()//541333******0001
    {
        $card = array('cc' => Decoder::undecode('eJwzNTE0NjY2gAFDABqXAxU='),
            'expire' => Decoder::undecode('eJwzMNQ3tAAAAuAA+g=='),
            'cc_expire_month' => '01',
            'cc_expire_year' => '18',
            'cvv' => Decoder::undecode('eJwztbAEAAFLAKc='),
        );
        return $card;
    }

    public function card_decta_3D_test()//558342******2457
    {
        $card = array(
            'cc' => Decoder::undecode('eJwzNbUwNjEyMDAyNDY3MjE1BwAbeQM7'),
            'expire' => Decoder::undecode('eJwzMNM3tAAAAvQA/w=='),
            'cc_expire_month' => '06',
            'cc_expire_year' => '18',
            'cvv' => Decoder::undecode('eJwzNDIGAAEtAJc='),
            'issuer' => 'Decta',
            'rbid' => Decoder::undecode('eJwzN7ewsLQEAASWAVE='),
            'password' => Decoder::undecode('eJwrSCwuNjQyNgEADRQCgg==')
        );
        return $card;
    }

    public function card_decta_No3D_test()//546043******1577
    {
        $card = array(
            'cc' => Decoder::undecode('eJwzNTEzMDE2NDAwtDAyNDU3BwAbNAM3'),
            'expire' => Decoder::undecode('eJwzsNQ3tAAAAwABAg=='),
            'cc_expire_month' => '09',
            'cc_expire_year' => '18',
            'cvv' => Decoder::undecode('eJwzMTEAAAE3AJk='),);
        return $card;
    }

    public function card_tpro_3D_test()//534219******2064
    {
        $card = array(
            'cc' => Decoder::undecode('eJwzNTYxMrQ0NjM1NjYyMjAzAQAbkwM7'),
            'expire' => Decoder::undecode('eJwzMNc3NAcAAvcA/w=='),
            'cc_expire_month' => '07',
            'cc_expire_year' => '17',
            'cvv' => Decoder::undecode('eJwzMDYAAAEpAJQ='),
            'issuer' => 'TPro',
        );
        return $card;
    }

    public function card_payOn_3D_test()//521234******1234
    {
        $card = array(
            'cc' => Decoder::undecode('eJwzNTI0MjYxNTO3sDQAsQAbmAM/'),
            'expire' => Decoder::undecode('eJwzMNc3NAcAAvcA/w=='),
            'cc_expire_month' => '07',
            'cc_expire_year' => '17',
            'cvv' => Decoder::undecode('eJwzMDYAAAEpAJQ='),
            'issuer' => 'PayOn',
        );
        return $card;
    }

    public function card_payOn_No3D_test()//521234******1234
    {
        $card = array(
            'cc' => Decoder::undecode('eJwzNTFFgQAb+ANJ'),
            'expire' => Decoder::undecode('eJwzMNc3NAcAAvcA/w=='),
            'cc_expire_month' => '07',
            'cc_expire_year' => '17',
            'cvv' => Decoder::undecode('eJwzMDYAAAEpAJQ='),
            'issuer' => 'PayOn',
        );
        return $card;
    }

}
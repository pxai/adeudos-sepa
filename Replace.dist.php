<?php

class Replace {


    public  $FOO = "OK it works";
    public  $HEADER;
    public $CUSTOMER;
    public  $FOOTER;
    public  $HEADER_VALUES;
    public $CUSTOMER_VALUES;

    function __construct() {
        $this->HEADER_VALUES = array(
            'MSGID' => 'PRE'.date('Ymdhhmmss').date('Ymd').'HSEPDD',
            'REFERENCIA_DEL_CLIENTE' => 'METER_EL_CIF',
            'FECHA_Y_HORA' => date('Y-m-d\TH:m:s'),
            'NUMERO_TOTAL_ADEUDOS' => 0,
            'NOMBRE_DEL_PRESENTADOR' => 'NOMBRE_DE_LA_EMPRESA',
            'IDENTIFICADOR_DEL_PRESENTADOR' => 'ID en FORMATO ESNNNNNCIF',
            'IDENTIFICADOR_PRESENTADOR_FECHA' => 'ID en FORMATO ESNNNNNCIF-'.date('Ymdhhmmss'),
            'REFERENCIA_DE_REMESA' => '',
            'NUMERO_TOTAL_ADEUDOS' => 0,
            'CANTIDAD_TOTAL' => 0,
            'FECHA_DE_COBRO_SIN_HORA' => date('Y-m-d'),
            'NOMBRE_DEL_PRESENTADOR'  => 'NOMBRE_DE_LA_EMPRESA', // TITULAR
            'IDENTIFICADOR_PRESENTADOR'  => 'METER_EL_CIF', // IDENTIFICADOR
            'IBAN_PRESENTADOR' => 'IBAN_DE_LA_EMPRESA', // IBAN
            'BIC_BANCO' => 'BIC_DEL_BANCO_DE_LA_EMPRESA'
        );
        $this->CUSTOMER_VALUES = array(
            'CONCEPTO' => '',
            'CANTIDAD' => '',
            'ID_MANDATO' => '',
            'FECHA_MANDATO' => date('Y-m-d'),
            'IDENTIFICADOR_PRESENTADOR' => '',
            'IDENTIFICADOR_CLIENTE_FECHA' => date('Ymdhhmmss'),
            'BIC_BANCO_DEUDOR' => '',
            'NOMBRE_CLIENTE' => '',
            'CONCEPTO' => '',
            'IBAN_CLIENTE' => ''
        );
        $this->HEADER = file_get_contents('header.xml');
        $this->CUSTOMER = file_get_contents('customer.xml');
        $this->FOOTER = file_get_contents('footer.xml');
    }


}
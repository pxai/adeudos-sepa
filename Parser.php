<?php
include_once 'Replace.php';

/**
 * Created by PhpStorm.
 * User: PELLO_ALTADILL
 * Date: 13/11/2016
 * Time: 9:22
 */
class Parser
{
    private $companyName;
    private $companyID;
    private $companyContact;
    private $totalRecords;
    private $totalAmount;
    private $template;
    private $replace;

    function __construct() {
        $this->totalRecords = 0;
        $this->totalAmount = 0;
        $this->replace = new Replace();
    }


    private function init () {
    }

    /**
     * generates header for file
     */
    private function header () {
        $result = "";
        $this->replace->HEADER_VALUES['NUMERO_TOTAL_ADEUDOS'] = $this->totalRecords;
        $this->replace->HEADER_VALUES['CANTIDAD_TOTAL'] = $this->totalAmount;
        $result .= str_replace(array_keys($this->replace->HEADER_VALUES),array_values($this->replace->HEADER_VALUES),$this->replace->HEADER);
        return $result;
    }

    /**
     * generates footer for file
     */
    private function footer () {
        $result = "";

        $result .= $this->replace->FOOTER;
        $result .= "\n";
        return $result;
    }

    /**
     * process each line
     * @param $lines
     * @return string
     */
    public function process ($lines) {
        $result = "";


        $this->totalAmount = 0;
        $this->totalRecords = 0;

        $customerPart = '\n';

        foreach ($lines as $line) {
            $v = preg_split("/;/",$line);
            $CURRENT_CUSTOMER_VALUES = array(
                'CONCEPTO' => 'AAA',
                'CANTIDAD' => $v[3],
                'ID_MANDATO' => ($this->totalRecords+1),
                'FECHA_MANDATO' => date('Y-m-d'),
                'IDENTIFICADOR_PRESENTADOR' => 'DDD',
                'IDENTIFICADOR_CLIENTE_FECHA' => date('Ymdhhmmss').'-'.sprintf("%'.04d", $this->totalRecords + 1),
                'BIC_BANCO_DEUDOR' => 'EEE',
                'NOMBRE_CLIENTE' => $v[0],
                'CONCEPTO' => $v[2],
                'IBAN_CLIENTE' => $v[1]
            );
          //  $result .= preg_replace(array_keys(Replace::$CUSTOMER_VALUES),array_values($CUSTOMER_VALUES),Replace::$CUSTOMER);
            $customerPart .= str_replace(array_keys($this->replace->CUSTOMER_VALUES),array_values($CURRENT_CUSTOMER_VALUES),$this->replace->CUSTOMER);
            $customerPart .= "\n";
            $this->totalRecords++;
            $this->totalAmount += $v[3];
        }

        $result = $this->header();
        $result .= $customerPart;
        $result .= $this->footer();
        $result .= "\n";
        return $result;
    }

}

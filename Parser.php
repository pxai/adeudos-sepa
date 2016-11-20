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

        $result = $this->header();

        foreach ($lines as $line) {
            $v = preg_split("/;/",$line);
            $CURRENT_CUSTOMER_VALUES = array(
                'CONCEPTO' => 'AAA',
                'CANTIDAD' => $v[5],
                'ID_MANDATO' => 'CCCC',
                'FECHA_MANDATO' => date('d-m-Y'),
                'IDENTIFICADOR_PRESENTADOR' => 'DDD',
                'BIC_BANCO_DEUDOR' => 'EEE',
                'NOMBRE_CLIENTE' => $v[0]." ".$v[1],
                'CONCEPTO' => $v[6],
                'IBAN_CLIENTE' => $v[4]
            );
          //  $result .= preg_replace(array_keys(Replace::$CUSTOMER_VALUES),array_values($CUSTOMER_VALUES),Replace::$CUSTOMER);
            $result .= str_replace(array_keys($this->replace->CUSTOMER_VALUES),array_values($CURRENT_CUSTOMER_VALUES),$this->replace->CUSTOMER);
            $result .= "\n";
        }

        $result .= $this->footer();
        $result .= "\n";
        return $result;
    }

}

<?php

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

    function __construct() {
        $this->totalRecords = 0;
        $this->totalAmount = 0;
        $this->init();
    }


    private function init () {
        $this->template = file_get_contents('template/SEPA_SAMPLE_TEMPLATE.xml');
    }

    /**
     * generates header for file
     */
    private function header () {
        $result = "";

        $result .= "<CstmrDrctDbtInitn>\n";
        $result .= "<GrpHdr>";

        $result .= "</GrpHdr>";
        return $result;
    }

    private function payment () {
        $result = "";

        $result .= $this->template;
        $result .= "<br />\n";
        return $result;
    }

    /**
     * generates footer for file
     */
    private function footer () {
        $result = "";

        $result .= "</CstmrDrctDbtInitn>";
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
            $result .= $line . "<br />\n";
        }

        $result .= $this->footer();

        return $result;
    }

}

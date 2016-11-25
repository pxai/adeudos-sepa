<?php

class Replace {


    public  $FOO = "OK it works";
    public  $HEADER =<<<EOT
<?xml version="1.0" encoding="utf-8"?>
<Document xmlns="urn:iso:std:iso:20022:tech:xsd:pain.008.001.02" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance";>
<CstmrDrctDbtInitn>
<GrpHdr>
    <MsgId>REFERENCIA_DEL_CLIENTE</MsgId><!--F31229545-->
    <CreDtTm>FECHA_Y_HORA</CreDtTm>
    <NbOfTxs>NUMERO_TOTAL_ADEUDOS</NbOfTxs>
    <CtrlSum>CANTIDAD_TOTAL</CtrlSum>
    <InitgPty>
        <Nm>NOMBRE_DEL_PRESENTADOR</Nm>
        <Id>
            <OrgId>
                <Othr>
                    <Id>IDENTIFICADOR_PRESENTADOR</Id>
                    <SchmeNm>
                            <Cd>CORE</Cd>
                    </SchmeNm>
                </Othr>
            </OrgId>
        </Id>
    </InitgPty>
</GrpHdr>
<PmtInf>
    <PmtInfId>REFERENCIA_DE_REMESA</PmtInfId>
    <PmtMtd>DD</PmtMtd><!--Siempre DD-->
    <NbOfTxs>NUMERO_TOTAL_ADEUDOS</NbOfTxs>
    <CtrlSum>CANTIDAD_TOTAL</CtrlSum>
    <PmtTpInf>
        <SvcLvl>
            <Cd>SEPA</Cd>
        </SvcLvl>
        <LclInstrm>
            <Cd>CORE</Cd>
        </LclInstrm>
        <SeqTp>RCUR</SeqTp>
        <CtgyPurp>
            <Cd>TRAD</Cd>
        </CtgyPurp>
    </PmtTpInf>
    <ReqdColltnDt>FECHA_DE_COBRO_SIN_HORA</ReqdColltnDt>
    <Cdtr>
        <Nm>NOMBRE_DEL_PRESENTADOR</Nm>
        <Id>
            <PrvtId>
                <Othr>
                    <Id>IDENTIFICADOR_PRESENTADOR</Id><!-- -->
                </Othr>
            </PrvtId>
        </Id>
    </Cdtr>
    <CdtrAcct>
        <Id>
            <IBAN>IBAN_PRESENTADOR</IBAN>
        </Id>
        <Ccy>EUR</Ccy>
    </CdtrAcct>
    <CdtrAgt>
        <FinInstnId>
            <BIC>BIC_BANCO</BIC><!--El Banco final : BCOEESMM008 -->
        </FinInstnId>
    </CdtrAgt>
    <ChrgBr>SLEV</ChrgBr>
EOT;

    public $CUSTOMER=<<<EOT
    <DrctDbtTxInf>
        <PmtId>
            <InstrId> CONCEPTO</InstrId>
            <EndToEndId> CONCEPTO</EndToEndId>
        </PmtId>
        <InstdAmt Ccy="EUR">CANTIDAD</InstdAmt>
        <DrctDbtTx>
            <MndtRltdInf>
                <MndtId>ID_MANDATO</MndtId>
                <DtOfSgntr>FECHA_MANDATO</DtOfSgntr>
                <AmdmntInd>false</AmdmntInd>
            </MndtRltdInf>
            <CdtrSchmeId>
                <Id>
                    <PrvtId>
                        <Othr>
                            <Id>IDENTIFICADOR_PRESENTADOR</Id>
                            <SchmeNm>
                                <Prtry>SEPA</Prtry>
                            </SchmeNm>
                        </Othr>
                    </PrvtId>
                </Id>
            </CdtrSchmeId>
        </DrctDbtTx>
        <DbtrAgt>
            <FinInstnId>
                <BIC>BIC_BANCO_DEUDOR</BIC><!--Opcional-->
            </FinInstnId>
        </DbtrAgt>
        <Dbtr>
            <Nm>NOMBRE_CLIENTE</Nm>
            <Id>
                <OrgId>
                    <BICOrBEI>BSABESBB</BICOrBEI><!--Opcional-->
                </OrgId>
            </Id>
        </Dbtr>
        <DbtrAcct>
            <Id>
                <IBAN>IBAN_CLIENTE</IBAN>
            </Id>
            <Ccy>EUR</Ccy>
        </DbtrAcct>
        <RmtInf>
            <Ustrd>CONCEPTO</Ustrd>
        </RmtInf>
    </DrctDbtTxInf>
EOT;

    public  $FOOTER =<<<EOT
        </PmtInf>
    </CstmrDrctDbtInitn>
 </Document>
EOT;

    public  $HEADER_VALUES;

    public $CUSTOMER_VALUES;

    function __construct() {
        $this->HEADER_VALUES = array(
            'REFERENCIA_DEL_CLIENTE' => '',
            'FECHA_Y_HORA' => date('d-m-Y'),
            'NUMERO_TOTAL_ADEUDOS' => 0,
            'CANTIDAD_TOTAL' => 0,
            'NOMBRE_DEL_PRESENTADOR' => '',
            'IDENTIFICADOR_DEL_PRESENTADOR' => '',
            'REFERENCIA_DE_REMESA' => '',
            'NUMERO_TOTAL_ADEUDOS' => 0,
            'CANTIDAD_TOTAL' => 0,
            'FECHA_DE_COBRO_SIN_HORA' => date('d-m-Y'),
            'NOMBRE_DEL_PRESENTADOR'  => '', // TITULAR
            'IDENTIFICADOR_PRESENTADOR'  => '', // IDENTIFICADOR
            'IBAN_PRESENTADOR' => '', // IBAN
            'BIC_BANCO' => ''
        );
        $this->CUSTOMER_VALUES = array(
            'CONCEPTO' => '',
            'CANTIDAD' => '',
            'ID_MANDATO' => '',
            'FECHA_MANDATO' => date('d-m-Y'),
            'IDENTIFICADOR_PRESENTADOR' => '',
            'BIC_BANCO_DEUDOR' => '',
            'NOMBRE_CLIENTE' => '',
            'CONCEPTO' => '',
            'IBAN_CLIENTE' => ''
        );
    }

}
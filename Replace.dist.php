<?php

class Replace {


    public  $FOO = "OK it works";
    public  $HEADER =<<<EOT
<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<Document xmlns="urn:iso:std:iso:20022:tech:xsd:pain.008.001.02">
    <CstmrDrctDbtInitn>
        <GrpHdr>
            <MsgId>MSGID</MsgId>
            <CreDtTm>2016-11-25T11:20:57</CreDtTm>
            <NbOfTxs>NUMERO_TOTAL_ADEUDOS</NbOfTxs>
            <CtrlSum>CANTIDAD_TOTAL</CtrlSum>
            <InitgPty>
                <Nm>NOMBRE_DEL_PRESENTADOR</Nm>
                <Id>
                    <OrgId>
                        <Othr>
                            <Id>IDENTIFICADOR_DEL_PRESENTADOR</Id>
                        </Othr>
                    </OrgId>
                </Id>
            </InitgPty>
        </GrpHdr>
        <PmtInf>
            <PmtInfId>IDENTIFICADOR_PRESENTADOR_FECHA</PmtInfId>
            <PmtMtd>DD</PmtMtd>
            <BtchBookg>true</BtchBookg>
            <PmtTpInf>
                <SvcLvl>
                    <Cd>SEPA</Cd>
                </SvcLvl>
                <LclInstrm>
                    <Cd>CORE</Cd>
                </LclInstrm>
                <SeqTp>RCUR</SeqTp>
            </PmtTpInf>
            <ReqdColltnDt>FECHA_DE_COBRO_SIN_HORA</ReqdColltnDt>
            <Cdtr>
                <Nm>NOMBRE_DEL_PRESENTADOR</Nm>
                <PstlAdr>
                    <Ctry>ES</Ctry>
                </PstlAdr>
            </Cdtr>
            <CdtrAcct>
                <Id>
                    <IBAN>IBAN_PRESENTADOR</IBAN>
                </Id>
                <Ccy>EUR</Ccy>
            </CdtrAcct>
            <CdtrAgt>
                <FinInstnId>
                    <BIC>BIC_BANCO</BIC>
                </FinInstnId>
            </CdtrAgt>
            <ChrgBr>SLEV</ChrgBr>
            <CdtrSchmeId>
                <Id>
                    <PrvtId>
                        <Othr>
                            <Id>IDENTIFICADOR_DEL_PRESENTADOR</Id>
                            <SchmeNm>
                                <Prtry>SEPA</Prtry>
                            </SchmeNm>
                        </Othr>
                    </PrvtId>
                </Id>
            </CdtrSchmeId>

EOT;

    public $CUSTOMER=<<<EOT
  <DrctDbtTxInf>
                <PmtId>
                    <InstrId>IDENTIFICADOR_CLIENTE_FECHA</InstrId>
                    <EndToEndId>ID_MANDATO</EndToEndId>
                </PmtId>
                <InstdAmt Ccy="EUR">CANTIDAD</InstdAmt>
                <DrctDbtTx>
                    <MndtRltdInf>
                        <MndtId>ID_MANDATO</MndtId>
                        <DtOfSgntr>FECHA_MANDATO</DtOfSgntr>
                        <AmdmntInd>false</AmdmntInd>
                    </MndtRltdInf>
                </DrctDbtTx>
                <DbtrAgt>
                    <FinInstnId>
                        <Othr>
                            <Id>NOTPROVIDED</Id>
                        </Othr>
                    </FinInstnId>
                </DbtrAgt>
                <Dbtr>
                    <Nm>NOMBRE_CLIENTE</Nm>
                </Dbtr>
                <DbtrAcct>
                    <Id>
                        <IBAN>IBAN_CLIENTE</IBAN>
                    </Id>
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
    }


}
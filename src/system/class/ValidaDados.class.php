<?php

/**
 * ValidaDados.class [TIPO]
 * Descricao
 * @copyright (c) year, Felipe Decome
 */
class ValidaDados {

    public $Name;
    public $Mail;
    public $Tel;
    public $Pessoa;
    public $CpfCnpj;
    public $Data;
    public $Subject;
    public $Result;

    public function __construct($Name = null, $Mail = null, $Tel = null, $Pessoa = null, $CpfCnpj = null, $Data = null, $Subject = null) {

        $this->Name = $this->validSimple($Name);
        $this->Mail = $this->validMail($Mail);
        $this->Tel = $this->validTel($Tel);
        $this->Pessoa = $this->validSimple($Pessoa);
        $this->CpfCnpj = $this->validCpfCnpj($CpfCnpj);
        $this->Data = $this->validData($Data);
        $this->Subject = $this->validSimple($Subject);
        $this->Result = array('name' => $this->Name, 'mail' => $this->Mail, 'tel' => $this->Tel, 'pessoa' => $this->Pessoa, 'cpfcnpj' => $this->CpfCnpj, 'data' => $this->Data, 'subject' => $this->Subject);
    }

    public function validSimple($String) {
        if (empty($String)) {
            return false;
        } else {
            $exp = "/^[A-Za-z]+(\s[A-Za-z]+)*$/";
            if (preg_match($exp, $String)) {
                $String = utf8_decode(strip_tags(trim($String)));
                return $String;
            }else{
                return false;
            }
        }
    }

    public function validMail($Mail) {
        if (!filter_var($Mail, FILTER_VALIDATE_EMAIL) || empty($Mail)) {
            return false;
        } else {
            $domain = explode('@', $Mail);
            if (checkdnsrr($domain[1], 'MX')) {
                $Mail = utf8_decode(strip_tags(trim($Mail)));
                return $Mail;
            }
        }
    }

    public function validTel($Tel) {
        if (empty($Tel)) {
            return false;
        } else {
            $exp = "/^\([0-9]{2}\) [0-9]{4}\-[0-9]{4,5}$/";
            if (preg_match($exp, $Tel)) {
                $Tel = utf8_decode(strip_tags(trim($Tel)));
                return $Tel;
            }
        }
    }

    public function validCpfCnpj($CpfCnpj) {
        if (empty($CpfCnpj)) {
            return false;
        } else {
            $expCpf = "/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/";
            $expCnpj = "/^[0-9]{2}\.[0-9]{3}\.[0-9]{3}\/[0-9]{4}\-[0-9]{2}$/";
            if (preg_match($expCpf, $CpfCnpj) || preg_match($expCnpj, $CpfCnpj)) {
                $CpfCnpj = utf8_decode(strip_tags(trim($CpfCnpj)));
                return $CpfCnpj;
            }
        }
    }

    public function validData($Data) {
        if (empty($Data)) {
            return false;
        } else {
            $exp = "/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/";
            if (preg_match($exp, $Data)) {
                $Data = utf8_decode(strip_tags(trim($Data)));
                return $Data;
            }
        }
    }

}

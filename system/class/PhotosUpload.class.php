<?php

/**
 * @copyright (c) 2017, Felipe Decome
 */
class PhotosUpload {

    private $Destination;
    public $Upload;
    public $Err_msg;

    function __construct($Tmp_Name, $Name, $Dest, $Img) {
        if (isset($this->Err_msg) && $this->Err_msg != null) {
            
        } else {
            $this->Upload = $this->UploadImage($Tmp_Name, $Name, $Dest, $Img);
            return true;
        }
    }

    private function VerIfExist($Name, $Dest, $Img) {
        $Img = (isset($Img) && $Img != null) ? " $Img" : null;
        if (!file_exists($Dest . $Name)) {
            return true;
        } else {
            $this->Err_msg['upload'] = "Já existe um arquivo com o mesmo nome da Imagem{$Img}, por favor escolha outro nome.";
        }
    }

    private function VerDest($Dest) {
        if (isset($Dest) && $Dest != null) {
            if (is_dir($Dest)) {
                return $Dest;
            } else {
                $this->Err_msg['dest'] = "'" . $Dest . "' não é um destino válido, contate o administrador do site.";
            }
        } else {
            $this->Err_msg['dest'] = "O destino do arquivo não foi definido, contate o administrador do site.";
        }
    }

    private function UploadImage($Tmp_Name, $Name, $Dest, $Img) {
        if ($this->VerDest($Dest) && $this->VerIfExist($Name, $Dest, $Img)) {
            if (move_uploaded_file($Tmp_Name, $Dest . $Name)) {
                return true;
            } else {
                $this->Err_msg['upload'] = "Ocorreu algum erro, atualize a página e tente novamente, caso o erro persista contate o administrador do site.";
            }
        }
    }

}

<?php if (!defined('BASEPATH')) {
    exit();
}
class Cfpdf
{
    public function __construct()
    {
        require_once APPPATH.'/libraries/fpdf/fpdf.php';
    }
}

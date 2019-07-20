<?php

class Voucher extends Controller
{
    public function index()
    {
        $data['voucher'] = $this->model('Voucher_model')->getVoucher();

        $this->view('templates/header');
        $this->view('voucher/index', $data);
        $this->view('templates/footer');
    }
}

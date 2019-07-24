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

    public function input()
    {
        if ($this->model('Voucher_model')->inputDataVoucher($_POST) > 0) {
            Flasher::setFlash('success', 'added');
            header('Location: ' . BASEURL . '/voucher');
            exit;
        } else {
            Flasher::setFlash('failed', 'added');
            header('Location: ' . BASEURL . '/voucher');
            exit;
        }
    }
    public function drop($id)
    {
        if ($this->model('Voucher_model')->dropDataVoucher($id) > 0) {
            Flasher::setFlash('success', 'deleted');
            header('Location: ' . BASEURL . '/voucher');
            exit;
        } else {
            Flasher::setFlash('failed', 'deleted');
            header('Location: ' . BASEURL . '/voucher');
            exit;
        }
    }
}

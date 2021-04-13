<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Request;
use App\Core\Auth;

class LateDeductController
{
    protected $pageTitle;

    public function index()
    {
        $pageTitle = "Late Deduction";
        $deduct_data = App::get('database')->select('amount', 'late_deduction');
        return view('lates/deduction', compact('deduct_data', 'pageTitle'));
    }

    public function store()
    {
        if (Auth::user('role_id') != 1) {
            redirect('home');
        }

        $request = Request::validate('late/deduction', [
            'deduct-amount' => 'required'
        ]);

        $hasValue = App::get('database')->select('*', 'late_deduction');
        if ($hasValue) {
            $form_data = [
                "amount" => $request['deduct-amount']
            ];
            App::get('database')->update('late_deduction', $form_data);
        } else {
            $form_data = [
                "amount" => $request['deduct-amount'],
                "date_created" => date("Y-m-d H:i:s")
            ];
            App::get('database')->insert('late_deduction', $form_data);
        }

        redirect('deduction', "Saved successfully.");
    }

    public function entry()
    {
        if (Auth::user('role_id') != 1) {
            redirect('home');
        }

        $pageTitle = "Late Entry";

        $users_data = App::get('database')->selectLoop('*', 'users');
        $late_datas = App::get('database')->selectLoop('*', 'late_history', 'id > 0 ORDER BY id ASC');
        return view('lates/entry', compact('late_datas', 'users_data', 'pageTitle'));
    }

    public function newLate()
    {
        if (Auth::user('role_id') != 1) {
            redirect('home');
        }

        $deduction_amount = App::get('database')->select('amount', 'late_deduction', 'id > 0 ORDER BY id DESC LIMIT 1');

        $request = Request::validate('late/entry', [
            'late_user' => 'required'
        ]);

        $form_data = [
            "user_id" => $request['late_user'],
            "amount" => $deduction_amount['amount'],
            "date_created" => date("Y-m-d H:i:s"),
            "date_updated" => date("Y-m-d H:i:s")
        ];

        App::get('database')->insert('late_history', $form_data);
        redirect('entry');
    }

    public function delete($id)
    {
        if (Auth::user('role_id') != 1) {
            redirect('home');
        }

        App::get('database')->delete('late_history', "id = '$id'");
        redirect('entry', "success delete.");
    }

    public function payment()
    {
        if (Auth::user('role_id') != 1) {
            redirect('home');
        }

        $pageTitle = "Late Payment";
        $users_data = App::get('database')->selectLoop('*', 'users');
        $payment_datas = App::get('database')->selectLoop('*', 'payment', 'id > 0 ORDER BY id DESC');
        return view('lates/payment', compact('payment_datas', 'users_data', 'pageTitle'));
    }

    public function storePayment()
    {
        if (Auth::user('role_id') != 1) {
            redirect('home');
        }

        $request = Request::validate('late/payment', [
            'pay_user' => 'required',
            'pay_amount' => 'required'
        ]);

        $form_data = [
            "user_id" => $request['pay_user'],
            "amount" => $request['pay_amount'],
            "date_created" => date("Y-m-d H:i:s")
        ];

        App::get('database')->insert('payment', $form_data);
        redirect('payment');
    }

    public function deletePayment($id)
    {
        if (Auth::user('role_id') != 1) {
            redirect('home');
        }

        App::get('database')->delete('payment', "id = '$id'");
        redirect('payment', "success delete.");
    }

    public function summary()
    {
        $pageTitle = "Late Summary";
        $users_data = App::get('database')->selectLoop('*', 'users');

        $balance = [];
        foreach ($users_data as $users) {
            $late_data = App::get('database')->select('SUM(amount) AS late', 'late_history', "user_id = '$users->id'");
            $payment_data = App::get('database')->select('SUM(amount) AS pay', 'payment', "user_id = '$users->id'");

            $bal = $late_data['late'] - $payment_data['pay'];
            $balance[] = $bal;
            $summary[] = [
                "name" => $users->fullname,
                "total_late" => $late_data['late'],
                "total_pay" => $payment_data['pay'],
                "balance" => $bal
            ];
        }

        return view('lates/summary', compact('summary', 'users_data', 'pageTitle'));
    }

    public function paymentHistory()
    {
        $pageTitle = "Payment History";
        $logged_id = Auth::user('id');

        $pay_datas = App::get('database')->selectLoop('*', 'payment', "user_id = '$logged_id' ORDER BY id DESC");
        return view('lates/payment-detail', compact('pay_datas', 'pageTitle'));
    }

    public function history()
    {
        $pageTitle = "Late History";
        $logged_id = Auth::user('id');

        $late_datas = App::get('database')->selectLoop('*', 'late_history', "user_id = '$logged_id' ORDER BY id DESC");
        return view('lates/history', compact('late_datas', 'pageTitle'));
    }
}

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
        $deduct_data = DB()->select('amount', 'late_deduction')->get();
        return view('/lates/deduction', compact('deduct_data', 'pageTitle'));
    }

    public function store()
    {
        Auth::userIsAuthorized();

        $request = Request::validate('/late/deduction', [
            'deduct-amount' => 'required'
        ]);

        $hasValue = DB()->select('*', 'late_deduction')->get();
        if ($hasValue) {
            $form_data = [
                "amount" => $request['deduct-amount']
            ];
            DB()->update('late_deduction', $form_data);
        } else {
            $form_data = [
                "amount" => $request['deduct-amount'],
                "date_created" => date("Y-m-d H:i:s")
            ];
            DB()->insert('late_deduction', $form_data);
        }

        redirect('/deduction', ["Saved successfully.", 'success']);
    }

    public function entry()
    {
        Auth::userIsAuthorized();

        $pageTitle = "Late Entry";

        $users_data = DB()->selectLoop('*', 'users')->get();
        $late_datas = DB()->selectLoop('*', 'late_history', 'id > 0 ORDER BY id ASC')->get();
        return view('/lates/entry', compact('late_datas', 'users_data', 'pageTitle'));
    }

    public function newLate()
    {
        Auth::userIsAuthorized();

        $deduction_amount = DB()->select('amount', 'late_deduction', 'id > 0 ORDER BY id DESC LIMIT 1')->get();

        $request = Request::validate('/late/entry', [
            'late_user' => 'required'
        ]);

        $form_data = [
            "user_id" => $request['late_user'],
            "amount" => $deduction_amount['amount'],
            "date_created" => date("Y-m-d H:i:s"),
            "date_updated" => date("Y-m-d H:i:s")
        ];

        DB()->insert('late_history', $form_data);
        redirect('/entry');
    }

    public function delete($id)
    {
        Auth::userIsAuthorized();

        DB()->delete('late_history', "id = '$id'");
        redirect('/entry', ["success delete.", "success"]);
    }

    public function payment()
    {
        Auth::userIsAuthorized();

        $pageTitle = "Late Payment";
        $users_data = DB()->selectLoop('*', 'users')->get();
        $payment_datas = DB()->selectLoop('*', 'payment', 'id > 0 ORDER BY id DESC')->get();
        return view('/lates/payment', compact('payment_datas', 'users_data', 'pageTitle'));
    }

    public function storePayment()
    {
        Auth::userIsAuthorized();

        $request = Request::validate('/late/payment', [
            'pay_user' => 'required',
            'pay_amount' => 'required'
        ]);

        $form_data = [
            "user_id" => $request['pay_user'],
            "amount" => $request['pay_amount'],
            "date_created" => date("Y-m-d H:i:s")
        ];

        DB()->insert('payment', $form_data);
        redirect('/payment');
    }

    public function deletePayment($id)
    {
        Auth::userIsAuthorized();

        DB()->delete('payment', "id = '$id'");
        redirect('/payment', ["success delete.", "success"]);
    }

    public function summary()
    {
        $pageTitle = "Late Summary";
        $users_data = DB()->selectLoop('*', 'users')->get();

        $balance = [];
        foreach ($users_data as $users) {
            $late_data = DB()->select('SUM(amount) AS late', 'late_history', "user_id = '$users[id]'")->get();
            $payment_data = DB()->select('SUM(amount) AS pay', 'payment', "user_id = '$users[id]'")->get();

            $bal = $late_data['late'] - $payment_data['pay'];
            if ($bal > 0) {
                $balance[] = $bal;
                $summary[] = [
                    "name" => $users['fullname'],
                    "total_late" => $late_data['late'],
                    "total_pay" => $payment_data['pay'],
                    "balance" => $bal
                ];
            }
        }

        return view('/lates/summary', compact('summary', 'users_data', 'pageTitle'));
    }

    public function paymentHistory()
    {
        $pageTitle = "Payment History";
        $logged_id = Auth::user('id');

        $pay_datas = DB()->selectLoop('*', 'payment', "user_id = '$logged_id' ORDER BY id DESC")->get();
        return view('/lates/payment-detail', compact('pay_datas', 'pageTitle'));
    }

    public function history()
    {
        $pageTitle = "Late History";
        $logged_id = Auth::user('id');

        $late_datas = DB()->selectLoop('*', 'late_history', "user_id = '$logged_id' ORDER BY id DESC")->get();
        return view('/lates/history', compact('late_datas', 'pageTitle'));
    }
}

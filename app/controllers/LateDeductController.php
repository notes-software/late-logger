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

        redirect('late/deduction', "Saved successfully.");
    }

    public function entry()
    {
        $pageTitle = "Late Entry";

        $users_data = App::get('database')->selectLoop('*', 'users');
        $late_datas = App::get('database')->selectLoop('*', 'late_history', 'id > 0 ORDER BY id ASC');
        return view('lates/entry', compact('late_datas', 'users_data', 'pageTitle'));
    }

    public function newLate()
    {
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
        redirect('late/entry');
    }

    public function delete($id)
    {
        App::get('database')->delete('late_history', "id = '$id'");
        redirect('late/entry', "success delete.");
    }
}

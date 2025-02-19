<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ClassModel;
use App\Models\User;


class FeeCollectionController extends Controller
{
    public function collect_fee(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();

        if(!empty($request->all()))
        {
            $data['getRecord'] = User::getCollectFeeStudent();
        }
        $data['header_title'] = "Collect Fees";
        return view('admin.fee_collection.collect_fee', $data);
    }
}

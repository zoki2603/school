<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    public function viewFeeAmount()
    {

        $data['allData'] = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount', $data);
    }
    public function feeAmountAdd()
    {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes']  = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount', $data);
    }
    public function feeAmountStore(Request $request)
    {
        $countClass = count($request->class_id);
        if ($countClass != NULL) {
            for ($i = 0; $i < $countClass; $i++) {
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        }
        $notification = array(
            'message' => 'Fee Amount Inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.amount.view')->with($notification);
    }
    public function feeAmountEdit($id)
    {
        $data['editData'] = FeeAmount::where('fee_category_id', $id)->orderBy('class_id', 'asc')->get();
        $data['fee_categories'] = FeeCategory::all();
        $data['classes']  = StudentClass::all();

        return view('backend.setup.fee_amount.edit_fee_amount', $data);
    }
    public function feeAmountUpdate(Request $request, $id)
    {
        if ($request->casse_id == !NULL) {
            $notification = array(
                'message' => 'Sorry you dont selected any class amount!',
                'alert-type' => 'error'
            );
            return redirect()->route('fee.amount.edit', $id)->with($notification);
        } else {
            FeeAmount::where('fee_category_id', $id)->delete();
            $countClass = count($request->class_id);
            for ($i = 0; $i < $countClass; $i++) {
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        }
        $notification = array(
            'message' => 'Data Updated Successfolly!',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.amount.view')->with($notification);
    }
    public function feeAmounteDetails($id)
    {
        $data['detailsData'] = FeeAmount::where('fee_category_id', $id)->orderBy('class_id')->get();
        return view('backend.setup.fee_amount.details_fee_amount', $data);
    }
}

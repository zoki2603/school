<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function viewFeeCategory()
    {
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_category', $data);
    }
    public function feeCategoryAdd()
    {
        return view('backend.setup.fee_category.add_fee_catagory');
    }
    public function feeCategoryStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ]);
        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Fee Category Inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }
    public function feeCategoryEdit($id)
    {
        $editData = FeeCategory::find($id);
        return view('backend.setup.fee_category.edit_fee_category', compact('editData'));
    }
    public function feeCategoryUpdate(Request $request, $id)
    {
        $data = FeeCategory::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name,' . $data->id,
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Fee Category Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }
    public function feeCategoryDelete($id)
    {
        $user = FeeCategory::find($id)->delete();
        $notification = array(
            'message' => 'Fee Category Deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }
}

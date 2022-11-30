<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Designation;
use App\Models\MemberCategory;
use App\Models\Profession;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function myProfile()
    {
        $data['pageTitle'] = 'My Profile';
        $data['myProfileActiveClass'] = 'active';
        $data['departments'] = Department::all();
        $data['designations'] = Designation::all();
        $data['professions'] = Profession::all();
        $data['categories'] = MemberCategory::all();
        $data['user'] = User::find(Auth::id());
        return view('frontend.user.profile')->with($data);
    }

    public function transactionHistory()
    {
        $data['pageTitle'] = 'Transaction History';
        $data['transactionActiveClass'] = 'active';
        $data['transactions'] = Transaction::whereUserId(Auth::id())->get();
        $data['user'] = User::find(Auth::id());
        return view('frontend.user.transaction')->with($data);
    }

    public function requestMember()
    {
        $data['pageTitle'] = 'Request Member';
        $data['requestMemberActiveClass'] = 'active';
        $data['transactions'] = Transaction::whereUserId(Auth::id())->get();
        $data['user'] = User::find(Auth::id());
        return view('frontend.user.request-member')->with($data);
    }

    public function requestMemberStore(Request $request)
    {
        if ($request->payment_method == 'bank_draft') {
            $request->validate([
                'bank_draft_no' => 'required',
                'bank_name' => 'required',
                'branch_name' => 'required',
                'bank_slip' => 'required|file|mimes:jpeg,jpg,png',
            ]);
        } elseif (($request->payment_method == 'nagad') || ($request->payment_method == 'bkash') || ($request->payment_method == 'rocket')) {
            $request->validate([
                'mobile_banking_number' => 'required',
                'trx_id' => 'required',
            ]);
        } elseif ($request->payment_method == 'cash') {
            $request->validate([
                'rashid_no' => 'required',
                'serial_no' => 'required',
            ]);
        }

        $transaction = new Transaction();
        $transaction->user_id = Auth::id();
        $transaction->payment_method = $request->payment_method;
        $transaction->amount = $request->amount;
        $transaction->charge_fee = $request->charge_fee;
        $transaction->total_amount = $request->total_amount;
        $transaction->bank_draft_no = $request->bank_draft_no;
        $transaction->bank_name = $request->bank_name;
        $transaction->branch_name = $request->branch_name;

        if ($request->file('bank_slip')) {
            deleteFile(@$transaction->bank_slip);
            $bank_slip = saveImage('Transaction', $request->bank_slip);
            $transaction->bank_slip = $bank_slip;
        }

        $transaction->mobile_banking_number = $request->mobile_banking_number;
        $transaction->trx_id = $request->trx_id;
        $transaction->rashid_no = $request->rashid_no;
        $transaction->serial_no = $request->serial_no;
        $transaction->purpose = "Member Request";
        $transaction->save();

        return redirect()->route('user.transaction-history')->with('success', 'Created Successfully');

    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nick_name' => 'required',
            'mobile_number' => 'required',
            'email' => 'required|email',
            'session_year' => 'required',
            'department_id' => 'required',
        ]);

        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->nick_name = $request->nick_name;
        $user->mobile_number = $request->mobile_number;
        $user->email = $request->email;
        $user->session_year = $request->session_year;
        $user->department_id = $request->department_id;
        $user->profession_id = $request->profession_id;
        $user->designation_id = $request->designation_id;
        $user->office_address = $request->office_address;
        $user->present_address = $request->present_address;
        $user->permanent_address = $request->permanent_address;
        $user->member_category_id = $request->member_category_id;
        if ($request->has('image')){
            deleteFile($user->image);
            $image = saveImage('Admin', $request->image);
            $user->image = $image;
        }
        $user->type = 1;
        $user->save();
        return redirect()->back()->with('success', 'Updated Successfully');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success','Logout Successful');
    }
}

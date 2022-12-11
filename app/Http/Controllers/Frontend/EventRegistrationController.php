<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventRegistrationController extends Controller
{
    public function eventRegistration($id)
    {
        $data['event'] = Event::findOrFail($id);
        return view('frontend.event.registration')->with($data);
    }

    public function eventRegistrationStore(Request $request, $event_id)
    {
        $user = User::findOrFail(Auth::id());
        if ($user->role != 1) {
            return redirect()->back()->with('warning', 'You are not a member');
        }

        if ($request->payment_method == 'bank_draft') {
            $request->validate([
                'bank_draft_no' => 'required',
                'bank_name' => 'required',
                'branch_name' => 'required',
                'total_people' => 'required|numeric|min:1',
                'bank_slip' => 'required|file|mimes:jpeg,jpg,png',
            ]);
        } elseif (($request->payment_method == 'nagad') || ($request->payment_method == 'bkash') || ($request->payment_method == 'rocket')) {
            $request->validate([
                'mobile_banking_number' => 'required',
                'trx_id' => 'required',
                'total_people' => 'required|numeric|min:1',
            ]);
        } elseif ($request->payment_method == 'cash') {
            $request->validate([
                'rashid_no' => 'required',
                'serial_no' => 'required',
                'total_people' => 'required|numeric|min:1',
            ]);
        }

        $transaction = new Transaction();
        $transaction->user_id = Auth::id();
        $transaction->payment_method = $request->payment_method;
        $transaction->event_id = $event_id;
        $transaction->total_people = $request->total_people;
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
        $transaction->purpose = "Event Registration";
        $transaction->type = TRANSACTION_TYPE_EVENT;
        $transaction->save();

        return redirect()->route('user.transaction-history')->with('success', 'Created Successfully');
    }
}

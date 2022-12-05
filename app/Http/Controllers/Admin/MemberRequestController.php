<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberRequestController extends Controller
{
    public function memberRequestList(Request $request)
    {
        $data['pageTitle'] = 'Member Request List';
        $data['subNavMemberRequestActiveCLass'] = 'active';
        $data['transactions'] = Transaction::where(function ($q) use ($request){
            if ($request->search_field) {
                $q->where('status', $request->search_field == 3 ? 0 : $request->search_field);
            }
        })->where('type', 1)->latest()->paginate();
        return view('admin.member_request.list')->with($data);
    }

    public function memberDetails($user_id)
    {
        $data['pageTitle'] = 'Member Details';
        $data['subNavMemberRequestActiveCLass'] = 'active';
        $data['user'] = User::find($user_id);
        return view('admin.member_request.member-details')->with($data);
    }

    public function changeStatus(Request $request)
    {
        DB::beginTransaction();
        try {
            $transaction = Transaction::find($request->id);
            $transaction->update(['status' => $request->status]);
            if ($request->status == 1) {
                User::find($transaction->user_id)->update(['role' => 1, 'member_category_id' => $transaction->member_category_id]);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ]);
        }

        return response()->json([
            'status' => 200
        ]);
    }

}

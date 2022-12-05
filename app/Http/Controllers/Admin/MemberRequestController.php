<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Profession;
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
        $data['transactions'] = Transaction::where(function ($q) use ($request) {
            if ($request->search_field) {
                $q->where('status', $request->search_field == 3 ? 0 : $request->search_field);
            }
        })->where('type', TRANSACTION_TYPE_MEMBER_REQUEST)->latest()->paginate();
        return view('admin.member_request.member-request-list')->with($data);
    }

    public function eventRequestList(Request $request)
    {
        $data['pageTitle'] = 'Event Request List';
        $data['subNavEventRequestActiveCLass'] = 'active';
        $data['transactions'] = Transaction::where(function ($q) use ($request) {
            if ($request->search_field) {
                $q->where('status', $request->search_field == 3 ? 0 : $request->search_field);
            }
        })->where('type', TRANSACTION_TYPE_EVENT)->latest()->paginate();
        return view('admin.member_request.event-request-list')->with($data);
    }

    public function approvedMemberRequestList(Request $request)
    {
        $data['pageTitle'] = 'Member List';
        $data['subNavApprovedMemberActiveCLass'] = 'active';
        $data['designations'] = Designation::all();
        $data['professions'] = Profession::all();
        $data['departments'] = Department::all();
        $data['users'] = User::whereRole(USER_ROLE_MEMBER)->where(function ($q) use ($request) {
            if ($request->profession_id) {
                $q->where('profession_id', $request->profession_id);
            }
            if ($request->designation_id) {
                $q->where('designation_id', $request->designation_id);
            }
            if ($request->department_id) {
                $q->where('department_id', $request->department_id);
            }
            if ($request->search_string) {
                $q->where('name', 'like', "%{$request->search_string}%")->orWhere('email', 'like', "%{$request->search_string}%");
            }
        })->paginate();

        return view('admin.member_request.approved-member-list')->with($data);
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
            if ($request->status == 1 && $transaction->type == TRANSACTION_TYPE_MEMBER_REQUEST) {
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

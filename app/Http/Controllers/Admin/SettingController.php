<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SettingController extends Controller
{
    public function homeSetting()
    {
        $data['pageTitle'] = "General Setting";
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavHomeSettingActiveCLass'] = 'active';
        return view('admin.setting.home-setting')->with($data);
    }

    public function generalSettingUpdate(Request $request)
    {
        $inputs = Arr::except($request->all(), ['_token']);
        $keys = [];

        foreach ($inputs as $k => $v) {
            $keys[$k] = $k;
        }

        foreach ($inputs as $key => $value) {
            $option = Setting::firstOrCreate(['option_key' => $key]);

            if ($request->hasFile('president_image') && $key == 'president_image') {
                deleteFile(getOption('president_image'));
                $option->option_value = saveImage('setting', $request->president_image);
                $option->save();
            } elseif ($request->hasFile('secretary_image') && $key == 'secretary_image') {
                deleteFile(getOption('secretary_image'));
                $option->option_value = saveImage('setting', $request->secretary_image);
                $option->save();
            } else {
                $option->option_value = $value;
                $option->save();
            }
        }

        return redirect()->back()->with('success', 'Updated Successfully');
    }
}

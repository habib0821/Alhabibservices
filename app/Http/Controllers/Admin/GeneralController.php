<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\General;

class GeneralController extends Controller
{
    public function index()
    {
        $setting = General::find(1);

        return view('admin.general.index', compact('setting'));
    }

    public function savedata(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'website_name' => 'required|max:255',
            'website_logo' => 'nullable',
            'website_favicon' => 'nullable',
            'description' => 'nullable',
            'meta_title' => 'required|max:255',
            'meta_keyword' => 'nullable',
            'meta_description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $setting = General::where('id', '1')->first();
        if ($setting) {

            $setting->website_name = $request->website_name;

            if ($request->hasfile('website_logo')) {

                $destination = 'upload/settings/' .$setting->logo;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $file = $request->file('website_logo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('upload/settings', $filename);
                $setting->logo = $filename;
            }

            if ($request->hasfile('website_favicon')) {

                $destination = 'upload/settings/' .$setting->favicon;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $file = $request->file('website_favicon');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('upload/settings', $filename);
                $setting->favicon = $filename;
            }

            $setting->description = $request->description;

            $setting->meta_title = $request->meta_title;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->meta_description = $request->meta_description;
            $setting->save();

            return redirect('admin/settings')->with('message', 'Setting Updated');

        }
        else {
            $setting = new General;
            $setting->website_name = $request->website_name;
            if ($request->hasfile('website_logo')) {
                $file = $request->file('website_logo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('upload/settings', $filename);
                $setting->logo = $filename;
            }

            if ($request->hasfile('website_favicon')) {
                $file = $request->file('website_favicon');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('upload/settings', $filename);
                $setting->favicon = $filename;
            }


            $setting->description = $request->description;

            $setting->meta_title = $request->meta_title;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->meta_description = $request->meta_description;
            $setting->save();

            return redirect('admin/settings')->with('message', 'Setting Added');
        }
    }
}

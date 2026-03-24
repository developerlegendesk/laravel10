<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first(); // single row settings
        return view('settings.edit', compact('setting'));
    }

    // Update General Settings
    public function updateGeneralSettings(Request $request)
    {
        $setting = Setting::first();

        $request->validate([
            'app_name' => 'required|string|max:255',
            'app_email' => 'required|email|max:255',
            'app_phone' => 'nullable|string|max:50',
            'app_logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
            'app_favicon' => 'nullable|image|mimes:png,ico|max:1024',
        ]);

        $setting->app_name = $request->app_name;
        $setting->app_email = $request->app_email;
        $setting->app_phone = $request->app_phone;

        // Logo upload - delete old if exists
       if ($request->hasFile('app_logo')) {
            // Check if old logo exists and delete it
            if ($setting->app_logo && Storage::disk('public')->exists($setting->app_logo)) {
                Storage::disk('public')->delete($setting->app_logo);
            }
            // Store new logo in public disk
            $setting->app_logo = $request->file('app_logo')->store('settings', 'public');
        }

        // Favicon upload - delete old if exists
        if ($request->hasFile('app_favicon')) {
            // Check if old favicon exists and delete it
            if ($setting->app_favicon && Storage::disk('public')->exists($setting->app_favicon)) {
                Storage::disk('public')->delete($setting->app_favicon);
            }
            // Store new favicon in public disk
            $setting->app_favicon = $request->file('app_favicon')->store('settings', 'public');
        }

        $setting->save();

        return redirect()->back()->with('success', 'General settings updated successfully'); // silent success
    }

    // Update Email & Social Settings
    public function updateEmailSocialSettings(Request $request)
    {
        $setting = Setting::first();

        $request->validate([
            'email_from' => 'nullable|email|max:255',
            'email_host' => 'nullable|string|max:255',
            'email_port' => 'nullable|string|max:10',
            'email_username' => 'nullable|string|max:255',
            'email_password' => 'nullable|string|max:255',
            'email_encryption' => 'nullable|string|max:10',
            'facebook' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        $setting->email_from = $request->email_from;
        $setting->email_host = $request->email_host;
        $setting->email_port = $request->email_port;
        $setting->email_username = $request->email_username;

        if($request->filled('email_password')){
            $setting->email_password = $request->email_password;
        }

        $setting->email_encryption = $request->email_encryption;
        $setting->facebook = $request->facebook;
        $setting->tiktok = $request->tiktok;
        $setting->instagram = $request->instagram;
        $setting->twitter = $request->twitter;
        $setting->linkedin = $request->linkedin;

        $setting->save();

        return redirect()->back()->with('success', 'Email & Social settings updated successfully'); // silent success
    }
}

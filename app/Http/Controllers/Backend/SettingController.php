<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function showSettings (){

        $generalSettings = SiteSetting::first();
        // dd($generalSettings);
        return view('backend.settings.general-settings', compact('generalSettings'));

    }

    public function updateSettings(Request $request){
        $generalSettings = SiteSetting::first();

        $generalSettings->phone = $request->phone;
        $generalSettings->email = $request->email;
        $generalSettings->address = $request->address;
        $generalSettings->facebook = $request->facebook;
        $generalSettings->twitter = $request->twitter;
        $generalSettings->instagram = $request->instagram;
        $generalSettings->youtube = $request->youtube;

        // for logo
    if(isset($request->logo)){
            // main/single image delete from ProductController (CategoryController categoryDelete copy and paste)
            if ($generalSettings->logo && file_exists('backend/images/setting/'.$generalSettings->logo)) {
                unlink('backend/images/setting/'.$generalSettings->logo);
            }
            // single image upload
            $imageName = rand() . '-logo-' . '.' . $request->logo->extension();
            $request->logo->move('backend/images/setting', $imageName);

            $generalSettings->logo = $imageName;
        }

        // for banner 
        if (isset($request->banner)){
            // main/single image delete from ProductController (CategoryController categoryDelete copy and paste)
            if ($generalSettings->banner && file_exists('backend/images/setting/'.$generalSettings->banner)){
                unlink('backend/images/setting/'.$generalSettings->banner);
            }
            // single image upload
            $imageName = rand() . '-logo-' . '.' . $request->banner->extension();
            $request->banner->move('backend/images/setting', $imageName);

            $generalSettings->banner = $imageName;

            $generalSettings->save();
            return redirect()->back();
        }
    }

    // Top Banners
        public function showBanners(){
            $banners = Banner::get();
            return view('backend.settings.banners', compact('banners'));
        }

        public function editBanner ($id){
            $banner = Banner::find($id);
            return view('backend.settings.banner-edit', compact('banner'));
        }

        public function updateBanners (Request $request,$id){
            $banner = Banner::find($id);

            // dd($banner);
            if (isset($request->banner_image)){
                // dd("condition");
            // main/single image delete from ProductController (CategoryController categoryDelete copy and paste)
            if ($banner->banner_image && file_exists('backend/images/setting/'.$banner->banner_image)){
                unlink('backend/images/setting/'.$banner->banner_image);
            }
            // single image upload
            $bannerName = rand() . '-banner-' . '.' . $request->banner_image->extension();
            $request->banner_image->move('backend/images/setting', $bannerName);

            $banner->banner_image = $bannerName;

            $banner->save();
            // return redirect()->back();
            return redirect('admin/top-banners');
        }
}

}
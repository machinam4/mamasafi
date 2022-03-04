<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Variation;
use App\Models\Sub_service;
use Illuminate\Http\Request;
use App\Models\Variation_option;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function list_services()
    {
        $services = Service::all();
        // dd($services);
        return view('admin/services/list_services', ['services' => $services]);
    }

    // post data methods
    // add service
    public function add_service_all(Request $request)
    {
        $service = Service::firstOrCreate(
            ['name' => $request->input('service_name')],
            [
                'status' => $request->input('status') ? 1 : 0
            ]
        );
        $sub_service = Sub_service::firstOrCreate(
            ['name' => $request->input('sub_service')],
            [
                'status' => $request->input('status') ? 1 : 0,
                'service_id' => $service->id
            ]
        );
        $variation = Variation::firstOrCreate(
            ['name' => $request->input('variation_name')],
            [
                'status' => $request->input('status') ? 1 : 0,
                'sub_service_id' => $sub_service->id
            ]
        );
        $variation_option = Variation_option::firstOrCreate(
            ['name' => $request->input('variation_option')],
            [
                'status' => $request->input('status') ? 1 : 0,
                'unit_measure' => $request->input('unit_measure'),
                'price' => $request->input('price'),
                'variation_id' => $variation->id
            ]
        );

        return $variation_option->id;
    }

    // move to another class or make them edits
    public function add_service(Request $request)
    {
        $service = Service::firstOrCreate(
            ['name' => $request->input('name')],
            [
                'status' => $request->input('status') ? 1 : 0
            ]
        );
        return $service->id;
    }
    public function add_subservice(Request $request)
    {
        $sub_service = Sub_service::firstOrCreate(
            ['name' => $request->input('name')],
            [
                'status' => $request->input('status') ? 1 : 0,
                'service_id' => $request->input('service_id')
            ]
        );
        return $sub_service->id;
    }
    public function add_variation(Request $request)
    {
        $variation = Variation::firstOrCreate(
            ['name' => $request->input('name')],
            [
                'status' => $request->input('status') ? 1 : 0,
                'sub_service_id' => $request->input('sub_service_id')
            ]
        );
        return $variation->id;
    }
    public function add_variation_option(Request $request)
    {
        $variation_option = Variation_option::firstOrCreate(
            ['name' => $request->input('name')],
            [
                'status' => $request->input('status') ? 1 : 0,
                'unit_measure' => $request->input('unit_measure'),
                'price' => $request->input('price'),
                'variation_id' => $request->input('variation_id')
            ]
        );
        return $variation_option->id;
    }
}

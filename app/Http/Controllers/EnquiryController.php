<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Events\Enquiry as EnquiryEvent;
use App\Http\Requests\EnquiryRequest;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function enquiry(EnquiryRequest $request)
    {
        try {
            $enquiry = $request->validated();
            $enquiry['user_id'] = \Auth::user()->id;
            $enquiryData = Enquiry::create($enquiry);
            EnquiryEvent::dispatch($enquiryData);
            return back()->with('success', 'Enquiry submitted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function index(Request $request)
    {
        return view('admin.enquiry.index');
    }

    public function enquiryDT(Request $request)
    {
        try {
            $sortBy = $request->columns[$request->order[0]['column']]['name'];
            $dir = $request->order[0]['dir'];
            $sortOrder = ($dir) ? $dir : config('pager.sortOrder');
            $recordsPerPage = ($request->has('length')) ? $request->get('length') : config('pager.recordsPerPage');
            $skip = $request->input('start');
            $take = $recordsPerPage;

            if (!empty($request->input('search.value'))) {
                $search = $request->input('search.value');
                $sql = Enquiry::where('name', 'like', "%" . $search . "%")
                    ->orWhere('email', 'like', "%" . $search . "%")
                    ->orWhere('contact', 'like', "%" . $search . "%")
                    ->orderBy($sortBy, $sortOrder);
            } else {
                $sql = Enquiry::orderBy($sortBy, $sortOrder);
            }

            $recordsFiltered = $sql->count();
            $data = $sql->skip($request->start)->limit($request->length)->get();
            $recordsTotal = $data->count();
            $json_data = array(
                "recordsTotal" => $recordsTotal,
                "recordsFiltered" => $recordsFiltered,
                "data" => $data,
            );
            return \Response::json($json_data);
        } catch (\Exception $e) {
            $data = array(
                'msg' => 'Failed to get data.',
                'status' => 'fail',
            );
            return \Response::json($data);
        }
    }
}

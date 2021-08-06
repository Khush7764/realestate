<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return view('admin.property.index');
    }

    /*public function create()
    {
    //
    }*/

    /*public function store(Request $request)
    {
    //
    }*/

    public function show($id)
    {
        $pro = Property::findOrFail($id);
        return view('admin.property.show', compact('pro'));
    }
    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('admin.property.edit', compact('property'));
    }

    public function update(PropertyRequest $request, $id)
    {
        try {
            $pro = Property::findOrFail($id);
            $property = $request->validated();
            if ($request->hasFile('featured_image')) {
                if (!empty($pro->featured_image)) {
                    unlink(storage_path('app/public/feature/') . $pro->featured_image);
                }
                $image = \Str::random(4) . time() . '.' . $request->file('featured_image')->getClientOriginalExtension();
                $path = \Storage::putFileAs(
                    'public/feature', $request->file('featured_image'), $image
                );
                $property['featured_image'] = $image;
            }

            if ($request->has('gallery_images')) {
                if (!empty($pro->gallery_images)) {
                    $gallery_img = json_decode($pro->gallery_images);
                    if (count($gallery_img) > 0) {
                        foreach ($gallery_img as $img) {
                            unlink(storage_path('app/public/gallery/') . $img);
                        }
                    }
                }
                $images = array();
                foreach ($request->gallery_images as $gallery) {
                    $image = \Str::random(4) . time() . '.' . $gallery->getClientOriginalExtension();
                    $path = \Storage::putFileAs(
                        'public/gallery', $gallery, $image
                    );
                    $images[] = $image;
                }
                $property['gallery_images'] = json_encode($images);
            }
            $pro->update($property);
            return redirect()->route('admin.property.index')->with('success', 'Property details updated successfully');
        } catch (\Exception $e) {
            dd($e);
            return back()->with('error', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        try {
            Property::findOrFail($id)->delete();
            return \Response::json(['code' => 202, 'message' => 'Property deleted successfully']);
        } catch (\Exception $e) {
            return \Response::json(['code' => 400, 'message' => 'Something went wrong']);
        }
    }

    public function propertyDT(Request $request)
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
                $sql = Property::where('city', 'like', "%" . $search . "%")
                    ->orWhere('bedrom', 'like', "%" . $search . "%")
                    ->orWhere('title', 'like', "%" . $search . "%")
                    ->orWhere('price', 'like', "%" . $search . "%")
                    ->orWhere('floor_area', 'like', "%" . $search . "%")
                    ->orderBy($sortBy, $sortOrder);
            } else {
                $sql = Property::orderBy($sortBy, $sortOrder);
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
            dd($e);
            $data = array(
                'msg' => 'Failed to get data.',
                'status' => 'fail',
            );
            return \Response::json($data);
        }
    }

    public function home(Request $request)
    {
        $propertyLatest = Property::orderBy('id', 'desc')->take(3)->get();
        return view('welcome', compact('propertyLatest'));
    }

    public function propertyList(Request $request)
    {
        try {
            $property = Property::paginate(9);
            return view('property', compact('property'));
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Something went wrong');
        }
    }

    public function propertyDetails(Request $request, $id)
    {
        try {
            $pro = Property::findOrFail($id);
            return view('property_details', compact('pro'));
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function propertyListPost(Request $request)
    {
        try {
            $property = Property::when(!empty($request->title), function ($que) use ($request) {
                $que->where('title', $request->title);
            })->when(!empty($request->bedrom), function ($que) use ($request) {
                $que->where('bedrom', $request->bedrom);
            })->when(!empty($request->city), function ($que) use ($request) {
                $que->where('city', $request->city);
            })->when(!empty($request->price), function ($que) use ($request) {
                $que->where('price', $request->price);
            })->paginate(9);
            return view('property', compact('property'));
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Something went wrong');
        }
    }
}

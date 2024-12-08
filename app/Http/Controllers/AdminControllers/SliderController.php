<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\StoreSliderRequest;
use App\Http\Requests\Slider\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\File; // Use this for file handling
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::select('id', 'title', 'description', 'image', 'status')
            ->latest()
            ->paginate(10);

        return view('AdminPages.Slider.index', compact('sliders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->storeAs('public/sliders', $request->file('image')->getClientOriginalName());
        }

        Slider::create($data);

        return redirect()->back()->with('success', 'Slider added successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $data = $request->validated();

        // Handle image replacement
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($slider->image && file_exists(public_path('storage/' . $slider->image))) {
                unlink(public_path('storage/' . $slider->image));
            }

            $data['image'] = $request->file('image')->storeAs('public/sliders', $request->file('image')->getClientOriginalName());
        }

        $slider->update($data);

        return redirect()->back()->with('success', 'Slider updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        // Delete image if it exists
        if ($slider->image && file_exists(public_path('storage/' . $slider->image))) {
            unlink(public_path('storage/' . $slider->image));
        }

        $slider->delete();

        return redirect()->back()->with('success', 'Slider deleted successfully!');
    }
}

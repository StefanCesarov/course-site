<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Language;
use App\Models\Framework;
use App\Models\Category;


class SiteController extends Controller
{
    //

    public function preuzimanjePlacanje() {
        return view('front.preuzimanje-placanje')
        ->with('courses', Course::all())
        ->with('languages', Language::all())
        ->with('frameworks', Framework::all());
    }
}

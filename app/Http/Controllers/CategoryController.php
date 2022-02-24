<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Language;
use App\Models\Framework;
use App\Models\Course;

class CategoryController extends Controller
{
    //

    //display backend page
    public function backendCourses()
    {
      //dd(Course::all());
      return view('front.category')
      ->with('category', Category::all()->find(1))
      ->with('courses', Course::where('category_id', 1)->paginate(8))
      ->with('languages', Language::all())
      ->with('frameworks', Framework::all())
      ->with('opisNaslova', "Java, PHP, .NET, SQL, NodeJS, Python");
    }

    //display fullstack page
    public function fullstackCourses()
    {
      //dd(Course::all());
      return view('front.category')
      ->with('category', Category::all()->find(5))
      ->with('courses', Course::where('category_id', 5)->paginate(8))
      ->with('languages', Language::all())
      ->with('frameworks', Framework::all())
      ->with('opisNaslova', "Backend + Front-End");
    }

    //display frontend page
    public function frontendCourses()
    {
      //dd(Course::all());
      return view('front.category')
      ->with('category', Category::all()->find(2))
      ->with('courses', Course::where('category_id', 2)->paginate(8))
      ->with('languages', Language::all())
      ->with('frameworks', Framework::all())
      ->with('opisNaslova', "JavaScript, HTML&CSS, React, Angular, Vue.js");
    }
}

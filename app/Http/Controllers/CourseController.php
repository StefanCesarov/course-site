<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Language;
use App\Models\Framework;
use App\Models\Category;
use App\Models\User;
use App\Models\Review; // dodato review



class CourseController extends Controller
{
    //
        
    public function index()
    {
      //dd(Course::all());
      //User::all()->count()
      $broj_lekcija = Course::sum('broj_lekcija');
      $sati_sadrzaja = Course::sum('sati_sadrzaja');
      $broj_kurseva = Course::count('id');
      $users_no = User::all()->where('status', '2')->count();
      
      $reviews = Review::all()->where('status', '2')->take(5); //dodato reviews

      return view('front.index')
      ->with('courses', Course::paginate(18))
      ->with('languages', Language::all())
      ->with('frameworks', Framework::all())
      ->with('users_no', $users_no)
      ->with('reviews', $reviews) //dodato review
      ->with('broj_lekcija', $broj_lekcija)
      ->with('broj_kurseva', $broj_kurseva)
      ->with('sati_sadrzaja', $sati_sadrzaja);
    }
    // dodato za besplatan materijal

    public function besplatanMaterijal()
    {
      //dd(Course::all());
      //User::all()->count()
     
      $reviews = Review::all()->where('status', '2')->take(5); //dodato reviews
    //  $courses = Course::all()->where('besplatan', 1)->whereNotNull('intro');
      $courses = Course::all()->whereNotNull('intro');
 

      return view('front.besplatansadrzaj')
      ->with('courses', $courses)
      ->with('languages', Language::all())
      ->with('frameworks', Framework::all())
      ->with('reviews', $reviews); //dodato review
    }

    // show single COURSE on the webpage
    public function show(Course $course)
    {
        return view('front.single-course')
          ->with('course', $course)
          ->with('languages', Language::all())
          ->with('frameworks', Framework::all());
    }

    public function language (Language $language)
    {
        if ($language->id == 5) {
            $language->name = 'C#';
        }            
        return view('front.language')
        ->with('getLanguage', $language)
        ->with('courses', Course::where('language_id', $language->id)->paginate(8))
        ->with('languages', Language::all())
        ->with('frameworks', Framework::all());
    }

    public function framework (Framework $framework)
    {
     
        return view('front.framework')
        ->with('getFramework', $framework)
        ->with('languages', Language::all())
        ->with('frameworks', Framework::all())
        ->with('courses', Course::where('framework_id', $framework->id)->paginate(8));
        
    }

}

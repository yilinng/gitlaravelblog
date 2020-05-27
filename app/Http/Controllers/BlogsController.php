<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\User;
use Auth;
use App\Countview;
use Illuminate\Support\Facades\Mail;
use App\Events\NewPostEvent;
use App\Mail\AddNewPostMail;
use Intervention\Image\Facades\Image;


class BlogsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }


    public function index(){

    	//most view
        $mostview =Blog::orderBy('countview', 'desc')// Order by the countview count
                        ->take(5) // Take the first 5
                        ->get();


        //oldest post
        $oldestpost = Blog::oldest()->first()::paginate(5);
        //dd($oldestpost);
        //lastest post
        $blogs =Blog::paginate(5);

    	return view('blogs.index', compact('blogs','mostview', 'oldestpost'));
    }

    public function show(Blog $blog){

        $count = Blog::where('id', $blog->id)->increment('countview', 1);

        //dd($count);

    	return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog){


        $this->authorize('view', $blog);

    	if ($blog->user_id != auth()->id()) {

                return 'not out blog!!';
        }

    	return view('blogs.edit', compact('blog'));
    }

    public function update(Blog $blog){


    	$blog->update($this->validateRequest());

        $this->storeImage($blog);

        session()->flash('success', '更新成功');

    	return redirect('blogs/' . $blog->id);
    }


    public function destory(Blog $blog){


    	$blog->delete();

        session()->flash('success', '刪除成功');

    	 return Redirect::back();
    }


    public function create(){

        $blog = new Blog();
        //获取当前的认证用户的 ID（未登录情况下会报错）
        $user_id = Auth::id();

       // dd($user);

    	return view('blogs.create', compact('user_id'));
    }

    public function store(){


    	$blog = Blog::create($this->validateRequest());

        $this->storeImage($blog);

    	return redirect('blogs');
    }

    private function validateRequest()

    {
            return tap(request()->validate([
            'title' => 'required|max:255',
            'content' => 'required',

        ]), function(){
            if (request()->hasFile('image')) {
                //dd(request()->image);
            request()->validate([
                'image' => 'file|image|max:5000',
        ]);

          }

       });
    }

    private function storeImage($blog)
    {
        if (request()->has('image')) {
            $blog->update([

                'image' =>request()->image->store('uploads', 'public'),
            ]);
        }
    }



}

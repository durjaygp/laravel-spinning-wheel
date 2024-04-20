<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Validator;

class UserPanelController extends Controller
{
    public function index(){
        return view('userPanel.admin.admin');
    }

    public function profileSetting(){
        return view('frontEnd.profile.index');
    }

    public function indexBlog(){
        $blogs = Blog::latest()->where('user_id',auth()->user()->id)->get();
        return view('userPanel.blog.index',compact('blogs'));
    }

    public function create(){
        return view('userPanel.blog.create');
    }

    public function edit($id){
        $categories = Category::whereStatus(1)->get();
        $blog = Blog::where('user_id',auth()->user()->id)->find($id);
        return view('userPanel.blog.edit',compact('categories','blog'));
    }

    public function save(Request $request){
        //return $request;
        $rules = [
            'name' => [
                'required',
                Rule::unique('blogs', 'name'),
            ],
            'image' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ];

        // Validation messages (customize these as needed)
        $messages = [
            'name.required' => 'Blog name is required.',
            'name.unique' => 'This Blog is already available.',
            'description.required' => 'Description is required.',
            'category_id.required' => 'Category is required.',
            'image.required' => 'Image is required.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $blog = new Blog();
        $blog->name = $request->name;
        $blog->slug = Str::slug($request->name, '-');
        $blog->user_id = auth()->user()->id;
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;
        $blog->main_content = $request->content;
        $blog->status = 3;
        $blog->type = 'user';
        $blog->seo_description = $request->seo_description;
        $blog->seo_tags = $request->seo_tags;
        $blog->seo_keywords = $request->seo_keywords;
        if ($request->file('image')) {
            $blog->image = $this->saveImage($request);
        }
        $blog->save();

        return redirect()->route('userBlog.list')->with('success','Blog Created Successfully');
    }


    public $image, $imageName, $imageUrl, $directory;
    public function saveImage($request)
    {
        $this->image = $request->file('image');
        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory = 'uploads/';
        $this->imageUrl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imageUrl;
    }

    public function delete($id){
        $blog = Blog::find($id);
        if (!$blog) {
            return redirect()->back()->with('error', 'Book not found');
        }
        if (file_exists($blog->image)) {
            unlink($blog->image);
        }
        $blog->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }


    public function update(Request $request)
    {
        $rules = [
            'name' => 'required',
            'status' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ];

        // Validation messages (customize these as needed)
        $messages = [
            'name.required' => 'Blog name is required.',
            'description.required' => 'Description is required.',
            'category_id.required' => 'Category is required.',
            'status.required' => 'Status is required.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If validation passes, update the student
        $blog = Blog::find($request->id);
        $blog->name = $request->name;
        $blog->slug = Str::slug($request->name, '-');
        $blog->user_id = auth()->user()->id;
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;

        $blog->main_content = $request->main_content;
        $blog->status = $request->status;
        $blog->position = $request->position;
        $blog->seo_description = $request->seo_description;
        $blog->seo_tags = $request->seo_tags;
        $blog->seo_keywords = $request->seo_keywords;
        $blog->position = $request->position;
        $blog->type = 'blog';
        if ($request->file('image')) {
            if (file_exists($blog->image)) {
                unlink($blog->image);
            }
            $blog->image = $this->saveImage($request);
        }
        $blog->save();
        return redirect()->route('blog.list')->with('success', 'Update Successfully');
    }

}

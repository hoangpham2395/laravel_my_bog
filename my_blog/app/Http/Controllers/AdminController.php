<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use Auth;
use Validator;

class AdminController extends Controller
{
    // Bắt buộc login thì mới vào được trang này
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'getLogout']);
    }

    public function getLogout() 
    {
        Auth::logout();
        return redirect(\URL::previous());
    }

	public function dashboard()
	{	
        $author_id = Auth::user()->id;
		$author = User::find($author_id);
		$post = Post::where('author_id', $author_id)->get();

        $posts = Post::count();
        $categories = Category::count();
		return view('admin.blog.dashboard', compact('author', 'post', 'posts', 'categories'));
	}

    /* Blog */

    public function blogAll()
    {
    	$posts = Post::with('author')->with('category')->paginate(5);

    	return view('admin.blog.all', compact('posts'));
    }

    public function blogCreate() 
    {
    	$categories = Category::all();

    	return view('admin.blog.create', compact('categories'));
    }

    public function blogEdit ($post_id) 
    {
    	$post = Post::find($post_id);
    	$categories = Category::all();

    	return view('admin.blog.edit', compact('post', 'categories'));
    }

    // Validate
    private $rules = [
        'title' => 'required',
        'slug' => 'required',
        'excerpt' => 'required',
        'body' => 'required'
    ];

    // Lấy dữ liệu từ form
    private function getRequest(Request $request) 
    {
        $data = $request->all();

        $data['published_at'] = (is_null($data['published_at'])) ? NULL : date('Y-m-d H:i:s', strtotime($data['published_at']));

        // Kiểm tra có file ảnh không
        if ($request->hasFile('image')) 
        {
            // Lấy tên file ảnh (nên kiểm tra trước)
            $image = $request->file('image')->getClientOriginalName();
            // echo $image; exit();

            // Tạo đường dẫn đến thư mục lưu ảnh
            $destination = base_path().'/public/images';

            // echo $destination; exit();

            // Kiểm tra file ảnh có bị trùng tên trong DB không
            if (file_exists($destination.'/'.$image)) 
            {
                $image = rand(1, 10000).'_'.$image;
            }

            //Di chuyển ảnh đến folder lưu trữ
            $request->file('image')->move($destination, $image);

            $data['image'] = $image;
        }

        return $data;
    }

    public function blogStore(Request $request) 
    {
        // Validator
        $validator = Validator::make($request->all(), $this->rules);

        // Validator sai
        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator);
        }
        else 
        // Validator thành công
        {
            // Lấy dữ liệu từ form
            $data = $this->getRequest($request);

            // Khởi tạo và lưu dữ liệu mới
            Post::create($data);

            return redirect()->intended('/admin/blog')->with('message-blog', 'Post Saved!');
        }
    }

    public function blogUpdate($post_id, Request $request) 
    {    
        // Validator
        $validator = Validator::make($request->all(), $this->rules);

        // Validator sai
        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator);
        }
        else 
        // Validator thành công
        {
            // Lấy dữ liệu từ form
            $data = $this->getRequest($request);

            // print_r($data); die();

            // Tìm dữ liệu
            $post = Post::find($post_id);

            // Xóa ảnh cũ 
            if (!empty($data['image']) && (!is_null($post->image))) 
            {
                unlink(base_path().'/public/images/'.$post->image);
            }

            // Sửa dữ liệu
            $post->update($data);

            return redirect()->intended('/admin/blog')->with('message-blog', 'Post Updated!');
        }
    }

    /* Category */

    public function categoryAll()
    {
        $categories = Category::with('posts')->paginate(5);

        return view('admin.category.all', compact('categories'));
    }

    public function categoryCreate() 
    {
        return view('admin.category.create');
    }

    public function categoryEdit($category_id)
    {
        $category = Category::find($category_id);

        return view('admin.category.edit', compact('category'));
    }

    public function categoryStore(Request $request) 
    {
        dd($request); die();
        // Validate
        $rules = [
            'title' => 'required',
            'slug' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator);
        }
        else 
        {
            // Lấy dữ liệu từ form
            $data = [
                'title' => $request->input('title'),
                'slug' => $request->input('slug')
            ];
 
            // Khởi tạo và thêm dữ liệu mới
            Category::create($data);

            return redirect()->intended('/admin/category')->with('message-category', 'Category saved!');
        }
    }

    public function categoryUpdate($category_id, Request $request) 
    {
        // Validate
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator);
        } 
        else 
        {
            // Lấy dữ liệu từ form
            $data = $request->all();

            // Tìm category
            $category = Category::find($category_id);

            $category->update($data);

            return redirect()->intended('/admin/category')->with('message-category', 'Category Updated!');
        }
    }
}

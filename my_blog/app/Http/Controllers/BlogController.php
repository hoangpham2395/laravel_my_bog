<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Category;
use App\Comment;
use DB;

use Illuminate\Http\Request;

class BlogController extends Controller
{

    // Kiểm tra đã đăng nhập chưa thì mới vào trang index
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function getPosts() 
    {
        $limit = 3;

        $posts = Post::with('author')
                    ->orderDesc()
                    ->published()
                    ->simplePaginate($limit);
        // Định nghĩa published() bởi scopePublished() bên model
        // orderDesc(): scopeOrderDesc()

        return $posts;
    }

    public function getCategories () 
    {
        $categories = Category::with(['posts'=> function ($query) {
                        $query->published();
                    }])
                    ->orderBy('title', 'asc')
                    ->get();
        return $categories;
    }

    public function index() 
    {
    	// \DB::enableQueryLog();
        $posts = $this->getPosts();

        $categories = $this->getCategories();        

    	return view('blog.index', compact('posts', 'categories'));	
    	// dd(\DB::getQueryLog());
    }

    public function category($category_id) 
    {
        // dd($category);
        // \DB::enableQueryLog();
        $posts = Post::published()->where('category_id', $category_id)->paginate(3);

        $categories = $this->getCategories();

        // dd($posts);

        return view('blog.index', compact('posts', 'categories'));    
        // dd(\DB::getQueryLog());
    }

    public function show($slug) 
    {
    	// $post = Post::published()->findOrFail($id);
    	$post = Post::published()->where('slug', $slug)->first();

        $posts = $this->getPosts();

        $categories = $this->getCategories();

        $comments = Comment::where('post_id', $post->id)->get();

        // dd($comments);

        $author = Post::published()->where('author_id', $post->author_id)->get();

    	// \DB::enableQueryLog();
    	return view('blog.show', compact('post', 'categories', 'author', 'posts', 'comments'));
    	// dd(\DB::getQueryLog());
    }


    public function comment(Request $request) 
    {
        $rules = [
            'name' => 'required|max:20',
            'email' => 'required|email',
            'comment' => 'required:max:150'
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        // dd($data);

        Comment::create($data);

        return redirect('blog/'.$data['slug']);
    }
}

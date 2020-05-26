<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestAdminArticle;
use Illuminate\Support\Str;  // dùng cho slug
use Carbon\Carbon;// DÙNG CHO created_at
use App\Models\Article;

class AdminArticleController extends Controller
{
    public function index()
    {
    	$articles = Article::paginate(10);
    	$viewData = [
    		'articles' => $articles
    	];

    	return view('admin.article.index', $viewData);
    }

    public function create()
    {
    	return view('admin.article.create');
    }

    public function store(RequestAdminArticle $request)
    {
        $data = $request->except('_token');
        $data['a_slug'] = Str::slug($request->a_name);
        $data['created_at'] = Carbon::now();
        if ($request->hasFile('a_avatar')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('a_avatar');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/article/'; // 
            // Thực hiện upload file
            $request->file('a_avatar')->move($path_upload,$filename);

            $data['a_avatar'] = $path_upload.$filename;
        }	

        $id = Article::insertGetId($data); //insertGetId À PHƯƠNG THƯC THÊM VÀO  BẢN GHI VÀ LẤY ID CỦA CỘT THEM VÀO

        return redirect()->route('admin.article.index');
    }

    public function edit($id)
    {       
         $article = Article::find($id);
        return view('admin.article.update', compact('article'));
    }

    public function update(RequestAdminArticle $request, $id)
    {
    	$article = Article::find($id);

        $data               = $request->except('_token'); //except là truy vấn dữ liệu nhưng bỏ đi thành phần _token
    	$data['a_slug'] = Str::slug($request->a_name);
        $data['updated_at'] = Carbon::now();
        if ($request->hasFile('a_avatar')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('a_avatar');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/article/'; // 
            // Thực hiện upload file
            $request->file('a_avatar')->move($path_upload,$filename);

            $data['a_avatar'] = $path_upload.$filename;
        }	

        $article->update($data);

        return redirect()->route('admin.article.index');
    }

    public function delete($id)
    {
    	$article = Article::find($id);
    	if ($article) {
    		$article->delete();
    	}

    	return redirect()->back();
    }

     public function active($id) 
    {
        $article = Article::find($id);
        $article->a_active =! $article->a_active; // thay đổi status
        $article->save();

        return redirect()->back();
    }

    public function hot($id) // thay đổi hot
    {
        $article = Article::find($id);
        $article->a_hot =! $article->a_hot;
        $article->save();

        return redirect()->back();
    }
}

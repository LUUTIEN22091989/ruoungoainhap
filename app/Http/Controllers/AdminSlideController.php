<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestAdminSlide;
use Illuminate\Support\Str;  // dùng cho slug
use Carbon\Carbon;// DÙNG CHO created_at
use App\Models\Slide;

class AdminSlideController extends Controller
{
    public function index()
    {
    	$slides = Slide::paginate(10);
    	$viewData = [
    		'slides' => $slides
    	];

    	return view('admin.slide.index', $viewData);
    }

    public function create()
    {
    	return view('admin.slide.create');
    }

    public function store(Request $request)
    {
    	$data = $request->except('_token');
    	$data['created_at'] = Carbon::now();
    	if ($request->hasFile('sd_image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('sd_image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/slide/';
            // Thực hiện upload file
            $request->file('sd_image')->move($path_upload,$filename);

            $data['sd_image'] = $path_upload.$filename;
        }

        $id = Slide::insertGetId($data); //insertGetId À PHƯƠNG THƯC THÊM VÀO  BẢN GHI VÀ LẤY ID CỦA CỘT THEM VÀO
    	
        return redirect()->route('admin.slide.index');
    }
    public function edit($id)  // sửa dữ liệu
    {
        $slide = Slide::find($id);
        return view('admin.slide.update', compact('slide'));
    }

    public function update(RequestAdminSlide $request, $id)  // update dữ liệu
    {
        $slide = Slide::find($id);
        $data               = $request->except('_token'); //except là truy vấn dữ liệu nhưng bỏ đi thành phần _token
        $data['updated_at'] = Carbon::now();
        if ($request->hasFile('sd_image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('sd_image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/slide/';
            // Thực hiện upload file
            $request->file('sd_image')->move($path_upload,$filename);

            $data['sd_image'] = $path_upload.$filename;
        }

        $update = $slide->update($data);

        return redirect()->route('admin.slide.index');
    }

    public function delete($id)
    {
        $slide = Slide::find($id);
        if ($slide) {
            $slide->delete();
        }

        return redirect()->route('admin.slide.index');
    }

   public function active($id)
    {
        $slide = Slide::find($id);
        $slide->sd_active =! $slide->sd_active;
        $slide->save();

        return redirect()->back(); 
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CommentController extends Controller
{   
    protected $table = 'comments';

    public function product($product_id){
        $dsBL=Comment::where('product_id',$product_id)->join('users','users.id','=','user_id')->select('comments.*','users.name AS user_fullname')->get();
        $kq=[
            'status'=>true,
            'message'=>'Lấy dữ liệu thành công',
            'data'=>$dsBL,
        ];
        return response()->json($kq,200);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $user = Auth::user();
        $checkBuy = DB::table('orders')
        ->where('user_id', $user->id)
        ->where('status', 'success') // Đơn hàng đã được giao thành công
        ->exists();

    if (!$checkBuy) {
        // Người dùng chưa mua sản phẩm, trả về thông báo lỗi
        // $successData = [
        //     'title' => 'Thất bại!',
        //     'text' => 'Bạn phải mua ít nhất 1 sản phẩm để bình luận!',
        //     'icon' => 'error'
        // ];
      
        // // Đặt dữ liệu vào session
        // session(['success_data' => $successData]);
        // return  redirect()->back();
        $kq = [
            'status' => false,
            'message' => 'Bạn chỉ có thể bình luận khi đã mua sản phẩm này.',
             'checkBuy' => $checkBuy
        ];
        return response()->json($kq, 403);
    }
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->product_id = $request->product_id;
        $comment->content = $request->content;
        $comment->rating = $request->rating;
       $comment->save();
       $kq = [
        'status'=>true,
        'message'=>'đã thêm'
       ];
       return response()->json($kq,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

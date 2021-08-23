<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $page = 10;
        $comments = Comment::paginate($page);
        return view('admin.comment.index', ['comments' => $comments]);
    }
    public function CommentAdd($id, Request $request)
    {
        $idProduct = $id;
        $product = Product::find($id);
        $model = new Comment();
        $model->id_product = $idProduct;
        $model->content = $request->content;
        $model->idUser = Auth::user()->id;
        // dd($model);
        $model->save();
        return redirect()->back();
    }
    public function delete($id)
    {
        $model = Comment::find($id);
        $model->delete();
        return redirect()->back();
    }
}

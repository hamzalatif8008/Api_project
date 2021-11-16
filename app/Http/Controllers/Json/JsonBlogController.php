<?php

namespace App\Http\Controllers\Json;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Models\Reply;
use App\Models\SubReply;
use Illuminate\Http\Request;

class JsonBlogController extends Controller
{
    public function comment()
    {
    $comment = new Comment;
    $comment->user_id = $_POST['uid'];
    $comment->product_id = $_POST['pid'];
    $comment->text = $_POST['cmnt'];
    $comment->save();
    $comments = Comment::where('product_id','=',$_POST['pid'])->get()->count();
    $data[0] = $comment->user->name;
    $data[1] = $comment->created_at->diffForHumans();
    $data[2] = $comment->text;
    $data[3] = $comment->id;
    $data[4] = $comment->user->id;
    $data[5] = $comments;
    return response()->json($data);
    }

    public function commentedit()
    {
    $id = $_POST['cid'];
    $txt = $_POST['text'];
    $comment =Comment::findOrFail($id);
    $comment->text = $txt;
    $comment->update();
    return response()->json($comment->text);
    } 

    public function commentdelete()
    {
    $id = $_GET['id'];
    $comment =Comment::findOrFail($id);
    if($comment->replies->count() > 0)
    {
        foreach ($comment->replies as $reply) {
            if($reply->subreplies->count() > 0)
            {
                foreach ($reply->subreplies as $subreply) {
                    $subreply->delete();
                }
            }
            $reply->delete();
        }
    }
    $comment->delete();
    } 

    public function replyedit()
    {
    $id = $_POST['cid'];
    $txt = $_POST['text'];
    $reply =Reply::findOrFail($id);
    $reply->text = $txt;
    $reply->update();
    return response()->json($reply->text);
    } 

    public function replydelete()
    {
    $id = $_GET['id'];
    $reply =Reply::findOrFail($id);
    if($reply->subreplies->count() > 0)
    {
        foreach ($reply->subreplies as $like) {
            $like->delete();
        }
    }
    $reply->delete();
    } 

    public function reply()
    {
    $reply = new Reply;
    $reply->user_id = $_POST['uid'];
    $reply->comment_id = $_POST['cid'];
    $reply->text = $_POST['rpl'];
    $reply->save();
    $replies = Reply::where('comment_id','=',$_POST['cid'])->get()->count();
    $data[0] = $reply->user->name;
    $data[1] = $reply->created_at->diffForHumans();
    $data[2] = $reply->text;
    $data[3] = $reply->id;
    $data[4] = $reply->user->id;
    $data[5] = $replies;
    return response()->json($data);
    } 

    public function subreplyedit()
    {
    $id = $_POST['cid'];
    $txt = $_POST['text'];
    $subreply =SubReply::findOrFail($id);
    $subreply->text = $txt;
    $subreply->update();
    return response()->json($subreply->text);
    } 

    public function subreplydelete()
    {
    $id = $_GET['id'];
    $subreply =SubReply::findOrFail($id);
    $subreply->delete();
    } 

    public function subreply()
    {
    $subreply = new SubReply;
    $subreply->user_id = $_POST['uid'];
    $subreply->reply_id = $_POST['rid'];
    $subreply->text = $_POST['subrpl'];
    $subreply->save();
    $subreplies = SubReply::where('reply_id','=',$_POST['rid'])->get()->count();
    $data[0] = $subreply->user->name;
    $data[1] = $subreply->created_at->diffForHumans();
    $data[2] = $subreply->text;
    $data[3] = $subreply->id;
    $data[4] = $subreplies;
    return response()->json($data);
    } 

}

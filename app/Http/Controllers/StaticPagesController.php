<?php
/**
 * Created by PhpStorm.
 * User: leijun
 * Date: 2017/1/17
 * Time: 下午4:15
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;


class StaticPagesController extends Controller
{
    public function home(){
        $feed_items = [];
        if(Auth::check()){
            $feed_items = Auth::user()->feed()->paginate(30);
        }
        return view('static_pages.home', compact('feed_items'));
    }
    public function help(){
        return view('static_pages.help');
    }
    public function about(){
        return view('static_pages.about');
    }
}
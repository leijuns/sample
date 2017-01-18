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


class StaticPagesController extends Controller
{
    public function home(){
        return view('static_pages.home');
    }
    public function help(){
        return view('static_pages.help');
    }
    public function about(){
        return view('static_pages.about');
    }
}
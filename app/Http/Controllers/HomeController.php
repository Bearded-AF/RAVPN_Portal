<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\data;

class HomeController extends Controller
{
    public function redirect()
    {
      $count = data::count();
      $active = data::where('status', 'Active')->count();
      $deactive = data::where('status', 'Deactive')->count();
      $deleted = data::where('status', 'Deleted')->count();

      if(Auth::id())
      {
        if(Auth::user()->is_admin=='0')
        {
          return view('user.home', ['count' => $count, 'deactive' => $deactive, 'active' => $active]);
        }
        else
        {
          return view('admin.home', ['count' => $count, 'deactive' => $deactive, 'active' => $active, 'deleted' => $deleted]);
        }
      }
      else
      {
        return redirect()->back();
      }
    }

    public function index()
    {
      return view('welcome');
    }
}

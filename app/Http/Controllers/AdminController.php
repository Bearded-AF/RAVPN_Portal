<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\data;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function register()
    {
        return view('admin.add_user');
    }

    public function view()
    {
      $user = user::all();

      return view('admin.view_user',compact('user'));
    }

    protected function validator(array $data)
{
    return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
}

    public function upload(Request $request)
    {
      $users = new User;

      $profile_pic = $request->profile_pic;
      $imagename = time().'.'.$profile_pic->getClientoriginalExtension();
      $request->profile_pic->move('profile_pic',$imagename);
      $users->profile_photo_path = $imagename;

      $users->name = $request->name;
      $users->employee_id = $request->employee_id;
      $users->email = $request->email;
      $users->phone = $request->phone;
      $users->password = Hash::make($request->password);
      $temp = 0;
      if($request->is_admin == 'Yes'){
        $temp = 1;
      }
      $users->is_admin = $temp;

      $users->save();

      return redirect()->back()->with('message','New user has been added!');
    }

    public function add()
    {
      return view('admin.add_data');
    }

    public function uploaddata(Request $request)
    {
      $data = new data;

      $attachment = $request->attachment;
      $attachmentname = time().'.'.$attachment->getClientoriginalExtension();
      $request->attachment->move('attachments',$attachmentname);
      $data->attachment = $attachmentname;

      $data->name = $request->name;
      $data->employee_id = $request->id;
      $data->division = $request->division;
      $data->department = $request->department;
      $data->designation = $request->designation;
      $data->phone = $request->phone;
      $data->email = $request->email;
      $data->site = $request->site;
      $data->access_type = $request->access;
      $data->date_of_request = $request->date;
      $data->business_justification = $request->justification;
      $data->validator = $request->validator;

      $data->save();

      return redirect()->back()->with('message','Data has been added!');
    }

    public function viewdata()
    {
      $data = data::all();

      if(Auth::user()->is_admin == '1') return view('admin.view_data',compact('data'));
      else return view('user.view_data',compact('data'));
    }

    public function active(Request $request)
    {
      $active = $request->input('active');
      $data = data::where('status', $active)->get();

      if(Auth::user()->is_admin == '1') return view('admin.view_data',compact('data'));
      else return view('user.view_data',compact('data'));
    }

    public function deactive(Request $request)
    {
      $deactive = $request->input('deactive');
      $data = data::where('status', $deactive)->get();

      if(Auth::user()->is_admin == '1') return view('admin.view_data',compact('data'));
      else return view('user.view_data',compact('data'));
    }

    public function deleted(Request $request)
    {
      $deleted = $request->input('deleted');
      $data = data::where('status', $deleted)->get();

      return view('admin.view_data',compact('data'));
    }

    public function make(Request $request)
    {
      $user = user::all();
      $id = $request->input('id');
      $row = user::where('id', $id)->first();
      $row->is_admin = '1';
      $row->save();
      return redirect()->back()->with('user');
    }

    public function dismiss(Request $request)
    {
      $user = user::all();
      $id = $request->input('id');
      $row = user::where('id', $id)->first();
      $row->is_admin = '0';
      $row->save();
      return redirect()->back()->with('user');
    }

    public function delete(Request $request)
    {
      $user = user::all();
      $id = $request->input('id');
      $row = user::where('id', $id)->first();
      $row->delete();
      return redirect()->back()->with('user');
    }

    public function edit(Request $request)
    {
      $id = $request->input('id');
      $row = data::where('id', $id)->first();
      if(Auth::user()->is_admin=='1')
      {
        return view('admin.edit_data')->with('row',$row);
      }
      else {
        return view('user.edit_data')->with('row',$row);
      }
    }

    public function uploadedit(Request $request)
    {
      $data = data::all();
      $id = $request->input('id');
      $row = data::where('id', $id)->first();

      if($request->attachment != null)
      {
        $attachment = $request->attachment;
        $attachmentname = time().'.'.$attachment->getClientoriginalExtension();
        $request->attachment->move('attachments',$attachmentname);
        $row->attachment = $attachmentname;
      }

      if($request->name != null) $row->name = $request->name;
      if($request->emid != null) $row->employee_id = $request->emid;
      if($request->division != null) $row->division = $request->division;
      if($request->department != null) $row->department = $request->department;
      if($request->designation != null) $row->designation = $request->designation;
      if($request->phone != null) $row->phone = $request->phone;
      if($request->email != null) $row->email = $request->email;
      if($request->site != null) $row->site = $request->site;
      if($request->access != null) $row->access_type = $request->access;
      if($request->date != null) $row->date_of_request = $request->date;
      if($request->justification != null) $row->business_justification = $request->justification;
      if($request->validator != null) $row->validator = $request->validator;
      if($request->status != null) $row->status = $request->status;

      $note = $row->note;
      $new_note = now().' - '.$request->note;
      $updated_note = $note . "\n" . $new_note;
      $row->update(['note' => $updated_note]);

      $row->save();

      if(Auth::user()->is_admin=='1') return redirect('view_data')->with('message','Entry has been edited!')->with('data',$data);
      else return redirect('show_data')->with('message','Entry has been edited!')->with('data',$data);
    }

    public function edituser(Request $request)
    {
      $id = $request->input('id');
      $row = user::where('id', $id)->first();
      return view('admin.edit_user')->with('row',$row);
    }

    public function uploadedituser(Request $request)
    {
      $data = user::all();
      $id = $request->input('id');
      $row = user::where('id', $id)->first();

      if($request->profile_pic != null)
      {
        $profile_pic = $request->profile_pic;
        $imagename = time().'.'.$profile_pic->getClientoriginalExtension();
        $request->profile_pic->move('profile_pic',$imagename);
        $users->profile_photo_path = $imagename;
      }

      if($request->name != null) $row->name = $request->name;
      if($request->employee_id != null) $row->employee_id = $request->employee_id;
      if($request->phone != null) $row->phone = $request->phone;
      if($request->email != null) $row->email = $request->email;
      if($request->password != null) $row->password = Hash::make($request->password);
      if($request->is_admin != null)
      {
        $temp = 0;
        if($request->is_admin == 'Yes'){
          $temp = 1;
        }
        $row->is_admin = $temp;
      }

      $row->save();

      return redirect('view_user')->with('message','Entry has been edited!')->with('data',$data);
    }



}

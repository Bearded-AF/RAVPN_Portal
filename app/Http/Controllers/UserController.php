<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\data;

class UserController extends Controller
{
    public function add()
    {
      return view('user.add_data');
    }

    public function upload(Request $request)
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

    public function view()
    {
      $data = data::where('status', 'not like', '%deleted%')->get();;

      return view('user.view_data',compact('data'));
    }

    public function status(Request $request)
    {
      $data = data::all();
      $id = $request->input('id');
      $row = data::where('id', $id)->first();
      if ($row->status == 'Active')
      {
        $row->status = 'Deactive';
      }
      else {
        $row->status = 'Active';
      }
      $row->save();
      return redirect()->back()->with('data');
    }

    public function detail(Request $request)
    {
      $id = $request->input('id');
      $row = data::where('id', $id)->first();
      if(Auth::user()->is_admin=='0')
      {
        return view('user.view_data_detail')->with('row', $row);
      }
      else {
        return view('admin.view_data_detail')->with('row', $row);
      }
    }

    public function profiledetail(Request $request)
    {
      $id = $request->input('id');
      $row = data::where('id', $id)->first();
      if(Auth::user()->is_admin=='0')
      {
        return view('user.view_profile_detail')->with('row', $row);
      }
      else {
        return view('admin.view_profile_detail')->with('row', $row);
      }
    }
}

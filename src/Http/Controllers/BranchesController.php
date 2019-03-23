<?php
namespace Ogilo\Branches\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;

use Ogilo\Branches\Models\Branch;

class BranchesController extends Controller
{
    public function getDashboard()
    {
        $branches = Branch::all();
        return view('branches::dashboard',compact('branches'));
    }

    public function getAdd()
    {
        return view('branches::new');
    }

    public function postAdd(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validator)
                    ->with('global-warning','The data you provided failed validation');
        }

        $branch = new Branch;

        $branch->name = str_slug($request->title);
        $branch->title = $request->title;
        $branch->address = $request->address;
        $branch->box_no = $request->box_no;
        $branch->post_code = $request->post_code;
        $branch->town = $request->town;
        $branch->description = $request->description;
        $branch->tel = $request->tel;
        $branch->email = $request->email;
        $branch->facebook = $request->facebook;
        $branch->twitter = $request->twitter;
        $branch->youtube = $request->youtube;
        $branch->latlng = $request->latlng;

        $branch->save();
        
        return redirect()
                ->back()
                ->with('global-succees','Branch successfuly added');
    }

    public function getEdit($id)
    {
        $validator = Validator::make(['id'=>$id],[
            'id'=>'exists:branches'
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validator)
                    ->with('global-warning','The data you provided failed validation');
        }
        
        $branch = Branch::find($id);

        return view('branches::edit',compact('branch'));
    }

    public function postEdit(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id'=>'exists:branches',
            'title'=>'required|unique:branches,null,'.$request->id
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validator)
                    ->with('global-warning','The data you provided failed validation');
        }

        $branch = Branch::find($request->id);

        $branch->title = $request->title ? $request->title : $branch->title;
        $branch->address = $request->address ? $request->address : $branch->address;
        $branch->box_no = $request->box_no ? $request->box_no : $branch->box_no;
        $branch->post_code = $request->post_code ? $request->post_code : $branch->post_code;
        $branch->town = $request->town ? $request->town : $branch->town;
        $branch->description = $request->description ? $request->description : $branch->description;
        $branch->tel = $request->tel ? $request->tel : $branch->tel;
        $branch->email = $request->email ? $request->email : $branch->email;
        $branch->facebook = $request->facebook ? $request->facebook : $branch->facebook;
        $branch->twitter = $request->twitter ? $request->twitter : $branch->twitter;
        $branch->youtube = $request->youtube ? $request->youtube : $branch->youtube;
        $branch->latlng = $request->latlng ? $request->latlng : $branch->latlng;

        $branch->save();

        return redirect()
                ->route('admin-branches')
                ->with('global-success','Branch Updated');
    }

    public function getDelete($id)
    {
        $validator = Validator::make(['id'=>$id],[
            'id'=>'exists:branches'
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validator)
                    ->with('global-warning','The data you provided failed validation');
        }

        $branch = new Branch();

        $branch->pages->delete();

        $branch->delete();

        return redirect()
                ->back()
                ->with('global-success','Branch Removed');
    }
}

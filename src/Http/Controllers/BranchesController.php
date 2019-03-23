<?php
namespace Ogilo\Branches\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Ogilo\Branches\Models\Branch;

class BranchesController extends Controller
{
    public function getDashboard()
    {
        return view('branches::dashboard');
    }

    public function getAdd()
    {
        return view('branches::new');
    }

    public function postAdd(Request $request)
    {
        $branch = new Branch;

        $branch->save();
        
        return redirect()
                ->back()
                ->with('global-succees','Branch successfuly added');
    }
}

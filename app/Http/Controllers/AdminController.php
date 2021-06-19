<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\login;
use App\Worker;
use App\Area;
use App\Dept;
use App\customerRequest;
use App\AssignWorker;
use Illuminate\Support\Facdes\DB;
use Validator;
use App\Http\Requests\UserRequest;

class AdminController extends Controller
{
    public function index(Request $req){

       $workers = Worker::select('worker.userName', 'worker.firstName', 'worker.lastName', 'worker.phone', 'worker.NID', 'worker.address', 'worker.Rating', 'worker.Active', 'dept.name', 'area.AreaName')
                   ->join('dept', 'dept.DID', '=', 'worker.DID')
                   ->join('area', 'area.AreaID', '=', 'worker.AreaID')
                   ->get();
       $customerReq = customerRequest::select('request.RID', 'customer.firstName', 'customer.phone', 'request.selectedDept', 'request.selectedArea', 'request.noOfWorker', 'request.currentDate', 'request.address')
            ->join('customer', 'customer.CID', '=', 'request.CID')
            ->get();

           return view('Admin.index', ['std'=>$workers], ['ptd'=>$customerReq]);    
    }
    public function reqButton($id, Request $req){
      /*$workerassign = AssignWorker::select('assignworker.workingDate', 'assignworker.amount', 'customer.firstName', 'customer.phone','worker.firstName', 'worker.phone', 'request.selectedDept', 'request.selectedArea', 'request.noOfWorker', 'request.address')
            ->join('customer', 'customer.CID', '=', 'assignworker.CID')
            ->join('worker', 'worker.WID', '=', 'assignworker.WID')
            ->join('request', 'request.RID', '=', 'assignworker.RID')
            ->get();*/
            $customerReq = customerRequest::select('request.RID', 'customer.firstName', 'customer.phone', 'request.selectedDept', 'request.selectedArea', 'request.noOfWorker', 'request.currentDate', 'request.address')
            ->join('customer', 'customer.CID', '=', 'request.CID')
            ->where('request.RID', $id)
            ->get();

            $user = new AssignWorker();
        $user->username = $req->username;
        $user->password = $req->password;
        $user->name     = $req->name;
        $user->cgpa     = $req->cgpa;
        $user->dept     = $req->dept;
        $user->type     = $req->type;
    }
}

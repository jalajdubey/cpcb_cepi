<?php
namespace App\Http\Controllers;
use App\Models\State;
use App\Models\PIA_list;
use App\Models\User;
use App\Models\MonitoringReport; 
use App\Models\Action_Plan;
use App\Models\ActionReport;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\EntityExport;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Cpcbactionremark;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Collection;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        $userType = Auth::user()->userType;

        if($userType == 'PIA')
        {
            $industryarea = User::select('PIAName')->where('userType', 'PIA')->where('id', Auth::user()->id)->first();
            $actionPlanCount = Action_Plan::count();
            $countMonitoringReport = MonitoringReport::where('pia_id', Auth::user()->id)->count();
            return view('userscreens.piaDashboard', compact('actionPlanCount','industryarea','countMonitoringReport'));    
        }
        if($userType == 'State')
        {
            $countPIAs = User::where('userType', 'PIA')->where('state_id', Auth::user()->state_id)->count();
            $actionPlanCount = Action_Plan::where('state',Auth::user()->state_id)->count();
            $countMonitoringReport = MonitoringReport::where('state_id', Auth::user()->state_id)->count();
            return view('userscreens.stateDashboard', compact('countPIAs', 'actionPlanCount', 'countMonitoringReport'));
            // return redirect()->route('viewprofile');  
        }
       
        $actionPlanCount = Action_Plan::count();
        // echo "<pre>";
        // print_r( $actionPlanCount);die;

        $countstates = User::where('userType', 'State')->count(); 
        $countPIAs = User::where('userType', 'PIA')->count();
        $countMonitoringReport = MonitoringReport::count();
        $MonitoringReport2018 = MonitoringReport::where('Role_User', 1)->count();
        
        return view('userscreens.home' , ['countstates' => $countstates,'countPIAs'=> $countPIAs ,
                   'actionPlanCount'=>$actionPlanCount, 'countMonitoringReport'=>$countMonitoringReport, 'MonitoringReport2018'=>$MonitoringReport2018
                    
    ]);

    }

    public function RegisterPIAs()
    {
     $state_id = Auth::user()->state_id;
     $getstateid = State::where('id' , $state_id)->first(); 

    return view('auth.registerPIAs', compact('getstateid'));

    }

    public function viewlistPIAs()
    {
        $state_id = Auth::user()->state_id;   
        $data = User::where('state_id' , $state_id)->where('Role_User', 3)->get();
        
        return view('auth.viewregisterPIAs', compact('data'));

    }
    public function insertPIARegsiter(Request $req)
    {  
        //dd($req->all());
        $req->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobile' => 'required|digits:10',
        ]);

        $userPIA = new User;
        $userPIA->UserType = "PIA";
        $userPIA->email = $req->input('email');
        $userPIA->firstname = $req->input('firstname');
        $userPIA->lastname = $req->input('lastname');
        $userPIA->address = $req->input('address');
        $userPIA->catagries_of_PIA = $req->input('catagries_of_PIA');
        $userPIA->mobile = $req->input('mobile');
        $userPIA->state_id = Auth::user()->state_id;
        $userPIA->PIAName = $req->input('pia_name');
        $userPIA->Role_User = $req->input('Role_User');
        $userPIA->lat = $req->input('lat');
        $userPIA->long = $req->input('long');
        $userPIA->password = Hash::make($req->input('password'));
        
        if ($files = $req->file('kmlfile')) {

            $destinationPath = 'upload/kml_file/'; // upload path
            $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profilefile);
            $userPIA->kmlfile = "$profilefile";
          }

        $userPIA->save();
        return redirect()->route('PIAList');

    }
    public function addchecklist()
    {
      return view('userscreens.Addchecklist');  
    }


    public function ViewPIAForm()
    {

        return view('userscreens.AddPIAData');
    }
    public function addActionPlan()
    {

        $data = User::where('id', '=', Auth::user()->id)->first();
        //$fetch = Action_Plan::where('user_id', '=', Auth::user()->id)->get();
        $categ = Category::all();
        $fetch = Action_Plan::select('action_plans.*','states.state_name', 'categories.category_name')->join('states', 'states.id', '=', 'action_plans.state')
        ->join('categories', 'categories.id', '=', 'action_plans.catagries')
        ->where('action_plans.user_id', '=', Auth::user()->id)->get();
       
        return view('userscreens.addActionPlan' , ['data' => $data, 'fetch'=>$fetch, 'categ'=>$categ]);
    }

    public function AddPIAData(Request $req)
    {
        //dd($req->all());
        $action_plan = new Action_Plan;
        $action_plan->financial_year = $req->input('financial_year');
        $action_plan->catagries = $req->input('catagries');
        $action_plan->action_point = $req->input('action_point');
        $action_plan->responsible_ageancy = $req->input('responsible_ageancy');
        $action_plan->timeline = $req->input('timeline');
        $action_plan->financial_requirement = $req->input('financial_requirement');
        $action_plan->present_status = $req->input('present_status');
        $action_plan->user_id = $req->input('user_id');
        $action_plan->state = $req->input('state');
        $action_plan->remark = $req->input('remark');
        if($req->input('catagries')==5){
        $action_plan->other_des = $req->input('other_des');
        }

        $action_plan->save();
        return redirect()->route('viewPIAdata');

    }

    public function showActionReportPlan()
    {
        $user_id = Auth::id();
        $PIAId = User::where('id', '=', Auth::user()->id)->first();
        // echo "<pre>";
        // print_r($PIAId->id);die;
        return view('userscreens.viewActionReportPlan',compact('PIAId'));
    }

    public function upload_Action_Plan(Request $req)
    {
        $action_report = new ActionReport;
        $action_report->pia_id = $req->input('pia_id');
        $action_report->user_id = $req->input('user_id');
        $action_report->financial_year = $req->input('financial_year');
        $action_report->months = $req->input('months');
        $action_report->monsoon = $req->input('monsoon');
        $action_report->category_of_PIA = $req->input('category_of_PIA');

        if($files = $req->file('report_file')) {

            $destinationPath = 'upload/ReportFile/'; // upload path
            $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profilefile);
            $action_report->report_file = "$profilefile";
          }
          
         $insert = $action_report->save();
         if($insert == true)
         {
            return redirect()->back();
         }
    }

    public function vie_Action_Report()
    {
        $data = ActionReport::all();
        return view('userscreens.viewAllActionReportPlans',compact('data'));
    }

    public function deleteActionPlanData($id)
        {
        DB::delete('delete from action_reports where id = ?',[$id]);
        return redirect()->back();
        } 

    public function ViewPIAData()
    {
        $data = User::where('id', '=', Auth::user()->id)->first();
        //$fetch = Action_Plan::where('user_id', '=', Auth::user()->id)->get();
        $categ = Category::all();
        $fetch = Action_Plan::select('action_plans.*','states.state_name', 'categories.category_name')->join('states', 'states.id', '=', 'action_plans.state')
        ->join('categories', 'categories.id', '=', 'action_plans.catagries')
        ->where('action_plans.user_id', '=', Auth::user()->id)->get();
        return view('userscreens.ViewPIAData' , ['data' => $data, 'fetch'=>$fetch, 'categ'=>$categ]);
    }

    public function ViewDetails(Request $req)
    {
        $id = $req->input('hidden_id');
        $data =  Action_Plan::find($id);
        return view('userscreens.ViewPIADetails' , ['data' => $data]);

    }

    public function fetchRegisteredPIA()
    {
        //DB::enableQueryLog();
        $piadatacount = DB::select("SELECT st.state_name, u.state_id,
        SUM(CASE WHEN u.catagries_of_PIA = 'CPA' THEN 1 ELSE 0 END) as cpa,
        SUM(CASE WHEN u.catagries_of_PIA = 'SPA' THEN 1 ELSE 0 END) as spa,
        SUM(CASE WHEN u.catagries_of_PIA = 'OPA' THEN 1 ELSE 0 END) as opa,
        count(u.id) as totalcount
        FROM `users` as u 
        JOIN states as st on st.id = u.state_id
        WHERE u.Role_User = 3 GROUP BY st.state_name");
        //dd(DB::getQueryLog());
        return view('adminscreens.RegisteredPIAs' , ['piadatacount'=>$piadatacount]);
    }

    public function view_piaprogress_status()
    {
        //DB::enableQueryLog();
        $piadatacount = DB::select("SELECT st.state_name, u.state_id,
        SUM(CASE WHEN u.catagries_of_PIA = 'CPA' THEN 1 ELSE 0 END) as cpa,
        SUM(CASE WHEN u.catagries_of_PIA = 'SPA' THEN 1 ELSE 0 END) as spa,
        SUM(CASE WHEN u.catagries_of_PIA = 'OPA' THEN 1 ELSE 0 END) as opa,
        SUM(CASE WHEN u.PIAName is not null THEN 1 ELSE 0 END) as totalcount,
        (SELECT count(id) from action_plans where state=u.state_id) as actionplan, 
        (SELECT SUM(present_status) from action_plans where state=u.state_id) as progress 
        FROM `users` as u 
        JOIN states as st on st.id = u.state_id
        WHERE u.Role_User = 3 GROUP BY st.state_name order by st.state_name asc");
        //dd(DB::getQueryLog());
        return view('adminscreens.viewpiaprogress' , ['piadatacount'=>$piadatacount]);
    }
    
    //fetch registered PIAs: state
    public function fetchRegisteredPIAState()
    {
        //DB::enableQueryLog();
        // $data = User::where('userType' , 'PIA')->get();
        $user_id = Auth::id();
        echo $PIAId = User::where('user_id', '=', Auth::user()->id)->select('state_id')->pluck('state_id')->first();
        die;

        $piadatacount = DB::select("SELECT st.state_name, u.state_id,
        SUM(CASE WHEN u.catagries_of_PIA = 'CPA' THEN 1 ELSE 0 END) as cpa,
        SUM(CASE WHEN u.catagries_of_PIA = 'SPA' THEN 1 ELSE 0 END) as spa,
        SUM(CASE WHEN u.catagries_of_PIA = 'OPA' THEN 1 ELSE 0 END) as opa,
        count(u.id) as totalcount
        FROM `users` as u 
        JOIN states as st on st.id = u.state_id
        WHERE u.Role_User = 3 and u.sate GROUP BY st.state_name");
        //dd(DB::getQueryLog());
        return view('adminscreens.RegisteredPIAState' , ['piadatacount'=>$piadatacount]);
    }

    public function export() 
    {
          return Excel::download(new EntityExport, 'entities.xlsx');
    }

    public function registerfieldofficer()
    {
        return view('PIAscreens.register');
    }

    public function viewStateList()
    {
        //$data = User::where('Role_User' , '2')->get();
        $data = DB::select("SELECT st.state_name, u.firstname, u.lastname, u.userType, u.address, u.mobile, u.email
        FROM `users` as u JOIN states as st on st.id = u.state_id where u.Role_User=2");

        return view('adminscreens.ViewStateList', compact('data'));
    }

    public function addstates()
    {
        $data = State::all();
        return view('adminscreens.StateRegister' , ['data' => $data]);
    }
    // dhow data on front page: login.blade.php 
    public function ListTotalPia()
    {
        //$data = User:: where('state_id', $id)->where('Role_User', 3)->get();
        $piadatacount = DB::select("SELECT st.state_name, u.state_id,
        SUM(CASE WHEN u.catagries_of_PIA = 'CPA' THEN 1 ELSE 0 END) as cpa,
        SUM(CASE WHEN u.catagries_of_PIA = 'SPA' THEN 1 ELSE 0 END) as spa,
        SUM(CASE WHEN u.catagries_of_PIA = 'OPA' THEN 1 ELSE 0 END) as opa,
        count(u.id) as totalcount
        FROM `users` as u 
        JOIN states as st on st.id = u.state_id
        WHERE u.Role_User = 3 GROUP BY st.state_name");

        return view('adminscreens.ViewPiaList',compact('data'));
    }
    public function view_Pia_list(Request $resp)
    {
       $data = User:: where('state_id', $resp->id)->where('Role_User', 3)->get();
        return view('adminscreens.ViewPiaList',compact('data'));
    }

    public function viewpia_progress_detail(Request $resp)
    {
        //$id=Crypt::decryptString($resp->stid); die;
        $stidd = Crypt::decryptString($resp->stid);
       //DB::enableQueryLog();
        if($resp->ctg!=null){
            switch ($resp->ctg) {
                case 0:
                    $cond = 'CPA';
                  break;
                case 1:
                    $cond = 'SPA';
                  break;
                case 2:
                    $cond = 'OPA';

              }
            $data = User::select('users.*', 'st.state_name',
            DB::raw('sum(case when ap.user_id = users.id THEN 1 ELSE 0 END) as `actioncount`'),
            DB::raw('sum(case when ap.user_id = users.id THEN ap.present_status ELSE 0 END) as `progress`'),
            DB::raw('SUM(CASE WHEN ap.catagries = 1 THEN 1 ELSE 0 END) as `air`'),
            DB::raw('SUM(CASE WHEN ap.catagries = 2 THEN 1 ELSE 0 END) as `water`'),
            DB::raw('SUM(CASE WHEN ap.catagries = 3 THEN 1 ELSE 0 END) as `land`'),
            DB::raw('SUM(CASE WHEN ap.catagries = 4 THEN 1 ELSE 0 END) as `pre_post`'),
            DB::raw('SUM(CASE WHEN ap.catagries = 5 THEN 1 ELSE 0 END) as `other`'))
            ->leftJoin('action_plans AS ap', 'ap.user_id', '=', 'users.id')
            ->leftJoin('states AS st', 'st.id', '=', 'users.state_id')
            ->where('state_id', $stidd)->where('catagries_of_PIA','=', $cond)
            ->where('Role_User', 3)->groupBy('users.PIAName')->get();
            return view('adminscreens.viepiaprogressdetail',compact('data'));
        }
        $data = User::select('users.*','st.state_name',
        DB::raw('sum(case when ap.user_id = users.id THEN 1 ELSE 0 END) as `actioncount`'),
        DB::raw('sum(case when ap.user_id = users.id THEN ap.present_status ELSE 0 END) as `progress`'),
        DB::raw('SUM(CASE WHEN ap.catagries = 1 THEN 1 ELSE 0 END) as `air`'),
        DB::raw('SUM(CASE WHEN ap.catagries = 2 THEN 1 ELSE 0 END) as `water`'),
        DB::raw('SUM(CASE WHEN ap.catagries = 3 THEN 1 ELSE 0 END) as `land`'),
        DB::raw('SUM(CASE WHEN ap.catagries = 4 THEN 1 ELSE 0 END) as `pre_post`'),
        DB::raw('SUM(CASE WHEN ap.catagries = 5 THEN 1 ELSE 0 END) as `other`'))
        ->leftJoin('action_plans AS ap', 'ap.user_id', '=', 'users.id')
        ->leftJoin('states AS st', 'st.id', '=', 'users.state_id')
        ->where('state_id', $stidd)->where('Role_User', 3)->groupBy('users.PIAName')->get();
   
        return view('adminscreens.viepiaprogressdetail',compact('data'));
    }

    public function view_CPA_list($id)
    {
       $data = User:: where('state_id', $id)->where('catagries_of_PIA','=','CPA')->get();
        return view('adminscreens.ViewCPAList',compact('data'));
    }

    public function view_SPA_list($id)
    {
       $data = User:: where('state_id', $id)->where('catagries_of_PIA','=','SPA')->get();
        return view('adminscreens.ViewSPAList',compact('data'));
    }

    public function view_OPA_list($id)
    {
       $data = User:: where('state_id', $id)->where('catagries_of_PIA','=','OPA')->get();
        return view('adminscreens.ViewOPAList',compact('data'));
    }
        //start
    public function view_Water_list($id)
    {
        //DB::enableQueryLog();
        $fetchData = DB::select("SELECT u.PIAName,
        SUM(CASE WHEN ap.catagries = 2 THEN 1 ELSE 0 END) as water,
        SUM(CASE WHEN ap.catagries = 1 THEN 1 ELSE 0 END) as air,
        SUM(CASE WHEN ap.catagries = 3 THEN 1 ELSE 0 END) as land,
        SUM(CASE WHEN ap.catagries = 5 THEN 1 ELSE 0 END) as other,
        SUM(CASE WHEN ap.catagries = 4 THEN 1 ELSE 0 END) as pre_post
        FROM `action_plans` as ap
        JOIN users as u on u.id = ap.user_id where ap.state=$id
        GROUP BY u.PIAName");
        //dd(DB::getQueryLog());
        $data = Action_Plan:: where('state', $id)->where('catagries','=',2)->get();
        return view('userscreens.ViewWaterList',compact('data','fetchData'));
    }

    //master action points for state dashboard qry
    public function category_action_points(Request $req){
       
        $state_id = Auth::user()->state_id;
        $role = Auth::user()->Role_User;
        $cond ="";
        $st_id= "'".$state_id."'";
       
        if(!empty($state_id) && !empty($req->_tcount))
        {
            $cond = 'ap.state = '.$st_id.' AND ap.user_id='.$req->_id;
        }
       elseif(!empty($state_id) && !empty($req->_water))
        {
            $cond = 'ap.state = '.$st_id.' AND ap.user_id='.$req->_id.' AND ap.catagries=2';
        }
        elseif(!empty($state_id) && !empty($req->_air))
        {
            $cond = 'ap.state = '.$st_id.' AND ap.user_id='.$req->_id.' AND ap.catagries=1';
        }
        elseif(!empty($state_id) && !empty($req->_land))
        {
            $cond = 'ap.state = '.$st_id.' AND ap.user_id='.$req->_id.' AND ap.catagries=3';
        }
        elseif(!empty($state_id) && !empty($req->_pre_post))
        {
            $cond = 'ap.state = '.$st_id.' AND ap.user_id='.$req->_id.' AND ap.catagries=4';
        }
        elseif(!empty($state_id) && !empty($req->_other))
        {
            $cond = 'ap.state = '.$st_id.' AND ap.user_id='.$req->_id.' AND ap.catagries=5';
        }              
       else{
            $cond = 'ap.state = '.$st_id;
       }

       if($role == 2)
       {
         // DB::enableQueryLog();  
         $fetchData = DB::select("SELECT distinct(ap.user_id) as user_id, u.PIAName, ap.catagries  as catagries, ap.action_point as action_point,
          ap.responsible_ageancy as responsible_ageancy, ap.timeline as timeline, ap.financial_requirement as financial_requirement,
           ap.present_status as present_status, ap.created_at as created_at, ap.updated_at as updated_at 
           FROM `action_plans` as ap  JOIN users as u on u.id = ap.user_id
          WHERE $cond");
        return view('userscreens.viewcategoryactions',compact('fetchData'));
       }
    }

    //master action points for CPCB dashboard qry
    public function cpcbadmin_action_points(Request $req){

        $role = Auth::user()->Role_User;
        $cond ="";
        $st_id= "'".$req->stid."'";

        if(!empty($req->stid) && !empty($req->_tcount))
        {
            $cond = 'ap.state = '.$st_id;
        }
        elseif(!empty($req->stid) && !empty($req->_water))
        {
            $cond = 'ap.state = '.$st_id.' AND ap.catagries=2';
        }
        elseif(!empty($req->stid) && !empty($req->_air))
        {
            $cond = 'ap.state = '.$st_id.' AND ap.catagries=1';
        }
        elseif(!empty($req->stid) && !empty($req->_land))
        {
            $cond = 'ap.state = '.$st_id.' AND ap.catagries=3';
        }
        elseif(!empty($req->stid) && !empty($req->_pre_post))
        {
            $cond = 'ap.state = '.$st_id.' AND ap.catagries=4';
        }
        elseif(!empty($req->stid) && !empty($req->_other))
        {
            $cond = 'ap.state = '.$st_id.' AND ap.catagries=5';
        }              
       else{
        $cond = 'ap.state = '.$st_id;
       }

       if($role == 1)
       { 
         $fetchData = DB::select("SELECT ap.user_id, u.PIAName, st.state_name, ap.catagries  as catagries, ap.action_point as action_point,
          ap.responsible_ageancy as responsible_ageancy, ap.timeline as timeline, ap.financial_requirement as financial_requirement,
           ap.present_status as present_status, ap.created_at as created_at, ap.updated_at as updated_at 
           FROM `action_plans` as ap  JOIN users as u on u.id = ap.user_id
           JOIN states as st on st.id = ap.state WHERE $cond");
       return view('userscreens.viewcpcbactions',compact('fetchData'));
       }
    }

    //master action points for CPCB dashboard qry: progress
    public function cpcbadmin_action_points_progress(Request $req){

        $role = Auth::user()->Role_User;
        $cond ="";
        $st_id= "'".$req->pid."'";

        if(!empty($req->pid) && !empty($req->tc))
        {
            $cond = 'ap.user_id = '.$st_id;
        }
        elseif(!empty($req->pid) && !empty($req->wt))
        {
            $cond = 'ap.user_id = '.$st_id.' AND ap.catagries=2';
        }
        elseif(!empty($req->pid) && !empty($req->ar))
        {
            $cond = 'ap.user_id = '.$st_id.' AND ap.catagries=1';
        }
        elseif(!empty($req->pid) && !empty($req->ld))
        {
            $cond = 'ap.user_id = '.$st_id.' AND ap.catagries=3';
        }
        elseif(!empty($req->pid) && !empty($req->inf))
        {
            $cond = 'ap.user_id = '.$st_id.' AND ap.catagries=4';
        }
        elseif(!empty($req->pid) && !empty($req->ot))
        {
            $cond = 'ap.user_id = '.$st_id.' AND ap.catagries=5';
        }
        elseif(!empty($req->pid) && !empty($req->stc))
        {//this code for select all action point in a state
            $cond = 'ap.state = '.$st_id;
        }               
       else{
        $cond = 'ap.user_id = '.$st_id;
       }

       if($role == 1)
       { 
         $fetchData = DB::select("SELECT ap.user_id, u.PIAName, st.state_name, ctg.category_name  as catagries, ap.action_point as action_point,
          ap.responsible_ageancy as responsible_ageancy, ap.timeline as timeline, ap.financial_requirement as financial_requirement,
           ap.present_status as present_status, ap.created_at as created_at, ap.updated_at as updated_at 
           FROM `action_plans` as ap  JOIN users as u on u.id = ap.user_id
           JOIN states as st on st.id = ap.state
           JOIN categories as ctg on ctg.id = ap.catagries 
           WHERE $cond order by ctg.category_name asc");
          
         // dd($fetchData);
       return view('userscreens.viewcpcbactionsProgress',compact('fetchData'));
       }
    }



    public function view_Air_list($id)
    {
       $data = Action_Plan:: where('state', $id)->where('catagries','=','Air Environment')->get();
        return view('userscreens.ViewAirList',compact('data'));
    }

    public function view_Land_list($id)
    {
       $data = Action_Plan:: where('state', $id)->where('catagries','=','Land Environment')->get();
        return view('userscreens.ViewLandList',compact('data'));
    }

    public function view_Other_list($id)
    {
       $data = Action_Plan:: where('state', $id)->where('catagries','=','Other Infrastructure/renewal measures')->get();
        return view('userscreens.ViewOtherList',compact('data'));
    }

    public function view_Pre_Post_list($id)
    {
       $data = Action_Plan:: where('state', $id)->where('catagries','=','Pre monsoon/post monsoon CEPI monitoring')->get();
        return view('userscreens.ViewPre_PostList',compact('data'));
    }

    //end

    public function view_Admin_PIAdata()
    {
        $data = User::where('id', '=', Auth::user()->id)->first();
        $condition = $data->state_id;
        $fetch = Action_Plan::where('user_id', '=', Auth::user()->id)->get();
        //$state_name = State::where('id', '=', $condition)->first();
        $fetchData = '';
        if($data->Role_User === 1){ 
         
            $fetchData = DB::select("SELECT st.state_name,st.id, u.PIAName, 
            SUM(CASE WHEN ap.catagries = 2 THEN 1 ELSE 0 END) as water,
            SUM(CASE WHEN ap.catagries = 1 THEN 1 ELSE 0 END) as air,
            SUM(CASE WHEN ap.catagries = 3 THEN 1 ELSE 0 END) as land,
            SUM(CASE WHEN ap.catagries = 4 THEN 1 ELSE 0 END) as pre_post,
            SUM(CASE WHEN ap.catagries = 5 THEN 1 ELSE 0 END) as other,
            SUM(CASE WHEN u.id = ap.user_id AND u.Role_User = 3 THEN 1 ELSE 0 END) as totalpiacount,
            SUM(CASE WHEN ap.state = st.id THEN ap.present_status ELSE 0 END) as progress
            FROM `action_plans` as ap
            JOIN states as st on st.id = ap.state
            JOIN users as u on u.id = ap.user_id
            GROUP BY st.state_name");
        return view('userscreens.ViewAdminPIADatas' , ['data' => $data, 'fetchData'=>$fetchData, 'fetch'=>$fetch]);
        
        }
       
        if($data->Role_User === 2){ 
       
        $fetchData = DB::select("SELECT u.PIAName,ap.user_id,
        SUM(CASE WHEN ap.catagries = 2 THEN 1 ELSE 0 END) as water,
        SUM(CASE WHEN ap.catagries = 1 THEN 1 ELSE 0 END) as air,
        SUM(CASE WHEN ap.catagries = 3 THEN 1 ELSE 0 END) as land,
        SUM(CASE WHEN ap.catagries = 4 THEN 1 ELSE 0 END) as pre_post,
        SUM(CASE WHEN ap.catagries = 5 THEN 1 ELSE 0 END) as other,
        count(u.PIAName) as totalpiacount
        FROM `action_plans` as ap
        JOIN users as u on u.id = ap.user_id where ap.state = $condition
        GROUP BY u.PIAName");
       return view('userscreens.ViewstatePiaData' , ['fetchData'=>$fetchData]);
      }
      
    }

    public function view_state_iareaList()
    {
        $data = User::where('id', '=', Auth::user()->id)->first();
       
        $fetchData = DB::select("SELECT u.iarea,
        SUM(CASE WHEN ap.catagries = 2 THEN 1 ELSE 0 END) as water,
        SUM(CASE WHEN ap.catagries = 1 THEN 1 ELSE 0 END) as air,
        SUM(CASE WHEN ap.catagries = 3 THEN 1 ELSE 0 END) as land,
        SUM(CASE WHEN ap.catagries = 4 THEN 1 ELSE 0 END) as other,
        SUM(CASE WHEN ap.catagries = 5 THEN 1 ELSE 0 END) as pre_post,
        count(u.iarea) as totalpiacount
        FROM `action_plans` as ap
        JOIN iaera_users as u on u.id = ap.iarea_id where ap.state = $data->state_id
        GROUP BY u.iarea");
       
      
      return view('userscreens.ViewstatePiaData' , ['fetchData'=>$fetchData]);
    }

    //View admin cpcb all monitoring report
    public function view_monitoringReport(Request $req)
    {
      
        $data = User::where('id', '=', Auth::user()->id)->first();
        if($data->Role_User === 1){
            if($req->unq == 'cpcb'){
                $fetchData = MonitoringReport::select('monitoringreports.*','states.state_name','users.PIAName')
                ->join('states', 'states.id', '=', 'monitoringreports.state_id')
                ->leftJoin('users', 'users.id', '=', 'monitoringreports.pia_id')
                ->where('monitoringreports.Role_User','=',1)->orderBy('states.state_name')->get();
            }else{
                 $fetchData = MonitoringReport::select('monitoringreports.*','states.state_name','users.PIAName')
                ->join('states', 'states.id', '=', 'monitoringreports.state_id')
                ->leftJoin('users', 'users.id', '=', 'monitoringreports.pia_id')->orderBy('states.state_name')->get();
            }
        }
        elseif($data->Role_User === 2){
            $fetchData = MonitoringReport::select('monitoringreports.*','states.state_name','users.PIAName')
                ->join('states', 'states.id', '=', 'monitoringreports.state_id')
                ->leftJoin('users', 'users.id', '=', 'monitoringreports.pia_id')
                ->where('monitoringreports.state_id', '=', $data->state_id)->get();
            //$fetchData = MonitoringReport::where('state_id', '=', $data->state_id)->get();
        }else{
            $fetchData = MonitoringReport::select('monitoringreports.*','states.state_name','users.PIAName')
            ->join('states', 'states.id', '=', 'monitoringreports.state_id')
            ->leftJoin('users', 'users.id', '=', 'monitoringreports.pia_id')
            ->where('monitoringreports.pia_id', '=', $data->id)->get();
            //$fetchData = MonitoringReport::where('state_id', '=', $data->state_id)->get();
        }
       
             
      return view('userscreens.viewMonitoringReport' , ['data' => $data, 'fetchData'=>$fetchData]);
    }
  

    // code by arun start 
    public function addnewstate( Request $req)
    {
        $req->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobile' => 'required|digits:10',
        ]);

        $userPIA = new User;
        $userPIA->UserType = "State";
        $userPIA->email = $req->input('email');
        $userPIA->firstname = $req->input('firstname');
        $userPIA->lastname = $req->input('lastname');
        $userPIA->address = $req->input('address');
        $userPIA->mobile = $req->input('mobile');
        $userPIA->state_id = $req->input('state_id');
        $userPIA->Role_User = $req->input('Role_User');
        $userPIA->password = Hash::make($req->input('password'));
        $userPIA->save();
        return redirect()->route('viewState');
    }
    // end here

    public function addPIAs()
    {
        $userId = auth()->user()->id;
        return view('userscreens.AddnewPIA',compact('userId'));
    }

    public function InsertPIAsName(Request $req)
    {
        //dd($req->all());
       $userId = $req->input('user_id');
       $PIAName = $req->input('PIA_name');
       $Role_User = $req->input('Role_User'); 
       $fetchData = user::where('id', $userId)->first();
       
       $addPIA = new PIA_list;
       $addPIA->user_id = $userId;
       $addPIA->name = $PIAName;
       $addPIA->Role_User = $Role_User;
       $addPIA->state_id = $fetchData->state_id;
       $insert = $addPIA->save();
       if($insert == true)
       {
        return redirect()->route('registerPIA');
       } 
    }

  
    public function editRegPIAs(Request $req)
    {
        
        $userid = $req->input('pia_id'); 
        $result = DB::table('users as u')
        ->select('u.PIAName', 'u.id', 'u.firstname', 'u.lastname', 'u.address', 'u.mobile', 'u.email', 'u.catagries_of_PIA', 'u.lat', 'u.long', 'u.kmlfile')
        ->where('u.id', $userid)->first();
       // dd($result);
        return view('auth.viewregisteredPIAs', ['result' => $result]);

    }

    public function editActionPlan(Request $req)
    {
        $apid = $req->input('aplan_id'); 
        $data = DB::table('action_plans as ap')
        ->select('ap.id','ap.state','ap.user_id','ap.financial_year', 'ap.catagries', 'ap.remark', 'ap.action_point', 'ap.responsible_ageancy', 'ap.timeline', 
        'ap.financial_requirement','ap.present_status','ap.other_des')
        ->where('ap.id', $apid)->first();

        //$data = User::where('id', '=', Auth::user()->id)->first();
        //$fetch = Action_Plan::where('user_id', '=', Auth::user()->id)->get();
        $categ = Category::all();
       /* $fetch = Action_Plan::select('action_plans.*','states.state_name', 'categories.category_name')->join('states', 'states.id', '=', 'action_plans.state')
        ->join('categories', 'categories.id', '=', 'action_plans.catagries')
        ->where('action_plans.user_id', '=', Auth::user()->id)->get();
       */
       // dd($data);
        return view('userscreens.editActionplan', ['data' => $data, 'categ'=>$categ]);
    }

    public function updateActionPlan_(Request $req)
    {   
        $appid = $req->input('actionplan_id');

        $action_plan = Action_Plan::find($appid);
        $action_plan->financial_year = $req->input('financial_year');
        $action_plan->catagries = $req->input('catagries');
        $action_plan->action_point = $req->input('action_point');
        $action_plan->responsible_ageancy = $req->input('responsible_ageancy');
        $action_plan->timeline = $req->input('timeline');
        $action_plan->financial_requirement = $req->input('financial_requirement');
        $action_plan->present_status = $req->input('present_status');
        $action_plan->user_id = $req->input('user_id');
        $action_plan->state = $req->input('state');
        $action_plan->remark = $req->input('remark');
        if($req->input('catagries')==5){
        $action_plan->other_des = $req->input('other_des');
        }
        //dd($action_plan);
        $action_plan->save();
        return redirect()->route('viewPIAdata');
    }
    public function updateProgress_save(Request $req)
    {  // echo "200"; die;
        $appid = $req->input('aplan_updt_id');
        $action_plan = Action_Plan::find($appid);
        $action_plan->present_status = $req->input('select_status'); 
        //dd($action_plan);
        $action_plan->save();
        return redirect()->route('viewPIAdata');

    }

    public function upadteRegPIA(Request $req)
    {
        $id = $req->input('hidden_id');
        $userPIA = User::find($id);
        $userPIA->email = $req->input('email');
        $userPIA->firstname = $req->input('firstname');
        $userPIA->lastname = $req->input('lastname');
        $userPIA->address = $req->input('address');
        $userPIA->catagries_of_PIA = $req->input('catagries_of_PIA');
        $userPIA->mobile = $req->input('mobile');
        $userPIA->PIAName = $req->input('pia_name');
        $userPIA->lat = $req->input('lat');
        $userPIA->long = $req->input('long');

        if ($files = $req->file('kmlfile')) {

            $destinationPath = 'upload/kml_file/'; // upload path
            $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profilefile);
            $userPIA->kmlfile = "$profilefile";
          }

        $update = $userPIA->save();

        if($update == true)
        {
            $state_id = Auth::user()->state_id;   
            //$data = User::where('state_id' , $state_id)->where('userType' , 'PIA')->get();
            $data = DB::select(" SELECT u.PIAName, u.id, u.firstname, u.lastname, u.address, u.mobile, u.email, u.catagries_of_PIA, u.lat, u.long, u.kmlfile
            FROM `users` as u where u.state_id = $state_id AND u.Role_User=3 ");
        
            return view('auth.viewregisterPIAs' , ['data' => $data]);
        }


    }

    public function view_Monitoring_Report()
    {
        $data = State::all();
        return view('adminscreens.viewMonitoringReport' , ['data' => $data]);
    }

    public function cpcbaction_remark ()
    {
        $data = State::all();
        return view('adminscreens.cpcbremarksonActionPlans' , ['data' => $data]);
    }

    public function fetchPiaList(Request $req)
    {
        $pialist = User::where('state_id',$req->id)->where('userType','PIA')->get();
        if(!count($pialist)) {
            $pialist1 = array (array('id'=>0, 'PIAName'=> 'No PIA Found!'));
          }else{
            $pialist1 = $pialist;
          }
          return response()->json($pialist1);
    }
    

    public function upload_Monitoring_Report(Request $req)
    {
        $update = new  MonitoringReport;

        if($req->input('Role_User')==3){
            //'state_id' => ['required|numeric|min:0|not_in:0']
            $req->validate([
                'state_id' => 'required|numeric|min:0|not_in:0',
                'pia_id' => 'required|numeric|min:1|not_in:0',
                'epi_air' => ['required'],
                'epi_water' => ['required'],
                'epi_land' => ['required']
            ]);
            $update->Role_User =$req->input('Role_User');
            $update->pia_id =$req->input('pia_id');
        }
        if($req->input('Role_User')==1){
            //'state_id' => ['required|numeric|min:0|not_in:0']
            $req->validate([
                'state_id' => 'required|numeric|min:0|not_in:0',
                'pia_id' => 'required|numeric|min:1|not_in:0',
                'epi_air' => ['required'],
                'epi_water' => ['required'],
                'epi_land' => ['required']
            ]);

            $update->Role_User =$req->input('Role_User');
            $update->pia_id =$req->input('pia_id');
            $update->state_id =$req->input('state_id');
            $update->epi_air =$req->input('epi_air');
            $update->epi_water =$req->input('epi_water');
            $update->epi_land =$req->input('epi_land');
            $update->remark =$req->input('remark');
            $update->report_type ='CPCB-2018';
            $update->month ='January';
            $update->year ='2018';
        }
        
       
        
        
        

        if ($files = $req->file('report')) {

            $destinationPath = 'upload/monitoringReport/'; // upload path
            $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profilefile);
            $update->report = "$profilefile";
          }
        //   dd($req->file('report'));
         $update->save();

         return redirect()->route('viewMonitoringReport')->with("message","Data Successfully Added.");
    }  

    //cpcb remark on action plans
    public function cpcbremarks_onaction_plan(Request $req)
    {
        //'state_id' => ['required|numeric|min:0|not_in:0']
        $req->validate([
            'state_id' => 'required|numeric|min:0|not_in:0',
            'pia_id' => 'required|numeric|min:1|not_in:0',
            'remarkletter' => 'required'
 
        ]);
       
        $update = new  Cpcbactionremark;
        //$update->Role_User =$req->input('Role_User');
        $update->state_id =$req->input('state_id');
        $update->pia_id =$req->input('pia_id');
        $update->remark =$req->input('remark');


        if ($files = $req->file('remarkletter')) {

            $destinationPath = 'upload/cpcbremarkletter/'; // upload path
            $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profilefile);
            $update->letter = "$profilefile";
          }
        //   dd($req->file('report'));
         $update->save();

         return redirect()->route('cpcbremark')->with("message","Data Successfully Added.");
    } 
     
}
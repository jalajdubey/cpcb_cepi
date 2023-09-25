<?php

namespace App\Http\Controllers;
use App\Models\TeamNumbers;
use App\Models\categorie;
use App\Models\Component_subcategories;
use App\Models\ComponentwiseReportDetails;
use App\Models\ComponentwiseStateReport;
use App\Models\RegsiterTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class TeamController extends Controller
{
    //
    public function index()
    {
        $data = RegsiterTeam::all();

        return view("cpcbteams.teamlist", ["data" => $data]);
    }

    public function AddNewTeam()
    {
        $data = TeamNumbers::where("registered", 0)->get();
        return view("cpcbteams.AddNewTeam", ["data" => $data]);
    }

    public function RegTeam(Request $req)
    {
        $firstname = $req->input("firstname");
        $lastname = $req->input("lastname");
        $teamNo = $req->input("teamNo");

        $register = new RegsiterTeam();

        $register->TeamCode = $this->generateCouponCode();
        $register->TeamNo = $teamNo;
        $register->FirstName = $firstname;
        $register->LastName = $lastname;

        $updateTeamStatus = TeamNumbers::find($teamNo);
        $updateTeamStatus->registered = 1;

        $updateteam = $updateTeamStatus->save();

        $insert = $register->save();

        if ($insert == true && $updateteam == true) {
            $data = RegsiterTeam::all();

            return view("cpcbteams.teamlist", ["data" => $data]);
        }
    }

    public function viewlistPIAs()
    {
       
        $data = DB::select("SELECT count(*) as totalpia,
        SUM(CASE WHEN u.catagries_of_PIA = 'CPA' THEN 1 ELSE 0 END) as cpa,
        SUM(CASE WHEN u.catagries_of_PIA = 'SPA' THEN 1 ELSE 0 END) as spa,
        SUM(CASE WHEN u.catagries_of_PIA = 'OPA' THEN 1 ELSE 0 END) as opa
        FROM `users` as u 
        JOIN states as st on st.id = u.state_id
        WHERE u.Role_User = 3");

        //echo "<pre>";
        //print_r($data);die;
        return view('auth.login', ['piacount' => array_shift($data)]);

    }

    //   public function LoginPageView()
    //   {
    //    return view('cpcbteams.Dashboard');
    //   }

    public function Login(Request $req)
    {
        //dd($req->all());die;
        $teamno = $req->input("team_no");
        $teamcode = $req->input("teamcode");
        $wordlist = RegsiterTeam::where("TeamCode", "<=", $teamcode)
            ->where("TeamNo", "<=", $teamno)
            ->get();
        $wordCount = $wordlist->count();

        if ($wordCount > 0) {
            $data = RegsiterTeam::where("TeamCode", $teamcode)->first();

            return view("cpcbteams.Dashboard", ["data" => $data]);
        } else {
            return view("cpcbteams.errorlogin");
        }
    }

    function generateCouponCode($length = 6)
    {
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $ret = "";
        for ($i = 0; $i < $length; ++$i) {
            $random = str_shuffle($chars);
            $ret .= $random[0];
        }
        return $ret;
    }

    public function showAllReport()
    {
        return view("cpcbteams.report");
    }

    public function showReport()
    {
        return view("cpcbteams.addReport");
    }
    //code add by abhishek

    public function AddReportForm(Request $req)
    {
        $no = $req->no;
        // $no_of_entities_visited=$req->no_of_entities_visited;

        $finalArray = [];

        for ($no = 0; $no < 8; $no++) {
            $finalArray = [
                "user_id" => Auth::id(),
                "team_no" => $req->team_no,
                "date_of_inspection" => $req->date_of_inspection,
                "team_members" => $req->team_members,
                "district_covered" => $req->district_covered,

                "no_of_entities_visited" => $req->no_of_entities_visited[$no],
                "no_of_violations_observed" =>
                    $req->no_of_violations_observed[$no],
                "no_of_challans_issued" => $req->no_of_challans_issued[$no],
                "qty_of_plastic_seized" => $req->qty_of_plastic_seized[$no],
                "amount_of_fine" => $req->amount_of_fine[$no],
                "detail_of_sup_level1" => $req->detail_of_sup_level1[$no],
                "detail_of_sup_level2" => $req->detail_of_sup_level2[$no],
                "detail_of_sup_level3" => $req->detail_of_sup_level3[$no],
            ];

            ComponentwiseReportDetails::insert($finalArray);
        }
        return redirect()->back();
    }

    public function showStateReport()
    {
        return view("cpcbteams.addStateReport");
    }

    public function addStateReportForm(Request $req)
    {
        $no = $req->no;
        $no_of_entities_visited = $req->no_of_entities_visited;

        $finalArray = [];

        for ($no = 0; $no < 8; $no++) {
            $finalArray = [
                "team_no" => $req->team_no,
                "date_of_inspection" => $req->date_of_inspection,
                "team_members" => $req->team_members,
                "district_covered" => $req->district_covered,
                "no_of_entities_visited" => $req->no_of_entities_visited[$no],
                "no_of_violations_observed" => $req->no_of_violations_observed[$no],
                "no_of_challans_issued" => $req->no_of_challans_issued[$no],
                "qty_of_plastic_seized" => $req->qty_of_plastic_seized[$no],
                "amount_of_fine" => $req->amount_of_fine[$no],
                "detail_of_sup_level1" => $req->detail_of_sup_level1[$no],
                "detail_of_sup_level2" => $req->detail_of_sup_level2[$no],
                "detail_of_sup_level3" => $req->detail_of_sup_level3[$no]
            ];

            ComponentwiseStateReport::insert($finalArray);
        }
        return redirect()->back();
        // return view('cpcbteams.addstateReport');
    }

    public function cepiloginfrm()
    {
      // $dataCountCPA = User::where("catagries_of_PIA",'=','CPA')->COUNT();
        return view("cepi.cepilogin");
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CollectionController;
/*Route::get('/', function () {
    return view('auth.login');
})->name('landing');
*/
Route::get('/', [TeamController::class, 'viewlistPIAs'])->name('landing');

Route::get('/maps', function () {
    return view('auth.maps');
});
Route::get('/teamlogin', function () {
    return view('cpcbteams.login');
})->name('TeamLogin');

Route::get('/register', [HomeController::class, 'fetchstates'])->name('register');
Route::get('/send-email', [MailController::class, 'sendEmail']);
Route::get('/TeamLogin' , [TeamController::class, 'Login'])->name('loginPost');
Route::post('/TeamLogin' , [TeamController::class, 'Login'])->name('LoginPost');
Route::any('cepilogin', [TeamController::class, 'cepiloginfrm'])->name('cepilogin');



Route::middleware('auth')->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home'); //done
    Route::get('/viewstate' , [HomeController::class, 'viewStateList'])->name('viewState'); //done
    
    Route::post('/registerPIAuser' , [HomeController::class, 'insertPIARegsiter'])->name('registerPIAuser'); //done
    Route::any('/actionplan' , [HomeController::class, 'addActionPlan'])->name('addActionPlan'); 
    Route::any('/updateactionplan' , [HomeController::class, 'updateActionPlan_'])->name('updateActionPlan'); 
    Route::post('/insertchecklist' , [HomeController::class, 'insertchecklist'])->name('insertchecklist');
    Route::get('/detailscheck/{id}' , [HomeController::class, 'detailschecklist'])->name('checklist.inbox.detail.id');
    Route::get('/viewulForm' , [HomeController::class, 'ViewPIAForm'])->name('PIAdata'); //done
    Route::post('/InsertPIA' , [HomeController::class, 'AddPIAData'])->name('Insert.PIA'); 
    Route::get('/viewPIAdata' , [HomeController::class, 'ViewPIAData'])->name('viewPIAdata'); //done 
    Route::get('/vwstactions' , [HomeController::class, 'view_Admin_PIAdata'])->name('viewAdminPIAdata'); //done 
    Route::get('/vwstactpoints' , [HomeController::class, 'view_state_iareaList'])->name('state_actionPoints'); //done 
    Route::get('/viewmreport' , [HomeController::class, 'view_monitoringReport'])->name('view_M_Report'); //done 

    Route::get('/actionreport' , [HomeController::class, 'showActionReportPlan'])->name('showactionreport'); //done  
   // Route::get('/actionreport' , [HomeController::class, 'showActionReportPlan'])->name('actionreport'); //done 
    Route::post('/uploadAction_Report' , [HomeController::class, 'upload_Action_Plan'])->name('uploadActionReport'); //done
    Route::get('/viewactionreport' , [HomeController::class, 'vie_Action_Report'])->name('viewactionreport'); //done 
    Route::get('/deletedata/{id}' , [HomeController::class,'deleteActionPlanData'])->name('deletedata'); //done

    Route::post('/deleteEntity' , [HomeController::class, 'DeleteEntity'])->name('deleteentity');
    Route::post('/enableinspection', [HomeController::class, 'EnableInspection'] )->name('enableinspection');
    Route::post('/ViewAdminPIA', [HomeController::class, 'ViewPIAAdminDetails'])->name('ViewPIAAdminDetails');
    Route::get('/ViewRegisteredPIA', [HomeController::class, 'fetchRegisteredPIA'])->name('ViewRegisteredPIA'); //done
    Route::get('/ViewpiaProgress', [HomeController::class, 'view_piaprogress_status'])->name('ViewpiaProgressAction'); //done
    Route::Post('/getsubcategorise' ,[HomeController::class, 'getSubcategory'])->name('getsubcategories');
    Route::get('export', [HomeController::class, 'export'])->name('export');
    Route::get('registerfieldofficers' , [HomeController::class, 'registerfieldofficer'])->name('registerfo');
    Route::post('addfieldofficer' , [HomeController::class, 'addfielduser'])->name('addfieldofficer');
    Route::get('viewregfieldofficer' , [HomeController::class, 'viewregisteredfield'])->name('viewregofficer');
    Route::get('allotentity' , [HomeController::class, 'allotentities'])->name('allotent');
    Route::post('/updateallot' , [HomeController::class, 'updatealot'])->name('updateallot');
    Route::get('/viewallot' , [HomeController::class, 'viewallotentities'])->name('viewallotent');
    Route::post('/remove' , [HomeController::class, 'removeallotments'])->name('removeallot');

    Route::get('addstate' , [HomeController::class, 'addstates'])->name('addstate'); //done
    Route::get('viewpialist/{id}' , [HomeController::class, 'view_Pia_list'])->name('viewpialist'); //done
    Route::get('/piaprogressdtil' , [HomeController::class, 'viewpia_progress_detail'])->name('viewpiaprogressdtil'); //done
   
    Route::get('viewcpalist/{id}' , [HomeController::class, 'view_CPA_list'])->name('viewcpalist'); //done
    Route::get('viewspalist/{id}' , [HomeController::class, 'view_SPA_list'])->name('viewspalist'); //done
    Route::get('viewopalist/{id}' , [HomeController::class, 'view_OPA_list'])->name('viewopalist'); //done

    Route::get('/categactions' , [HomeController::class, 'category_action_points'])->name('categactionpoints'); //done
    Route::get('/cpcbactions' , [HomeController::class, 'cpcbadmin_action_points'])->name('cpcbactionpoints'); //done
    Route::get('/cpcbactionsprgs' , [HomeController::class, 'cpcbadmin_action_points_progress'])->name('cpcbactionpoints_progress'); //done

    Route::get('viewwaterlist/{id}' , [HomeController::class, 'view_Water_list'])->name('viewwaterlist'); //done
    Route::get('viewairlist/{id}' , [HomeController::class, 'view_Air_list'])->name('viewairlist'); //done
    Route::get('viewlandlist/{id}' , [HomeController::class, 'view_Land_list'])->name('viewlandlist'); //done
    Route::get('viewotherlist/{id}' , [HomeController::class, 'view_Other_list'])->name('viewotherlist'); //done
    Route::get('viewpre_postlist/{id}' , [HomeController::class, 'view_Pre_Post_list'])->name('viewpre_postlist'); //done

    Route::post('addnewstate' , [HomeController::class, 'addnewstate'])->name('regnewstate'); //done
    Route::get('addnewPIA', [HomeController::class, 'addPIAs'])->name('addnewPIA'); //done
    Route::post('insertPIAname', [HomeController::class, 'InsertPIAsName'])->name('insertPIAName'); //done
    Route::post('viewfieldreports', [HomeController::class, 'ViewFieldReports'])->name('viewfieldreport');
    Route::get('/registerPIAs', [HomeController::class, 'RegisterPIAs'])->name('registerPIA'); //done
    Route::get('/viewPIAs',[HomeController::class, 'viewlistPIAs'])->name('PIAList'); //done
    Route::post('entinspectioncomplete' , [HomeController::class, 'fetchentinspections'])->name('ViewFieldInspections');
    Route::post('editPIAs' , [HomeController::class, 'editRegPIAs'])->name('EditPIAs'); //done
    Route::post('editactionplan' , [HomeController::class, 'editActionPlan'])->name('EditActionPlan'); //done
    Route::post('uprogress' , [HomeController::class, 'updateProgress_save'])->name('updateProgress'); //done
    Route::post('updatePIAs' , [HomeController::class, 'upadteRegPIA'])->name('updateregisterPIAuser'); //done
    Route::post('updateStates' , [HomeController::class, 'upadteRegState'])->name('updateregisterstateuser');
    Route::post('ViewInspections' , [HomeController::class, 'ViewPIAFieldReports'])->name('ViewField');
    Route::post('AddAction' , [HomeController::class, 'AddActionTakenReport'])->name('AddATR');
    Route::post('PostActionTaken' , [HomeController::class, 'uploadActionTaken'])->name('PostATR');
    Route::get('FileDailyReport' , [HomeController::class , 'FileDailyReport'])->name('addDailyReport');
    Route::post('UploadDailyReport' , [HomeController::class , 'PostDailyReport'])->name('postdailyreport');
    Route::post('ViewDetailDaily' , [HomeController::class, 'viewDetailReports'])->name('viewDetailDailyReport');
    Route::get ('ComplaintForm' , [HomeController::class , 'addcomplaintform'])->name('addComplaints');
    Route::post('AddComplaints' , [HomeController::class , 'PostComplaint'])->name('addComplaint');
    Route::get('fetchComplaints' , [HomeController::class , 'listComplaints'])->name('viewComplaints');
    Route::post('viewComplaintDetails' , [HomeController::class, 'viewcomplaintdetails'])->name('viewComplaintDetails');
    Route::post('AddPIAEntity' , [HomeController::class, 'linkentcomplaint'])->name('addentcomplaint');
    Route::post('UpdateEntity' , [HomeController::class, 'addenttocomplaint'])->name('updatecomplaint');
    Route::post('/viewdetails' , [HomeController::class, 'ViewEntDetails'])->name('ViewEntDetails');
    Route::post('/complaintaction' , [HomeController::class , 'ComplaintAction'])->name('uploadcomplaintActionTaken');
    Route::post('/postreports' , [HomeController::class, 'SearchDAILY'])->name('SearchReports');
    Route::get('/addentity' , [HomeController::class, 'AddStateEntities'])->name('AddStateEntity');
    Route::post('/insertentity' , [HomeController::class, 'InsertEntities'])->name('InsertEntity');
    Route::get('/statessummary' , [HomeController::class, 'FetchStates'])->name('AddRegionalofficers');
    Route::post('/stateslists' , [HomeController::class, 'StatesListing'])->name('ViewStateList');
    Route::post('/edituser' , [HomeController::class, 'EditUser'])->name('EditUser');
    Route::post('/updateUsers', [HomeController::class , 'UpdateUsers'])->name('UpdateUser');
    Route::get('/viewRoReports' , [HomeController::class, 'viewRoFiledReports'])->name('viewRoReports');
    Route::any('/editstate' , [HomeController::class, 'editstateuser'])->name('editstateprofile');
    Route::post('/editfieldPIA' , [HomeController::class, 'editfieldprofiles'])->name('editfieldprofile');
    Route::post('/updatefield' , [HomeController::class, 'UpdateFieldUser'])->name('EditFieldUser');
    Route::get('/editdailyreports', [HomeController::class, 'EditDailyReports'])->name('editDailyReport');
    Route::post('/editdetaildaily' , [HomeController::class , 'EditDetailDaily'])->name('editDetailDailyReport');
    Route::post('/updatedaily' , [HomeController::class , 'UpdateDailyReport'])->name('updatedailyreport'); 
    Route::get('/viewstateprofile',[HomeController::class, 'viewStateProfiles'])->name('viewprofile');
    
    Route::get('/viewMonitoringReport',[HomeController::class, 'view_Monitoring_Report'])->name('viewMonitoringReport'); //done
    Route::post('/cpcbremarksbmt',[HomeController::class, 'cpcbremarks_onaction_plan'])->name('createcpcb_remarkon_actionplan'); //remark
    Route::get('/cpcbremark',[HomeController::class, 'cpcbaction_remark'])->name('cpcbremark'); //remark
    Route::post('/getPiaList', [HomeController::class, 'fetchPiaList'])->name('fetchPiaList');

    Route::post('/uploadMonitoringReport',[HomeController::class, 'upload_Monitoring_Report'])->name('uploadMonitoringReport'); //done
});   

Auth::routes();
<?php

namespace App\Http\Controllers;
use App\Models\tbl_state;
use App\Models\ulb_list;
use App\Models\User;
use App\Models\Inspection;
use App\Models\Fieldofficer;
use App\Models\statechecklist;
use App\Models\entity;
use App\Models\DailyReport;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{

    public function login(Request $req)
    {
         //$user = find($id, ['name', 'surname']);
         
          $user = Fieldofficer::where('officeremail', $req->email)->first();
        // echo $user->officeremail;
         //die;
         
         if(!$user || !Hash::check($req->password,$user->password))
         {
             $data = [
                 "code" => 'Failed'
                 ];
             return $data;
         }
         
         $data = [
             "email" => $user['officeremail'] ,
             "id" => $user['id'],
             "name" => $user['officername'],
             "added_by"=>$user['added_by'],
             "code"=>"success"
             ];
     
 
         return $data ; 

    }
    
    public function cpcblogin(Request $req)
    {
         //$user = find($id, ['name', 'surname']);
         
          $user = User::where('email', $req->email)->first();
        // echo $user->officeremail;
         //die;
         
         if(!$user || !Hash::check($req->password,$user->password))
         {
             $data = [
                 "code" => 'Failed'
                 ];
             return $data;
         }
         
         $data = [
             "email" => $user['email'] ,
             "id" => $user['id'],
             "name" => $user['firstname'],
             "Type" => $user['userType'],
             "added_by"=>'0',
             "code"=>"success"
             ];
     
 
         return $data ; 

    }
    
    //
    
  public function  getstatewisesummary(Request $req)
  {
      $type = $req->input('userType');
      
      if($type == 'ADMIN')
        {
      $data  = entity::select('id')
            ->groupBy('stateName')
            ->map()
            ->count();
    
        return $data;  
        }    
      
  }
    
    
public function getallentities(Request $req)
    {
         $type = $req->input('userType');
        
        if($type == 'ADMIN')
        {
        $entities = entity::select( 'id','entity_name' , 'sup_item' , 'stateName', 'districtName', 'address_contact' , 'category_name' , 'subcategory','email_id', 'InspectionStatus')->get();
        return $entities;    
        }
        if($type == 'State')
        {
         $userid = $req->input('userid');    
         $userstate = User::where('id' ,$userid)->first();  
         
        $entities = entity::select( 'id','entity_name' , 'sup_item' , 'stateName', 'districtName', 'address_contact' , 'category_name' , 'subcategory','email_id', 'InspectionStatus')->where('stateName' , $userstate->stateName)->get();
        return $entities;    
        }
        
    }
    
    public function getinspectedentities(Request $req)
    {
        $type = $req->input('userType');
        
        if($type == 'ADMIN')
        {
        $entities = entity::where('InspectionStatus' , 1)->get();
        return $entities;    
        }
        if($type == 'State')
        {
         $userid = $req->input('userid');    
         $userstate = User::where('id' ,$userid)->first();  
         
        $entities = entity::where('stateName' , $userstate->stateName)->where('InspectionStatus' , 1)->get();
        return $entities;    
        }
        
        
    }
    
    public function fetchdailyreports(Request $req)
    {
        $type = $req->input('userType');
       if($type == 'ADMIN')
        {
        $entities = DailyReport::get();
        return $entities;    
        } 
        if($type == 'State')
        {
         $userid = $req->input('userid');    
         $userstate = User::where('id' ,$userid)->first();  
         
        $entities = DailyReport::where('stateName' , $userstate->stateName)->get();
        return $entities;    
        }
    }

    public function getentities(Request $req)
    {
        $entities = entity::where('field_id' , $req->user_id)->get();
        return $entities;
        
    }
    
     public function getinspections(Request $req)
    {
        $data = Inspection::where('entity_id' , $req->eid)->get();
        
        return $data;
    }
    
    public function getuserDetails(Request $req)
    {
        $data = Fieldofficer::where('id' , $req->user_id)->first();
        
        return $data;
    }
    
     public function AddEntity(Request $req)
    {
        
        $entity = new entity;
        
        $entity->entity_name = $req->EntName;
       $entity->category_name = $req->categoryName;
        $entity->subcategory = $req->subcategory;
        $entity->sup_item = $req->SupItems;
        $entity->stateName = $req->StateName;
        $entity->districtName = $req->District;
        $entity->ward_ulb = $req->WardName;
        $entity->ulb_name = $req->ulbname;
        $entity->address_contact = $req->Address;
        $entity->email_id = $req->Email;
        $entity->gst_ulb = $req->GstNo;
        $entity->status = 1;
        $entity->field_id = $req->field_id;
        $entity->user_id = $req->user_id;
        

        $insertentity = $entity->save();

        if($insertentity == true)
        {
            return response()->json([
                'success'=> true,
                
            ]); 
        }
        else
        {
            return response()->json([
                'success'=> false,
                'req' => $req->all()
            ]);
        }



    }
    
    public function getNodalDetails(Request $req)
    {
        $data = User::where('id' , $req->user_id)->first();
        
        return $data;
    }

    public function AddInspection(Request $req)
    {
        
        $inspection = new Inspection;
        $id = $req->entity_id;
       
         $lat = $req->latitude;
        
         $long = $req->longitude;
        
        $inspection->entity_id = $req->entity_id;
        $inspection->entity_name = $req->entity_name;
        $inspection->violation_sup = $req->violation_sup;
        $inspection->inspection_date = $req->inspection_date;
        $inspection->supply_procure = $req->supply_procure;
        $inspection->reciever_name = $req->reciever_name;
        $inspection->reciever_email = $req->reciever_email;
        $inspection->reciever_address = $req->reciever_address;
        $inspection->action_taken = $req->action_taken;
        $inspection->violation_observed = $req->violation_observed;

        if ($files = $req->file('image')) {
      
            
            $destinationPath = 'upload/imageupload/'; // upload path
            $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profilefile);
            $inspection->image_upload = "$profilefile";
         }

        $insert = $inspection->save();

        if($insert == true)
        {
        
         $entity = entity::find($id);
         $entity->latitude = $lat;
         $entity->longitude = $long;
         $entity->InspectionStatus = 1;
         $updatelocation = $entity->save();
         if($updatelocation == true)
         {
            $data = ["code" => 'success'];

            return $data; 
         }
         else
         {
             $data = ["code" => 'location_error'];

            return $data;
             
         }
                
        
        }
        else
        {
            $data = ["code" => 'failed'];

            return $data;

        }
        

    }
}

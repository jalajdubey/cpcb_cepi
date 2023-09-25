<?php

  

namespace App\Exports;

  
use Auth;
use App\Models\entity;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

  

class EntityExport implements FromCollection,WithHeadings

{

    /**

    * @return \Illuminate\Support\Collection

    */
    public function headings(): array
    {
        return [
            
            'name',
            'category',
            'subcategory',
            'SUP Items',
            'state',
            'District',
            'Ward No',
            'Address',
            'Email',
            'GST No'
        ];
    }

    public function collection()

    {   
        $userid = Auth::id();
       

        if($userid == 11)
        {
            return entity::select([ "entity_name", "category_name", "subcategory" , "sup_item","stateName","districtName","ward_ulb","address_contact","email_id","gst_ulb"])->get();
        }

        return entity::select([ "entity_name", "category_name", "subcategory" , "sup_item","stateName","districtName","ward_ulb","address_contact","email_id","gst_ulb"])->where('user_id' , $userid)->get();

    }

}
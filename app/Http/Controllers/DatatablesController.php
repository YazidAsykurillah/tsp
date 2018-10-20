<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Yajra\Datatables\Datatables;

use Carbon\Carbon;

use App\Item;
class DatatablesController extends Controller
{
    //Items
    public function getItems(Request $request)
    {

        \DB::statement(\DB::raw('set @rownum=0'));
        $items = Item::select([
                \DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'items.*'
            ]);
        
        $data_items = Datatables::of($items)
        	->editColumn('description', function($items){
        		return str_limit($items->description, 20);
        	})
            ->addColumn('actions', function($items){
                    $actions_html ='<a href="'.url('item/'.$items->id.'').'" class="btn btn-primary btn-xs" title="Click to view the detail">';
                    $actions_html .=    '<i class="fa fa-external-link"></i>';
                    $actions_html .='</a>&nbsp;';
                    $actions_html .='<a href="'.url('item/'.$items->id.'/edit').'" class="btn btn-success btn-xs" title="Click to edit this item">';
                    $actions_html .=    '<i class="fa fa-edit"></i>';
                    $actions_html .='</a>&nbsp;';
                    $actions_html .='<button type="button" class="btn btn-danger btn-xs btn-delete-item" data-id="'.$items->id.'" data-text="'.$items->name.'">';
                    $actions_html .=    '<i class="fa fa-trash"></i>';
                    $actions_html .='</button>';

                    return $actions_html;
            });

        if ($keyword = $request->get('search')['value']) {
            $data_items->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $data_items->make(true);
    }
    //END Items
}

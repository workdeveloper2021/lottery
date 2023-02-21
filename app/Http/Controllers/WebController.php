<?php

namespace App\Http\Controllers;

use App\Models\Buyticket;
use Illuminate\Http\Request;
use \Milon\Barcode\DNS1D;

class WebController extends Controller
{
    
     public function demo()
    {
        return view('web.demo');
    }

    public function ajaxfortime()
    {

      echo json_encode(array(date('h'),date('i'),date('s')));
    }

    public function checkresulttt()
    {

    }

    public function checkkwinn()
    {
        
    }

    public function result_refresh()
    {

    }

      public function ajaxforrrtime()
    {
        echo 1;
    }

    public function buytickets(Request $request)
    {
       $post = $request->all();
       $result = array();
       if(!empty($post['lttrynumsss'])){
            for ($i=0; $i < count($post['lttrynumsss']) ; $i++) {  
                if($post['lttrynumsss'][$i] > 0){          
                    $data = array('pId'=>$post['lttrynumsss'][$i],'sId'=>$post['lttrynumsqntss'][$i],'tickpriceids'=>$post['tickpriceidss'],'useriddds'=>$post['useridddss']);
                    $result[] =  Buyticket::create($data);
                }
            }            

       }
       return $post['tickpriceidss'];
    }

    public function buy_reciept(Request $request)
    {
      
       $data = Buyticket::with('user')->where('tickpriceids',$request->id)->get();
       $total = Buyticket::with('user')->where('tickpriceids',$request->id)->sum('sId');
        $d = new DNS1D();
        $d->setStorPath(__DIR__.'/cache/');
        $barcode = $d->getBarcodeHTML('9780691147727', 'EAN13');
        $returnhousee = $request->returnhousee;
        return view('web.buy_reciept',compact('data','total','barcode','returnhousee'));
    }

   

}

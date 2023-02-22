<?php

namespace App\Http\Controllers;

use App\Models\Buyticket;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use \Milon\Barcode\DNS1D;
use Auth;
use Hash;
class WebController extends Controller
{
    
     public function demo()
    {

        $user = User::where('id',Auth::user()->id)->first();
        $wallet = Transaction::where('user_id',Auth::user()->id)->sum('points');
        return view('web.index',compact('user','wallet'));
    }

    public function ajaxfortime()
    {

      echo json_encode(array(date('h'),date('i'),date('s')));
    }

    public function checkresulttt()
    {
        echo '1';

    }

    public function checkkwinn()
    {
        
    }

    public function result_refresh()
    {
          $start=strtotime('00:00:00');
          $end=strtotime('23:30:00');

          for ($i=$start;$i<=$end;$i = $i + 15*60)
          {
            echo date('Y-m-d H:i:s',$i);

          }

    }

     public function cancelled_ticket()
    {

    }

     public function previous_result()
    {

    }

    public function reports(Request $request)
    {

        $data = Buyticket::where('created_at','>=',date('Y-m-d 00:00:00',strtotime($request->reportstkdtide)))->where('created_at','<=',date('Y-m-d 23:59:00',strtotime($request->reportstkdtide)))->where('useriddds',Auth::user()->id)->get();
        $show = '<div class="table-responsive"> <table id="example" class="table-striped table-bordered table-hover" style="width:100%"> <thead> <tr> <th>SN.</th> <th>Sale Pt</th> <th>Winning</th> <th>Commission</th> <th>Net Pt</th> <th>Date</th> </tr> </thead> <tbody>';
        if(!empty($data)){
            $ss = 0;
            $com = 0;
            $nn = 0;
            foreach ($data as $key => $value) {
                $sale =$value->sId;
                $ss = $ss+$sale;
                $commition=$value->sId*10/100;
                $com = $com+$commition;
                $net =$sale-$commition;

                $nn =$nn+$net;
                $sno = $key+1;
                $show .='<tr>
                        <td>'.$sno.'</td>
                          <td>'.$sale.'</td>
                          <td>'.$value->status.'</td>
                          <td>'.$commition.'</td>
                          <td>'.$net.'</td>
                          <td>'.date('Y-m-d',strtotime($value->created_at)).'</td>
                         </tr>';
            }
            $show .= '<tr>
                          <th>Total:</th>
                          <th>'.$ss.'</th>
                          <th>0</th>
                          <th>'.$com.'</th>
                          <th>'.$nn.'</th>
                          <th><a class="btn btn-primary" style="width:70px !important;" href="report_print.php?total=4&amp;total1=0&amp;total2=0.4&amp;total3=3.6&amp;total4=2023-02-13&amp;total5=2023-02-13">Print</a></th>
                      </tr>';
        }
        $show .= ' </tbody></table></div>';
        echo $show;
    }


    public function reprint(Request $request)
    {

        $data = Order::where('useriddds',Auth::user()->id)->get();
        $show = '<div class="table-responsive"> <table id="example" class="table-striped table-bordered table-hover" style="width:100%"> <thead> <tr> <th>S.No.</th> <th>Barcode</th> <th>Order ID</th> <th>Qt.</th> <th>Pt.</th> <th>Draw Time</th> <th> Draw</th> <th>T.Pt. </th> <th>Date&amp;Time</th> <th>Action</th> </tr> </thead> <tbody>';
        if(!empty($data)){        
            foreach ($data as $key => $value) {             
                $sno = $key+1;
                $show .='<tr>
                <td>'.$sno.'</td>
                <td>'.$value->barcode.'</td>
                <td>'.$value->orderid.'</td>
                <td>'.$value->qt.'</td>
                <td>'.$value->pt.'</td>
                <td>'.date('h:i A',strtotime($value->drowtime)).'</td>
                <td>1</td>
                <td>'.$value->tpt.'</td>
                <td>'.date('d-m-Y h:i A',strtotime($value->created_at)).'</td>                
                <td>
              <a class="btn btn-primary" href="reprint_reciept.php?id=141653" style="width:60px;">Print</a>
               </td>
            
              
               
           
          
            </tr>';
            }
           
        }
        $show .= ' </tbody></table></div>';
        echo $show;
    }


      public function ajaxforrrtime()
    {
        echo 1;
    }

    public function buytickets(Request $request)
    {
       $post = $request->all();
       $result = array();
       $orderid ='12201'.Buyticket::count();
       if(!empty($post['lttrynumsss'])){
        $qt =0;
            for ($i=0; $i < count($post['lttrynumsss']) ; $i++) {  
                if($post['lttrynumsss'][$i] > 0){          
                    $data = array('pId'=>$post['lttrynumsss'][$i],'sId'=>$post['lttrynumsqntss'][$i],'tickpriceids'=>$post['tickpriceidss'],'useriddds'=>$post['useridddss'],'orderid'=>$orderid);
                    $result[] =  Buyticket::create($data);
                    $qt= $qt+$post['lttrynumsqntss'][$i];
                }
            }            
         Order::create(array('barcode'=>$post['tickpriceidss'],'orderid'=>$orderid,'qt'=>$qt,'pt'=>$qt*2,'drowtime'=>date('H:i:s'),'tpt'=>$qt*2,'useriddds'=>$post['useridddss']));
       }
       return $post['tickpriceidss'];
    }

    public function buy_reciept(Request $request)
    {
      
       $data = Buyticket::with('user')->where('tickpriceids',$request->id)->get();
       $total = Buyticket::with('user')->where('tickpriceids',$request->id)->sum('sId');
        $d = new DNS1D();
        $d->setStorPath(__DIR__.'/cache/');
        $barcode = $d->getBarcodePNG($request->id, 'C39+',3,33,array(1,1,1), true);
        $returnhousee = $request->returnhousee;
        return view('web.buy_reciept',compact('data','total','barcode','returnhousee'));
    }
    
    public function change_password(Request $request){
        if (Auth::attempt(array('id' => Auth::user()->id, 'password' => $request->old_pass))){

            $user = User::find(Auth::user()->id);
            $user->update(array('password'=>Hash::make($request->password) ));
            return "success";
        }else{
            return "Wrong Credentials";
        }    
    }
   

}

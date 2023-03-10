<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Session;
use Stripe;
use DB;
use Validator;
use Mail;
//use Request;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Order;
use App\Models\Order_product;
use App\Models\Order_status;
use App\Models\Cart;



class ApiController extends Controller {  

    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 200)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }

       

    public function login(Request $request){
        $input = $request->all();
        $rule = array(
            'email'=>'required',
            'password'=>'required'
      
        );
        $messages = array();
        $validation = Validator::make($input,$rule, $messages);
        if ($validation->fails()) {
            $message = $validation->messages()->first();
           
            return $this->sendError($message,['error' => 'error occure']);
        }
        try {
            
    
             $chk_login = DB::table('users')->where( array(
                'email'=>$input['email']
            ))->first();

            if ($chk_login) {
                if (Hash::check($input['password'],$chk_login->password)){
                    $message = 'Login Successfull';
                    return $this->sendResponse($chk_login, $message);
                }
               
            }
            $message = 'Please check your email or password';
            return $this->sendError($message,['error' => 'error occure']);
        } catch (\Exception $e) {
            DB::rollBack();
            $message = $e->getMessage();
            return $this->sendError(false, $message);
        }
    }

    
    public function registration(Request $request){
        $input = $request->all(); 
        $email = $input['email'];
        $input['password'] = Hash::make($input['password']);
        $rule = array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        );
        $messages = array();
        $validation = Validator::make($input,  $rule,  $messages);
        if ($validation->fails()) {
            $message = $validation->messages()->first();
           
            return $this->sendError($message,['error' => 'error occure']);
        }
        try {
             $chk_officer_id = DB::table('users')->where('email',$email)->first();
            if (!empty($chk_officer_id)) {
               $result= true; 
                $message = 'Email id already exist!';
                return $this->sendResponse($result, $message);
            }else{
                 $result = DB::table('users')->insert($input);
            }
           
            if ($result) {
                $message = 'Register successfully';
                return $this->sendResponse($result, $message);
            }
            $message = 'Failed12';
            return $this->sendError(false, $message);
        } catch (\Exception $e) {
            DB::rollBack();
            $message = $e->getMessage();
            return $this->sendError(false, $message);
        }
    }

    public function varify_email(Request $request){
       $input = $request->all();
        $rule = array(
            'email'=>'required'
        );
        $messages = array();
        $validation = Validator::make($input,$rule, $messages);
         if ($validation->fails()) {
            $message = $validation->messages()->first();
           
            return $this->sendError($message,['error' => 'error occure']);
        }
         try {
             $chk_login = DB::table('users')->where( array(
                'email'=>$input['email']
            ))->first();
            if (!empty($chk_login)) {
                $message = 'Otp send to your email id';
              $id = $chk_login->id;
              $otp = rand(1000,9999);
              $result = DB::table('users')->where('id',$id)->update(array('otp'=>$otp));
              $response = DB::table('users')->where('id',$id)->first();
              $send_otp = $response->otp;
              mail($input['email'],'Reset Password Otp','Your otp for forgot password is '.$send_otp);
              return $this->sendResponse(Null,$message);
            }
            
            $message = 'Please enter valid email id';
            return $this->sendError($message,['error' => 'error occure']);
        } catch (\Exception $e) {
            DB::rollBack();
            $message = $e->getMessage();
            return $this->sendError(false, $message);
        }
    }


    public function verify_otp(Request $request){
        $input = $request->all();
         $rule = array(
            'user_id' => 'required',
            'otp'=>'required'
         );
         $messages = array();
         $validation = Validator::make($input,  $rule, $messages);
          if ($validation->fails()) {
             $message = $validation->messages()->first();
            
             return $this->sendError($message,['error' => 'error occure']);
         }
          try {
              $chk_otp = DB::table('users')->where( array(
                 'otp'=>$input['otp'],
                 'id'=>$input['user_id']
             ))->first();
             if (!empty($chk_otp)) {
                 $message = 'Otp veryfied';
                 return $this->sendResponse($chk_otp, $message);
             }
             
             $message = 'Please enter valid otp';
             
             return $this->sendError($message,['error' => 'error occure']);
         } catch (\Exception $e) {
             DB::rollBack();
             $message = $e->getMessage();
             return $this->sendError(false, $message);
         }
     }

     public function forgot_password(Request $request){
        $input = $request->all();
         $rule = array(
             'user_id'=>'required',
             'password'=>'required',
             
         );
         $messages = array();
         $validation = Validator::make($input,  $rule, $messages);
          if ($validation->fails()) {
             $message = $validation->messages()->first();
            
             return $this->sendError($message,['error' => 'error occure']);
         }
          try {
               $id = $input['user_id'];
               $chk_email = DB::table('users')->where( array(
                'id'=> $id 
            ))->first();
            if (!empty($chk_email)) {
                   $success = DB::table('users')->where('id',$id)->update(array('otp'=>Null,'password'=>Hash::make($input['password'])));
                   if ($success) {
                     $message = 'Password Change Successfully!';
                     return $this->sendResponse(null,$message);
                   }
          
            }
              $message = 'Wrong User Id';
             return $this->sendError($message,['error' => 'error occure']);
         } catch (\Exception $e) {
             DB::rollBack();
             $message = $e->getMessage();
             return $this->sendError(false, $message);
         }
     }

 
    public function sliderimages(Request $request){
          try {
              $chk_category = DB::table('sliders')->where( array(
                 'status'=>1
             ))->get();
             if (!empty($chk_category)) {
                    $message = 'Slider Images fetch successfully';
                    return $this->sendResponse($chk_category, $message);
             }else{
                return $this->sendResponse(null, 'Slider Images not available');
             }
             
            
             
             return $this->sendError($message,['error' => 'error occure']);
         } catch (\Exception $e) {
             DB::rollBack();
             $message = $e->getMessage();
             return $this->sendError(false, $message);
         }
     }

     public function category(Request $request){
          try {
              $chk_category = DB::table('categories')->where( array(
                 'status'=>1
             ))->get();
             if (!empty($chk_category)) {
                    $message = 'Category fetch successfully';
                    return $this->sendResponse($chk_category, $message);
             }else{
                return $this->sendResponse(null, 'category not available');
             }
             
            
             
             return $this->sendError($message,['error' => 'error occure']);
         } catch (\Exception $e) {
             DB::rollBack();
             $message = $e->getMessage();
             return $this->sendError(false, $message);
         }
     }

    
     public function fetch_category_by_id(Request $request){
        $input = $request->all();
         $rule = array(
            'id'=>'required',
         );
         $messages = array();
         $validation = Validator::make($input,  $rule, $messages);
          if ($validation->fails()) {
             $message = $validation->messages()->first();
            
             return $this->sendError($message,['error' => 'error occure']);
         }
          try {
               
               $chk_category_id = DB::table('categories')->where( array(
                'id'=>$input['id'],'status'=>1
            ))->first();
            if (!empty($chk_category_id)) {
                $message = 'category fetch successfully!';
                return $this->sendResponse($chk_category_id,$message);
        }else{
            $message = 'Wrong category id';
        }
             
             
             
             return $this->sendError($message,['error' => 'error occure']);
         } catch (\Exception $e) {
             DB::rollBack();
             $message = $e->getMessage();
             return $this->sendError(false, $message);
         }
     }


    

     public function fetch_product_by_category_id(Request $request){
        $input = $request->all();
         $rule = array(
            'id'=>'required',
         );
         $messages = array();
         $validation = Validator::make($input,  $rule, $messages);
          if ($validation->fails()) {
             $message = $validation->messages()->first();
            
             return $this->sendError($message,['error' => 'error occure']);
         }
          try {
               
               $chk_category_id = DB::table('products')->where( array(
                'category_id'=>$input['id'],'status'=>1
            ))->first();
            if (!empty($chk_category_id)) {
                $message = 'Product fetch successfully!';
                return $this->sendResponse($chk_category_id,$message);
        }else{
            $message = 'Wrong category id';
        }
             
             
             
             return $this->sendError($message,['error' => 'error occure']);
         } catch (\Exception $e) {
             DB::rollBack();
             $message = $e->getMessage();
             return $this->sendError(false, $message);
         }
     }

    
     
     public function product_list(Request $request){
        try {
            $chk_product = DB::table('products')->where( array(
               'status'=>1
           ))->get();
           if (!empty($chk_product)) {
                  $message = 'Product fetch successfully';
                  return $this->sendResponse($chk_product, $message);
           }else{
              return $this->sendResponse(null, 'Product not available');
           }
           
          
           
           return $this->sendError($message,['error' => 'error occure']);
       } catch (\Exception $e) {
           DB::rollBack();
           $message = $e->getMessage();
           return $this->sendError(false, $message);
       }
   }

   public function product_by_id(Request $request){
    $input = $request->all();
     $rule = array(
        'id'=>'required',
     );
     $messages = array();
     $validation = Validator::make($input,  $rule, $messages);
      if ($validation->fails()) {
         $message = $validation->messages()->first();
        
         return $this->sendError($message,['error' => 'error occure']);
     }
      try {
           
           $chk_category_id = DB::table('products')->where( array(
            'id'=>$input['id'],'status'=>1
        ))->first();
        if (!empty($chk_category_id)) {
            $message = 'Product fetch successfully!';
            return $this->sendResponse($chk_category_id,$message);
    }else{
        $message = 'Wrong product id';
    }
         
         
         
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }


 public function save_address(Request $request){
    $input = $request->all();
     $rule = array(
         'customer_id'=>'required',
         'title'=>'required',
         'type'=>'required',
         'default'=>'required',
         'address'=>'required',
         'country'=>'required',
         'state'=>'required',
         'city'=>'required',
         'zip'=>'required'
         
     );
     $messages = array();
     $validation = Validator::make($input,  $rule, $messages);
      if ($validation->fails()) {
         $message = $validation->messages()->first();
        
         return $this->sendError($message,['error' => 'error occure']);
     }
      try {
           $data = array(
             'title' => $input['title'],
             'type' => $input['type'],
             'default' => $input['default'],
             'customer_id' => $input['customer_id'],
             'address' => json_encode(array(
                    'address' => $input['address'],
                    'country' => $input['country'],
                    'state' => $input['state'],
                    'city' => $input['city'],
                    'zip' => $input['zip']
                )),

           );
           $result = Address::create($data);
        if ($result) {
            $message = 'Address Create Successfully!';
            return $this->sendResponse($result,$message);
        }
         $message = 'some error occure';
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

   public function update_address(Request $request){
    $input = $request->all();
     $rule = array(
        
         'id'=>'required',
         'customer_id'=>'required',
         'title'=>'required',
         'type'=>'required',
         'default'=>'required',
         'address'=>'required',
         'country'=>'required',
         'state'=>'required',
         'city'=>'required',
         'zip'=>'required'
         
     );
     $messages = array();
     $validation = Validator::make($input,  $rule, $messages);
      if ($validation->fails()) {
         $message = $validation->messages()->first();
        
         return $this->sendError($message,['error' => 'error occure']);
     }
      try {
           $data = array(
             'title' => $input['title'],
             'type' => $input['type'],
             'default' => $input['default'],
             'customer_id' => $input['customer_id'],
             'address' => json_encode(array(
                    'address' => $input['address'],
                    'country' => $input['country'],
                    'state' => $input['state'],
                    'city' => $input['city'],
                    'zip' => $input['zip']
                )),

           );
           $id = $input['id'];
           unset($input['id']);
           $result = Address::where('id',$id)->update($data);
        if ($result) {
            $message = 'Address Update Successfully!';
            return $this->sendResponse($result,$message);
        }
         $message = 'some error occure';
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 public function order_store(Request $request){
    $input = $request->all();
     $rule = array(
         'customer_id'=>'required',
         'customer_contact'=>'required',
         'products'=>'required',
         'status'=>'required',
         'amount'=>'required',
         'sales_tax'=>'required',
         'paid_total'=>'required',
         'total'=>'required',
         'shop_id'=>'required',
         'shipping_address'=>'required',
         'billing_address'=>'required',
         
     );
     $messages = array();
     $validation = Validator::make($input,  $rule, $messages);
      if ($validation->fails()) {
         $message = $validation->messages()->first();
         return $this->sendError($message,['error' => 'error occure']);
     }
      try {
           
           $result = Order::create($input);
        if ($result) {

            $message = 'Order Create Successfully!';
            return $this->sendResponse($result,$message);
        }
         $message = 'some error occure';
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }


 public function order_product(Request $request){
    $input = $request->all();
     $rule = array(
         'order_id'=>'required',
         'product_id'=>'required',
         'order_quantity'=>'required',
         'unit_price'=>'required',
         'subtotal'=>'required',
         
     );
     $messages = array();
     $validation = Validator::make($input,  $rule, $messages);
      if ($validation->fails()) {
         $message = $validation->messages()->first();
         return $this->sendError($message,['error' => 'error occure']);
     }
      try {
           
           $result = Order_product::create($input);
        if ($result) {

            $message = 'Order Product insert Successfully!';
            return $this->sendResponse($result,$message);
        }
         $message = 'some error occure';
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 public function order_update(Request $request){
    $input = $request->all();
     $rule = array(
         'id'=>'required',
         'customer_id'=>'required',
         'customer_contact'=>'required',
         'status'=>'required',
         'amount'=>'required',
         'sales_tax'=>'required',
         'paid_total'=>'required',
         'total'=>'required',
         'shop_id'=>'required',
         'shipping_address'=>'required',
         'billing_address'=>'required',
         
     );
     $messages = array();
     $validation = Validator::make($input,  $rule, $messages);
      if ($validation->fails()) {
         $message = $validation->messages()->first();
         return $this->sendError($message,['error' => 'error occure']);
     }
      try {
           
            $id = $input['id'];
            unset($input['id']);
            $result = Order::where('id',$id)->update($input);
        if ($result) {
            $message = 'Order Update Successfully!';
            return $this->sendResponse($result,$message);
        }
         $message = 'some error occure';
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 
 public function add_cart(Request $request){
    $input = $request->all();
     $rule = array(
        'customer_id' => 'required',
        'product_id'=>'required',
        'qty'=>'required',
        'type'=>'required',
     );
     $messages = array();
     $validation = Validator::make($input,  $rule, $messages);
      if ($validation->fails()) {
         $message = $validation->messages()->first();
        
         return $this->sendError($message,['error' => 'error occure']);
     }
      try {
           $exist =Cart::where(array('type' => $input['type'],'customer_id' => $input['customer_id'],'product_id'=>$input['product_id']))->first();
           if($exist == ''){
               $chk_category_id = Cart::create($input);
           }else{
               $chk_category_id = Cart::where(array('type' => $input['type'],'customer_id' => $input['customer_id'],'product_id'=>$input['product_id']))->update($input);
           }
        if (!empty($chk_category_id)) {
            $message = 'Add to Cart successfully!';
            return $this->sendResponse($chk_category_id,$message);
        }
         $message = 'Some error occure!';
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 public function delete_cart($id){
    try {
           $chk_category_id = Cart::where('id',$id)->delete();
        if (!empty($chk_category_id)) {
            $message = 'Delete to Cart successfully!';
            return $this->sendResponse($chk_category_id,$message);
        }
         $message = 'Some error occure!';
         return $this->sendError($message,['error' => 'error occure']);
     }catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 
 public function cart($id){
    try {
           $chk_category_id = Cart::where( array(
            'customer_id'=>$id,'type' => 'cart'))->get();
        if (!empty($chk_category_id)) {
            $message = 'Cart fetch successfully!';
            return $this->sendResponse($chk_category_id,$message);
    }else{
        $message = 'not have any data';
    }
         
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 public function wishlist($id){
    try {
           
           $chk_category_id = Cart::where( array(
            'customer_id'=>$id,'type' => 'wishlist'))->get();
        if (!empty($chk_category_id)) {
            $message = 'wishlist fetch successfully!';
            return $this->sendResponse($chk_category_id,$message);
    }else{
        $message = 'not have any data';
    }
         
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 public function get_order_status(){
    try {
           $chk_category_id = Order_status::get();
        if (!empty($chk_category_id)) {
            $message = 'Order Status fetch successfully!';
            return $this->sendResponse($chk_category_id,$message);
    }else{
        $message = 'not have any data';
    }
         
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 public function order_status_update(Request $request){
    $input = $request->all();
     $rule = array(
        'order_id' => 'required',
        'status'=>'required',
     );
     $messages = array();
     $validation = Validator::make($input,  $rule, $messages);
      if ($validation->fails()) {
         $message = $validation->messages()->first();
        
         return $this->sendError($message,['error' => 'error occure']);
     }
      try {
        $chk_category_id = Order::where(array('id' => $input['order_id']))->update(array('status'=> $input['status']));
       
        if (!empty($chk_category_id)) {
            $message = 'Order Status Update successfully!';
            return $this->sendResponse($chk_category_id,$message);
        }
         $message = 'Some error occure!';
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }
  

}


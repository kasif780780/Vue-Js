<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use  App\Product;
use Intervention\Image\ImageServiceProvider;

class ProductController extends Controller
{
     public function __construct()
     {
         $this->middleware('auth:api');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('isAdmin');
        if(\Gate::allows('isAdmin')|| \Gate::Allows('isAuthor'))
        {
            return Product::latest()->paginate(5);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
             'title'=>'required|string|max:191',
            //  'currency'=>'required',
            //  'yy'=>'required',
            //  'title'=>'required',
            //  'title'=>'required',
            //  'title'=>'required',
            //  'email'=>'required|string|email|max:191',
            //  'password'=>'required|string|max:191',
        ]);
        //
        return Product::create([
             'title' =>$request['title'],
            'currency' =>$request['currency'],
            'amount' =>$request['amount'],
            'purpose' =>$request['purpose'],
            'marchant' =>$request['marchant'],
            'type' =>$request['type'],
            'photo' =>$request['photo'],
            
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function updateProfile(Request $request)
    {
        $Product = auth('api')->Product();
        $this->validate($request,[
            'title' => 'required|string|max:191',
            // 'email' => 'required|string|email|max:191|unique:Products,email,'.$Product->id,
            // 'password' => 'sometimes|required|min:6'
        ]);
        $currentPhoto = $Product->photo;
        if($request->photo != $currentPhoto){
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            \Image::make($request->photo)->save(public_path('img/profile/').$name);
            $request->merge(['photo' => $name]);
            $ProductPhoto = public_path('img/profile/').$currentPhoto;
            if(file_exists($ProductPhoto)){
                @unlink($ProductPhoto);
            }
        }
        if(!empty($request->password)){
            $request->merge(['password' => Hash::make($request['password'])]);
        }
        $Product->update($request->all());
        return ['message' => "Success"];
    }
    public function profile()
    {
        return auth('api')->product();
        //
    }
  
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //fi
        
        $Product =Product::findorFail($id);

        $this->validate($request,[
            'title'=>'required|string|max:191',
            // 'email'=>'required|string|email|max:191|unique:Products,email,' .$Product->id,
            // 'password'=>'sometimes|min:6',
       ]);
       
       $Product->update($request->all());
       return['messege' => 'Update Product'];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->authorize('isAdmin');
        $Product =Product::findorFail($id);
        $Product->delete();
        return ['message' =>'Product Deleted'];

    }
    public function search(){
        if ($search = \Request::get('q')) {
            $Products = Product::where(function($query) use ($search){
                $query->where('title','LIKE',"%$search%");
                        // ->orWhere('email','LIKE',"%$search%");
            })->paginate(20);
        }else{
            $Products = Product::latest()->paginate(5);
        }
        return $Products;
    }
}

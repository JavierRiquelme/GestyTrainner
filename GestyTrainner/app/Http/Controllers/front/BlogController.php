<?php

namespace App\Http\Controllers\front;

use App\Clase;
use App\Category;
use App\Contact;
use App\User;
use App\PostComment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreContactPost;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $clases = Clase::all()->fresh('user');
        $clases = Clase::simplePaginate(5);

        return view('frontblog.blog.index', compact('clases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('id');
        $contact = new Contact();
        return view('frontblog.blog.contact', ['contact' => $contact]);
    }

    public function createComment(Request $request, Clase $clase){

        $comment = new PostComment();
        $comment->title = $request->get('title');
        $comment->message = $request->get('descripcion');
        $comment->clase_id = $clase->id;
        $comment->user_id = \Auth::user()->id;

        $validateComment = $request->validate([
            'title' => 'required',
            'descripcion' => 'required'
        ]);
        
        $comment->save();

        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactPost $request)
    {
        Contact::create($request->validated());
        return back()->with('status', 'Contacto creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clase = Clase::findOrFail($id);
        $clase->apuntado=false;
        $user = Auth::user();

        if($clase->belongsToMany('App\User')->wherePivot('user_id', $user->id)->get()->count()){
            
            $clase->apuntado=true;
        }

        return view('frontblog.blog.post', ['clase' => $clase]);
    }

    public function post(){
        return back()->with('status', 'Ya estás apuntado a esta clase');
    }

    public function listClaseCategory(Category $category)
    {
        $clases = Clase::where('category_id','=',$category->id);
        $clases = $clases->simplePaginate(5);

        return view('frontblog.blog.clases-category', compact('clases', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();
        return view('frontblog.blog.edit', ['user', $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {   
        $user = Auth::user();
        $user->update($request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]));
        
        return back()->with('status', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        DB::delete('delete from clase_user where clase_id='.$id.' and user_id='.$user->id);
        
        return back()->with('status', 'Te has desapuntado de la Clase con éxito');
    }

    public function about()
    {
        return view('frontblog.blog.about');
    }

    public function contact()
    {
        $users = User::where('rol_id', '=', '1')->get();
        return view('frontblog.blog.contact', ['users' => $users]);
    }

    public function categories(Category $categories)
    {
        $categories = Category::get();
        return view('frontblog.blog.categories', ['categories' => $categories]);
    }

    public function listMisClases(){

        $user = Auth::user();
        $clases = User::findOrFail($user->id)->clases;

        return view('frontblog.blog.list-mis-clases', compact('clases'));
    }

    public function insertClaseUser(Request $request){
        
        DB::insert('insert into clase_user (clase_id, user_id) values ('.$request->val_clase_id.','.$request->val_user_id.')');
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\ModelArticle;
use App\User;
use Ixudra\Curl\Facades\Curl;

class ArticleController extends Controller {

    private $objUser;
    private $objArticle;

    public function __construct() {
        $this->objUser = new User();
        $this->objArticle = new ModelArticle();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('index');
    }

    public function login(Request $request) {

        $request->validate([
            'user' => 'required',
            'password' => 'required',
        ]);

        $credentials = ['user' => $request->user, 'password' => $request->password];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('articles/create');
        } else {
            return redirect()->back()->with('msg', 'invalid login or password');
        }
    }

    public function articles() {
        $article = $this->objArticle->all();
        return view('articles', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $users = $this->objUser->all();
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request) {

        $user = $this->attributes['user_id'] = Auth::id();

        $insert = $this->objArticle->create([
            'title' => $request->title,
            'link' => $request->link,
            'id_user' => $user
        ]);
        if ($insert) {
            return redirect('articles/create')->with('msg', 'registered article');
            ;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $article = $this->objArticle->find($id);
        if (!$article) {
            return redirect()->route('articles');
        }

        $article->delete();
        return redirect()->route('articles');
    }

    public function queryBlog(Request $request) {

        $parametro = preg_replace('/\s/', '+', $request->get('title'));
        $url = 'https://www.uplexis.com.br/blog/?s=' . $parametro;
        $response = Curl::to($url)->get();
        $ar = [];
        preg_match_all("/title\".[\n\s\t]+.*[\n\s\t]+.*[\n\s\t]+.*class=\"btn-uplexis orange\">Continue Lendo/", $response, $ar, PREG_PATTERN_ORDER);
        if (count($ar[0]) > 0) {
            $count = count($ar[0]);
            foreach ($ar as $key => $a) {$ar[$key] = preg_replace('/\s+/', ' ', $a);$ar[$key] = preg_replace('/title"> /', '', $ar[$key]);$ar[$key] = preg_replace('/<.*a href="/', ' || ', $ar[$key]);$ar[$key] = preg_replace('/\".*Continue Lendo/', '', $ar[$key]);}
            foreach ($ar[0] as $a) {$captura = explode(" || ", $a);$cap = ModelArticle::where('link', '=', $captura[1])->where('title', '=', $captura[0])->first();if (is_null($cap)) {$article = new ModelArticle(['title' => $captura[0],'link' => $captura[1], 'id_user' => $this->attributes['user_id'] = Auth::id()]);$article->save();}}
            return redirect('articles/create')->with('msg', 'registered article');
        } else {
            return \Redirect::back()->withErrors('Not found article');
        }
    }

    public function search() {
        $articles = ModelArticle::with('user')->get();
        return view('articles.create', ['articles' => $articles]);
    }

}

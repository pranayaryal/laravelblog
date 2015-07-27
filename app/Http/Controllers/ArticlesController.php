<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Auth;
use Carbon\Carbon;
use App\Tag;


class ArticlesController extends Controller
{


    /*
`   * create a new articles controller instance
    */

    public function __construct()
    {
        //authorization only for the create method
        //$this->middleware('auth', ['only' => 'create']);

        //authorization for full website;
        $this->middleware('auth');
    }



    /*
`   * Show all articles
    *
    * @return response
    */
    public function index()
    {

        
        //displaying only the current articles, not the ones that have a future date
    	$articles = Article::latest('published_at')->published()->get();

        $latest = Article::latest()->first();

    	return view('articles.index', compact('articles', 'latest'));
    }



    /*
`   * Show a single article
    *
    * @param Article $article
    * @return response
    */
    public function show(Article $article)
    {
    	

    	return view('articles.show', compact('article'));
    }


    /*
`   * Show the page to create a new article
    *
    * 
    * @return response
    */
    public function create()
    {
        $tags = Tag::lists('name', 'id');
    	return view('articles.create', compact('tags'));
    }


    /*
`   * Save a new article
    *
    * @param ArticleRequest $request
    * @return response
    */

    public function store(ArticleRequest $request)
    {
    	

        $this->createArticle($request);

    	return redirect('articles')->with(['flash_message' => 'Your article has been created']);
    }


    /*
`   * Edit an existing article
    *
    * @param Article $article
    * @return response
    */

    public function edit(Article $article)
    {
        $tags = Tag::lists('name', 'id');
        return view('articles.edit', compact('article', 'tags'));
    }


    /*
`   * Update an article
    *
    * @param ArticleRequest $request
    * @param Article $article
    * @return response
    */
    public function update(Article $article, ArticleRequest $request)
    {

        $article->update($request->all());

        $article->tags()->sync($request->input('tag_list'));

        return redirect('articles')->withMessage('Successfully updated');
    }


    /*
`   * Delete an article
    *
    * @param ArticleRequest $request
    * @param Article $article
    * @return response
    */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('articles')->withMessage('Article Deleted');
    }


    /*
`   * Sync up the list of tags in the database
    *
    * @param Article $article
    * @param array   $tags
    */
    private function syncTags(Article $article, array $tags )
    {
        $article->tags()->sync($tags);
    }


    /*
`   * Save a new article
    *
    * @param ArticleRequest $request
    * @return response
    */
    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }
}

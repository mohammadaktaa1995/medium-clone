<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index', 'search']);
    }

    public function index()
    {
        $topStories = Article::with('author')->latest()->limit(5)->get();
        $mostViewedArticles = Article::with('author')->orderBy('views', 'desc')->limit(4)->get();
        return view('articles.index', compact('topStories', 'mostViewedArticles'));
    }

    public function show(Article $article)
    {
        $article->views++;
        $article->save();
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', compact('categories', 'tags'));
    }

    public function store(ArticleStoreRequest $request)
    {
        $data = $request->validated();
        if (isset($data['tags'])) {
            foreach ($data['tags'] as $key => $tag) {
                if (!is_numeric($tag)) {
                    $tag = Tag::create(['name' => $tag]);
                    $data['tags'][$key] = $tag->id;
                }
            }
        } else {
            $data['tags'] = [];
        }
        $image = $data['cover_image'];
        $manager = new ImageManager(['driver' => 'gd']);
        $image = $manager->make($image->getRealPath());

        $fileName = sha1(time().(int) rand(10, 100)).'.'.explode('/', $image->mime())[1];
        $path = storage_path('app').'/public/articles/';
        is_dir($path) ?: File::makeDirectory($path, $mode = 0755, true, true);
        $image->save($path.$fileName);
        $data['cover_image'] = 'storage/articles/'.$fileName;
        $data['slug'] = Str::slug($data['title']).'-'.date('Y-m-d-h-m');

        $article = Article::create($data);
        $article->tags()->sync($data['tags']);

        return redirect("/articles/{$article->slug}");
    }

    public function uploadImage(Request $request)
    {
        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $fileName = '';
        $url = '';
        $msg = '';
        if ($request->hasFile('upload')) {
            $image = $request->file('upload');
            $manager = new ImageManager(['driver' => 'gd']);
            $image = $manager->make($image->getRealPath());

            $fileName = sha1(time().(int) rand(10, 100)).'.'.explode('/', $image->mime())[1];
            $path = storage_path('app').'/public/ckeditor/';
            is_dir($path) ?: File::makeDirectory($path, $mode = 0755, true, true);
            $image->save($path.$fileName);
            $url = asset('storage/ckeditor/'.$fileName);
            $msg = 'Image uploaded successfully';
        }
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

        @header('Content-type: text/html; charset=utf-8');
        return $response;
    }

    public function search(Request $request)
    {
        $query = str_replace(' ', '%', $request->get('query', ''));
        $articles = Article::whereRaw('upper(title) like upper(\'%'.$query.'%\')')
            ->orWhereRaw('upper(summary) like upper(\'%'.$query.'%\')')
            ->orWhereRaw('upper(body) like upper(\'%'.$query.'%\')')
            ->limit(10)->get();
        return response()->json(['data' => $articles]);
    }

    public function showByCategory(Category $category)
    {
        $articles = Article::where('category_id', $category->id)->get();
        return view('articles.by-category', compact('category', 'articles'));
    }

    public function showByTag(Tag $tag)
    {
        $articles = Article::whereHas('tags', function ($query) use ($tag) {
            $query->where('tag_id', $tag->id);
        })->get();
        return view('articles.by-tag', compact('tag', 'articles'));
    }
}

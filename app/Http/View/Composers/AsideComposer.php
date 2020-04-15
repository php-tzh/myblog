<?php
namespace App\Http\View\Composers;
use Illuminate\View\View;
use App\Cate;
use DB;
use App\Article;
class AsideComposer
{
    /**
     * @param  View  $view
     * @return void
     */
    public function __construct(Article $article)
    {
    	$this->article = $article;
    }
    public function compose(View $view)
    {
        $tags = DB::table('tags')->select('tag_name','id')->get();
        $hots = $this->article->getHotArticle();
        $view->with(['tags'=>$tags,'hots'=>$hots]);

    }
}
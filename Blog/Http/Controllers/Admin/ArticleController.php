<?php
namespace Modules\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\BlogArticle;
use Modules\Blog\Repositories\ArticleRepository;
use App\Servers\FieldServer;

class ArticleController extends Controller
{
    protected function getFieldServer()
    {
        return app(FieldServer::class)->init(module(), 'BlogArticle');
    }

    public function index(ArticleRepository $repository)
    {
        $fieldServer = $this->getFieldServer();
        $data = $repository->paginate(10);
        return view('blog::admin.article.index', compact('data', 'fieldServer'));
    }

    public function create(BlogArticle $model)
    {
        $fieldServer = $this->getFieldServer();
        return view('blog::admin.article.create', compact('model', 'fieldServer'));
    }

    public function store(Request $request, ArticleRepository $repository)
    {
        $repository->create($request->input());
        return redirect(module_link('blog.admin.article.index'))->with('success', '添加完成');
    }

    public function edit(BlogArticle $article)
    {
        $fieldServer = $this->getFieldServer();
        return view(
            'blog::admin.article.edit',
            ['model' => $article, 'fieldServer' => $fieldServer]
        );
    }

    public function update(Request $request, BlogArticle $article, ArticleRepository $repository)
    {
        $repository->update($article, $request->input());
        return redirect(module_link('blog.admin.article.index'))->with('success', '修改成功');
    }

    public function destroy(BlogArticle $article, ArticleRepository $repository)
    {
        $repository->delete($article);
        return redirect(module_link('blog.admin.article.index'))->with('success', '删除成功');
    }
}

<?php

class PostsController extends BaseController {

	protected $post;

	public function __construct(Post $post, Tag $tag)
	{
        $this->post = $post;
        $this->beforeFilter('auth', ['except' => ['show', 'index', 'archive']]);
	}
	public function index()
	{
        $posts = $this->post
            ->orderBy('created_at', 'desc')
            ->with('category')
            ->paginate(5);
		return View::make('posts.index', compact('posts'));
	}
	public function archive($year, $month = null)
	{
        if ($month) {
            $posts = Post::whereRaw('MONTH(created_at) = ? ', [$month])
                ->whereRaw('YEAR(created_at) = ?', [$year])
                ->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $posts = Post::whereRaw('YEAR(created_at) = ?', [$year])
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        }
        return View::make('posts.index', compact('posts'));
	}

    public function create()
	{
		return View::make('posts.create');
	}

	public function store()
	{
        $creator = new Crux\Post\Creator($this);
        return $creator->create(Input::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$post = $this->post->whereSlug($slug)->with('category')->with('tags')->firstOrFail();
		return View::make('posts.show', compact('post'));
        // return $post;
	}
    public function admin()
    {
        $posts = $this->post->orderBy('created_at', 'desc')->with('category')->with('tags')->paginate(10);
        return View::make('posts.admin', compact('posts'));
        // return $posts;
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 */
	public function edit($id)
	{
		$post = $this->post->with('category','tags')->find($id);

    	$tags = Tag::tagArray();
    	$categories = Category::categoryArray();

		if (is_null($post))
		{
			return Redirect::route('posts.index');
		}

		return View::make('posts.edit', compact('post', 'categories','tags'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 */
	public function update($id)
	{
        if (Input::all()['banner'] == null)
		{
            $input = Input::except('banner');
        }
		else
		{
            $input = Input::all();
        }

        $updater = new Crux\Post\Updater($this);
        return $updater->update($id, $input);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 */
	public function destroy($id)
	{
		$this->post->find($id)->delete();

		return Redirect::to('/posts');
	}
}

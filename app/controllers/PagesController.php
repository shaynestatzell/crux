<?php

class PagesController extends BaseController {

	protected $page;
	protected $settings;
	protected $model;
	protected $hub;

	public function __construct(Page $page, Setting $settings)
	{
        $this->page = $page;
		$this->settings = $settings;

        $this->beforeFilter('auth', ['except' => ['show', '']]);
		$this->model = 'page';

		$this->hub = new Crux\Hub($this->model);
	}

	/**
	 * Display a listing of the resource.
	 *
	 */
	public function index()
	{
		$pages = $this->page->orderBy('title', 'asc')->get();
		$setting = $this->settings->all();

		return View::make('pages.index', compact('pages','setting'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 */
	public function create()
	{
		return View::make('pages.create');
	}

	public function store()
	{
		return $this->hub->create();
	}

	/**
	 * Display the specified resource.
	 *
	 */
	public function show($slug = 'home')
	{
		$page = $this->page->whereSlug($slug)->firstOrFail();
		return View::make('pages.show', compact('page', 'pages', 'settings'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 */
	public function edit($id)
	{
		$page = $this->page->find($id);

		if (is_null($page))
		{
			return Redirect::route('pages.index');
		}

		return View::make('pages.edit', compact('page'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 */
	public function update($id)
	{
		return $this->hub->update($id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 */
	public function destroy($id)
	{
		$this->page->find($id)->delete();

		return Redirect::route('pages.index');
	}
}

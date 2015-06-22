<?php

class SettingsController extends BaseController {
	protected $setting;
	protected $model;
	protected $hub;

	public function __construct(Setting $setting)
	{
		$this->setting = $setting;
        $this->beforeFilter('auth');
		$this->model = 'setting';

		$this->hub = new Crux\Hub($this->model);
	}

	/**
	 * Display a listing of the resource.
	 *
	 */
	public function index()
	{
        $settings = $this->setting->all();
        return View::make('settings.index', compact('settings'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 */
	public function create()
	{
		return View::make('settings.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 */
	public function store()
	{
        return $this->hub->create();
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
	 * Return a form for editing resource;
	 *
	 */
    public function edit($id)
    {
        $setting = $this->setting->find($id);
        return View::make('settings.edit', compact('setting'));
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 */
	public function destroy($id)
	{
        $setting = $this->setting->find($id)->delete();
        return Redirect::route('settings.index');
	}
}

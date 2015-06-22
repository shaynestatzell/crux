<?php

class UsersController extends BaseController {

    protected $user;
    protected $hub;
    protected $model;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->beforeFilter('auth');

        $this->model = 'user';
		$this->hub = new Crux\Hub($this->model);
    }

    public function index()
    {
        $users = $this->user->all();
        return View::make('users.index', compact('users'));
    }
    public function edit($id)
    {
        $user = $this->user->find($id);
        return View::make('users.edit', compact('user'));
    }
    public function create()
    {
        return View::make('users.create');
    }
	public function update($id)
	{
        return $this->hub->update($id);
	}
    public function store()
    {
        return $this->hub->create();
    }
	public function destroy($id)
	{
        $user = $this->user->find($id)->delete();
        return Redirect::route('users.index');
	}
}

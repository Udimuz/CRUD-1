<?php

namespace App\Http\Controllers;

//use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\View\View;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
		//dd(1234);
		$users = User::paginate();	//	paginate(20)
		//dd($users);
		// вызов Шаблона:  "resources/views/index.blade.php"
		return view('index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
		return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
	 */
	//Добавление нового пользователя - Получения данных:
    public function store(UserRequest $request): \Illuminate\Http\RedirectResponse
    {
		// Вставляем данные в базу:
		User::create($request->only(['name', 'email']));
        //dd($request->all());
		// И вернуть всё это редиректом на:		Вернуться на страницу списка
		//return redirect()->route('users.index');
		return redirect()->route('users.index')->withSuccess('Created user: '.$request->name);;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user): View
    {
		return view('show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user): View
    {
		return view('form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(UserRequest $request, User $user)
    {
        //dd($request->all());
		$user->update($request->only(['name', 'email']));
		// И после этого нужно возвращаться на страницу index
		//return redirect()->route('users.index');
		return redirect()->route('users.index')->withSuccess('Обновлён пользователь '.$user->name);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
	 */
	// Удаление пользователя:
    public function destroy(User $user)
    {
		$user->delete();
		// И после этого возвращаемся на другую страницу:	index
		//return redirect()->route('users.index');
		return redirect()->route('users.index')->withDanger('Удалён пользователь '.$user->name);
    }
}

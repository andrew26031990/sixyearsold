<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Models\User;
use App\Models\Users;
use App\Repositories\UsersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Response;

class UsersController extends AppBaseController
{
    /** @var  UsersRepository */
    private $usersRepository;

    public function __construct(UsersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
    }

    /**
     * Display a listing of the Users.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = DB::table('users')->select('id', 'name', 'email', 'role', 'lang')->paginate(10);

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new Users.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created Users in storage.
     *
     * @param CreateUsersRequest $request
     *
     * @return Response
     */
    public function store(CreateUsersRequest $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|unique:users,email',
            'password' => 'min:6|required',
            'role'=>[ 'not_regex:/^(no)$/i' ],
            'lang'=>'required'
        ]);
        Users::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role'=>$request->get('role'),
            'lang'=>$request->get('lang'),
        ]);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('users', $users);
    }

    /**
     * Update the specified Users in storage.
     *
     * @param int $id
     * @param UpdateUsersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsersRequest $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'role'=>[ 'not_regex:/^(no)$/i' ],
            'lang'=>'required'
        ]);

        $password = $request->get('password');

        if($password != null){
            $this->usersRepository->update(
                array(
                    'name'=>$request->get('name'),
                    'email'=>$request->get('email'),
                    'password'=>Hash::make($request->get('password')),
                    'role'=>$request->get('role'),
                    'lang'=>$request->get('lang'),
                ),
                $id);
        }else{
            $this->usersRepository->update(
                array(
                    'name'=>$request->get('name'),
                    'email'=>$request->get('email'),
                    'role'=>$request->get('role'),
                    'lang'=>$request->get('lang'),
                ),
                $id);
        }
        /*$users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $users = $this->usersRepository->update($request->all(), $id);*/

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified Users from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $this->usersRepository->delete($id);

        Flash::success('Users deleted successfully.');

        return redirect(route('users.index'));
    }

    public function setUserLanguage(){
        $user_id = $_GET['user_id'];
        $lang = $_GET['lang'];
        $this->usersRepository->update(array('lang' => $lang), $user_id);
        return $lang;
    }
}

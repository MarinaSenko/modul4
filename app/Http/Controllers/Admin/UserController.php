<?php
    namespace App\Http\Controllers\Admin;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Http\Requests;
    use App\User;

    class UserController extends Controller {
        public function __construct()
        {
            $this->middleware('auth');
        }

        public function index()
        {
            $users = User::orderBy('id', 'desc')->get();
            return view('admin.users.index')->with('users', $users);
        }

        public function show()
        {
        }

        public function edit($id)
        {
            $user = User::findOrFail($id);
            return view('admin.users.edit')->with('user', $user);
        }

        public function update($id, Request $request)
        {
            $this->validate($request, $rules = [
                'name'  => 'required|min:5',
                'email' => 'required|email'
            ]);
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return redirect('/admin/users')->with('message', 'Пользователь обнвлен');
        }

        public function destroy($id)
        {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect('admin/users');
        }
    }

<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $saleDirectorRepo;
    protected $role;

    public function __construct(UserRepositoryInterface $saleDirectorRepo)
    {
        $this->saleDirectorRepo = $saleDirectorRepo;
    }

    public function index()
    {
        switch ($this->role) {
            case $this->role == config('roles.sale_director'):
                $users = $this->saleDirectorRepo->getByRelation('role', config('roles.sale_director'));
                return view('admin.sale-directors.index', compact('users'));
                break;
            case $this->role == config('roles.sale'):
                $users = $this->saleDirectorRepo->getByRelation('role', config('roles.sale_director'));
                return view('admin.sale.index', compact('users'));
                break;
         }

    }

    public function create()
    {
        return view('admin.sale-directors.create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::where('phone', $request->phone)->where('role', config('roles.sale_director'))->first();
        if (!isset($user)) {
            $data = $this->saveDataToDB($request);
            $data['role'] = config('roles.sale_director');
            $this->saleDirectorRepo->create($data);

            return redirect()->route('admin.sale-directors.index')->with('success', trans('messages.create_success'));
        }

        return redirect()->back()->withInput()->with('error', trans('messages.account_exist'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = $this->saleDirectorRepo->getById($id);

        return view('admin.sale-directors.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $data = $this->saveDataToDB($request);
        $this->saleDirectorRepo->update($id, $data);

        return redirect()->route('admin.sale-directors.index')->with('success', trans('messages.update_success'));
    }

    public function destroy($id)
    {
        try {
            $user = $this->saleDirectorRepo->getById($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors($exception->getMessage()->withInput());
        }

        $user->delete();

        return redirect()->back()->with('success', trans('Xóa bản ghi thành công!'));;
    }

    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->blocked = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function saveDataToDB(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt('123456789');
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $extension = $avatar->getClientOriginalExtension();
            Storage::disk('public')->put($avatar->getFilename().'.'.$extension,  File::get($avatar));

            $data['avatar'] = 'images/' . $avatar->getFilename() . '.' . $extension;
        } else {
            $data['avatar'] = config('path.default');
        }

        return $data;
    }
}

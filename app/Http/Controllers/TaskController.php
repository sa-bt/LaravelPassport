<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $user = Auth::user();
        return view('welcome', compact('user'));
    }

    /**
     * @return Factory|View
     */
    public function add()
    {
        return view('add');
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);
        $task = new Task();
        $task->description = $request->description;
        $task->user_id = Auth::id();
        $task->save();
        return redirect('/');
    }

    /**
     * @param Task $task
     *
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function edit(Task $task)
    {

        if (Auth::check() && Auth::user()->id == $task->user_id) {
            return view('edit', compact('task'));
        } else {
            return redirect('/');
        }
    }

    /**
     * @param Request $request
     * @param Task $task
     *
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function update(Request $request, Task $task)
    {
        if (isset($_POST['delete'])) {
            $task->delete();
            return redirect('/');
        } elseif (isset($_POST['done'])) {
            $task->description = $task->description . ' : ' . 'Done';
            $task->save();
            return redirect('/');
        } else {
            $this->validate($request, [
                'description' => 'required'
            ]);
            $task->description = $request->description;
            $task->save();
            return redirect('/');
        }
    }
}

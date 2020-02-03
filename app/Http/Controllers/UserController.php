<?php
namespace App\Http\Controllers;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface
                                $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function viewAll(Request $request)
    {
        $users = $this->userRepository->getAll();

        return response()->json([
            'data' => $users
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function view($userID)
    {
        $user = $this->userRepository->find($userID);

        if (! $user) {
            return response()->json([
                'message' => "User Not Found"
            ]);
        }

        return response()->json([
            'data' => $user
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $userData = $request->all();

        $this->userRepository->create($userData);

        return response()->json([
            'message' => "User Created"
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function update(Request $request, $userID)
    {
        $userData = $request->all();

        $this->userRepository->update($userID, $userData);

        return response()->json([
            'message' => "User Updated"
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function delete($userID)
    {
        $user = $this->userRepository->find($userID);

        if (!$user) {
            return response()->json([
                'message' => "User Not Found"
            ]);
        }

        $this->userRepository->delete($userID);

        return response()->json([
            'message' => "User Deleted"
        ]);
    }
}
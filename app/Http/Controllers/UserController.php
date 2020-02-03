<?php
namespace App\Http\Controllers;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $userRepository;

    // inject user repository interface
    public function __construct(UserRepositoryInterface
                                $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * View all user records
     *
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
     * View particular user detail
     *
     * @param $userID
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
     * Create a user record
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $userData = $request->all();

        $validator = Validator::make($userData, User::$rules);

        if (!$this->validateRequest($validator)) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        $this->userRepository->create($userData);

        return response()->json([
            'message' => "User Created"
        ]);
    }

    /**
     * Update a user
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function update(Request $request, $userID)
    {
        $userData = $request->all();

        $validator = Validator::make($userData, User::getRules('update', $userID));

        if (!$this->validateRequest($validator)) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        $user = $this->userRepository->find($userID);

        $this->userRepository->update($user, $userData);

        return response()->json([
            'message' => "User Updated"
        ]);
    }

    /**
     * Delete user
     *
     * @param $userID
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
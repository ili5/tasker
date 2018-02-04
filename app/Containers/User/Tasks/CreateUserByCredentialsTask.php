<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Data\Repositories\UserRepository;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

/**
 * Class CreateUserByCredentialsTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class CreateUserByCredentialsTask extends Task
{

    /**
     * @param bool        $isClient
     * @param string      $email
     * @param string      $password
     * @param string|null $name
     *
     * @return  mixed
     */
    public function run(
        bool $isClient = true,
        string $email,
        string $password,
        string $name = null
    ): User {

        try {
            // create new user
            $user = App::make(UserRepository::class)->create([
                'password'  => Hash::make($password),
                'email'     => $email,
                'name'      => $name,
                'is_client' => $isClient,
            ]);

        } catch (Exception $e) {
            throw (new CreateResourceFailedException())->debug($e);
        }

        return $user;
    }

}

<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * Users mailer.
 */
class UsersMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'Users';

    

    public function welcome($user)
    {
        $this
            ->setTo('duongquan54@gmail.com')
            ->addBcc('quandv.125@gmail.com')
            ->setSubject(sprintf('Welcome %s', 'quan'));
            // ->setTemplate('welcome_mail') // By default template with same name as method name is used.
            // ->setLayout('custom');
    }

    public function resetPassword($user)
    {
        $this
            ->setTo($user->email)
            ->setSubject('Reset password')
            ->set(['token' => $user->token]);
    }

}

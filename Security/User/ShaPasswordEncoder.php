<?php

namespace FR3D\LdapBundle\Security\User;

use Symfony\Component\Security\Core\Encoder\BasePasswordEncoder;

class ShaPasswordEncoder extends BasePasswordEncoder
{
    public function encodePassword($raw, $salt = '')
    {
        return '{SHA}' . base64_encode(hash('sha1', $raw, true));
    }

    public function isPasswordValid($encoded, $raw, $salt = '')
    {
        return $this->comparePasswords($encoded, $this->encodePassword($raw, $salt));
    }
}

<?php

interface LoginInterface
{
    public function authenticateUser();
}

class NormalUser implements LoginInterface 
{
    public function authenticateUser()
    {
        return "normal user logged in via username and password";
    }
}

class GmailUser implements LoginInterface 
{
    public function authenticateUser()
    {
        return "user logged in via gmail account";
    }
}

class GithubUser implements LoginInterface
{
    public function authenticateUser()
    {
        return "user logged in via github account";
    }
}

class LoginModule
{
    public function login(LoginInterface $user)
    {
        return $user->authenticateUser();
    }
}

echo (new LoginModule())->login(new GmailUser());

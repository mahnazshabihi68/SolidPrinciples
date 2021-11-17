<?php

interface Codeble
{
    public function code();
}

interface Testable
{
    public function test();
}

class Programmer implements Codeble, Testable 
{
    public function code()
    {
        return 'coding';
    }

    public function test()
    {
        return 'testing';
    }
}

class Tester implements Testable 
{
    public function test()
    {
        return 'testing';
    }
}

class ProjectManagement 
{
    public function processCode(Codeble $member)
    {
        return $member->code();
    }

    public function processTest(Testable $member)
    {
        return $member->test();
    }
}


$sample = new ProjectManagement();
echo $sample->processCode(new Programmer());

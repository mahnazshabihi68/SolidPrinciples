<?php

interface Workable
{
    public function work();
}


class Programmer implements Workable
{
    public function work()
    {
        return 'coding';
    }
}

class Tester implements Workable
{
    public function work()
    {
        return 'testing';
    }
}

class Developer implements Workable
{
    public function work()
    {
        return 'develop';
    }
}

class ProjectManagement
{
    public function process($member)
    {
        return $member->work();
    }
}


$sampleOne = new Tester();
$sampleTow = new Developer();
$sampleThree = new Programmer();

$pm = new ProjectManagement();
$pm->process($sampleOne);
print_r($pm->process($sampleOne));
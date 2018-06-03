<?php

use PHPUnit\Framework\TestCase;

class test extends TestCase
{
     
    /**
     * @dataProvider dataProvider
     */
    public function testDatabaseConnection($host, $user, $pass, $db, $expected)
    {
        error_reporting(0);
        $db = connectDatabase($host, $user, $pass, $db);
        $this->assertTrue(($db instanceof mysqli));
        $this->assertTrue(($db->connect_error == NULL) == $expected);
    }

    public function dataProvider() {
        return [
            ["localhost", "root", "", "group project", true],
            ["localhost", "root", "invalid", "group project", false],
            ["localhost", "root", "", "group project2", false],
        ];
    }

}


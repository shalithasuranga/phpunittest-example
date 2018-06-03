
<?php

use PHPUnit\Framework\TestCase;

class test extends TestCase
{

    /**
     * @dataProvider dataProvider
     */

    public function testAdminLoginCorrect($username, $password, $expected) {
        $user = adminLogin($username, $password);
        $this->assertTrue(($user["username"] == $username) == $expected);
    }
    

    public function dataProvider() {
        return [
            ["test", "test", false],
            ["admin", "admin", true],
        ];
    }


}
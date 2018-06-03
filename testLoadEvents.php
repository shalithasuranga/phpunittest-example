
<?php

use PHPUnit\Framework\TestCase;

class test extends TestCase {

    /**
     * @dataProvider dataProvider
     */
    public function testLoadEvents($limit, $expected) {
        $events = loadEvents($limit);
        $this->assertInternalType("object", $events);
        $this->assertTrue($events->num_rows == $expected);

    }

    public function dataProvider() {
        return [
            [2, 2],
            [0, 0],
            [1, 1]
        ];
    }

    

}
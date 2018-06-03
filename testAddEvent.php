
<?php

use PHPUnit\Framework\TestCase;



class test extends TestCase {
    /**
     * @dataProvider dataProvider
     */
    public function testAddEvent($name, $cat, $date, $time, $venue, $desc, $expected) {
        $data = [
            "name" => $name,
            "categories" => $cat,
            "date" => $date,
            "time" => $time,
            "avenue" => $venue,
            "description" => $desc
        ];
        $event = addEvent($data, "admin");
        $this->assertTrue($event["id"] > 0 == $expected);
        $this->assertTrue(($event["name"] == $name) == $expected);
        $this->assertTrue(($event["event_categories"] == $cat) == $expected);
        $this->assertTrue(($event["event_date"] == $date) == $expected);
        $this->assertTrue(($event["event_avenue"] == $venue) == $expected);
        $this->assertTrue(($event["event_description"] == $desc) == $expected);
        $this->assertTrue(($event["event_posted_by"] == "admin" ) == $expected);

    }

    public function dataProvider() {
        return [
            ["test", "test", "2018-10-10", "10:30", "test", "test", true],
            ["test", "test", "123213", "10:30", "test", "test", false]
        ];
    }
    

}
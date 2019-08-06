<?php
require_once '../function.php';

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    public function testGenerateRequestShouldReturnEverythingIfNoParameter()
    {
        //setup
        $result = generateRequest();
        $expectedResult = 'SELECT `item`, `category`, `price`, `remaining` FROM `grocery_item`';


        //assertion
        $this->assertEquals($result, $expectedResult);
    }
}
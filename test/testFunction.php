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

    public function testGenerateRequestShouldReturnWhereCategoryWithParam()
    {
        //setup
        $filter = 'pantry';
        $result = generateRequest($filter);
        $expectedResult = 'SELECT `item`, `category`, `price`, `remaining` FROM `grocery_item` WHERE `category` = "' . $filter.  '";';

        //assertion
        $this->assertEquals($result, $expectedResult);
    }
}
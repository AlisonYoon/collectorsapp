<?php

require_once '../functions.php';

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    public function testGenerateRequest_ShouldReturnEverythingIfNoParameter()
    {
        $result = generateRequest();
        $expectedResult = 'SELECT `item`, `category`, `price`, `remaining` FROM `grocery_item`';

        $this->assertEquals($result, $expectedResult);
    }

    public function testGenerateRequest_ShouldReturnWhereCategoryWithParam()
    {
        $filter = 'pantry';
        $expectedResult = 'SELECT `item`, `category`, `price`, `remaining` FROM `grocery_item` WHERE `category` = "' . $filter.  '";';
        $result = generateRequest($filter);

        $this->assertEquals($result, $expectedResult);
    }

    public function testGenerateRequest_ShouldReturnTypeError()
    {
        $arrayParam = [1,2];

        $this->expectException(TypeError::class);
        generateRequest($arrayParam);
    }

    public function testProcessData_ShouldTakeArrayReturnString()
    {
        $dummyArray = [['item'=>'milk', 'category'=>'OTHER', 'price'=>3204, "remaining"=>50], ['item'=>'randoms', 'category'=>'OTHER', 'price'=>100, "remaining"=>0]];

        $result = processData($dummyArray);
        $expectedResult = '<div class="item-row"><ul><li><span>Item</span>milk</li><li class="OTHER-row">OTHER</li><li><span>Price(pense)</span>3204</li><li><span>Remaining(%)</span>50</li></ul></div><div class="item-row"><ul><li><span>Item</span>randoms</li><li class="OTHER-row">OTHER</li><li><span>Price(pense)</span>100</li><li><span>Remaining(%)</span>0</li></ul></div>';

        $this->assertEquals($result, $expectedResult);
    }

    public function testProcessData_ShouldReturnTypeError()
    {
        $someNum = 10;

        $this->expectException(TypeError::class);
        processData($someNum);
    }

    public function testCurrentFilter_ShouldTakeStringReturnString()
    {
        $dummyCategory = "freezer";

        $result = currentFilter($dummyCategory);
        $expectedReseult = "<li><a class=\"all\" href=\"index.php?category=all\">All</a></li>
        <li><a class=\"pantry\" href=\"index.php?category=pantry\">Pantry</a></li>
        <li><a class=\"fridge\" href=\"index.php?category=fridge\">Fridge</a></li>
        <li><a class=\"freezer current\" href=\"index.php?category=freezer\">Freezer</a></li>
        <li><a class=\"produce\" href=\"index.php?category=produce\">Produce</a></li>
        <li><a class=\"other\" href=\"index.php?category=other\">Other</a></li>";

        $this->assertEquals($result, $expectedReseult);
    }

    public function testCurrentFilter_ShouldReturnTypeError()
    {
        $dummyArray = [['item'=>'milk', 'category'=>'OTHER', 'price'=>3204, "remaining"=>50], ['item'=>'randoms', 'category'=>'OTHER', 'price'=>100, "remaining"=>0]];

        $this->expectException(TypeError::class);
        currentFilter($dummyArray);
    }
}
<?php

namespace Tests\Clients;

use JC\BrDocs\Clients\Cnpj;
use PHPUnit\Framework\TestCase;

class CnpjTest extends TestCase
{
    /**
     * @dataProvider normalizeProvider
     */
    public function testNormalize($document, $expectedResult)
    {
        $obj = new Cnpj($document);
        $result = $obj->normalize()->get();

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @dataProvider isValidProvider
     */
    public function testIsValid($document, $expectedResult)
    {
        $obj = new Cnpj($document);
        $result = $obj->isValid();

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @dataProvider formatProvider
     */
    public function testFormat($document, $expectedResult)
    {
        $obj = new Cnpj($document);
        $result = $obj->format()->get();

        $this->assertEquals($expectedResult, $result);
    }

    public function normalizeProvider()
    {
        yield 'should_input_valid_data_1' => [
            'document' => '03.939.810/0001-04',
            'expectedResult' => '03939810000104',
        ];
        yield 'should_input_valid_data_2' => [
            'document' => '03939810000104',
            'expectedResult' => '03939810000104',
        ];
        yield 'should_input_valid_data_3' => [
            'document' => '3939810000104',
            'expectedResult' => '03939810000104',
        ];
        yield 'should_input_valid_data_4' => [
            'document' => '3939810000104ABCD',
            'expectedResult' => '03939810000104',
        ];
    }

    public function isValidProvider()
    {
        yield 'should_input_valid_data_1' => [
            'document' => '03.939.810/0001-04',
            'expectedResult' => true,
        ];
        yield 'should_input_valid_data_2' => [
            'document' => '03939810000104',
            'expectedResult' => true,
        ];
        yield 'should_input_valid_data_3' => [
            'document' => '3939810000104',
            'expectedResult' => false,
        ];
        yield 'should_input_valid_data_4' => [
            'document' => '3939810000104ABCD',
            'expectedResult' => false,
        ];
    }

    public function formatProvider()
    {
        yield 'should_input_valid_data_1' => [
            'document' => '03.939.810/0001-04',
            'expectedResult' => '03.939.810/0001-04',
        ];
        yield 'should_input_valid_data_2' => [
            'document' => '03939810000104',
            'expectedResult' => '03.939.810/0001-04',
        ];
    }
}

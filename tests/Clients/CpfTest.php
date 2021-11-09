<?php

namespace Tests\Clients;

use JC\BrDocs\Clients\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    /**
     * @dataProvider normalizeProvider
     */
    public function testNormalize($document, $expectedResult)
    {
        $obj = new Cpf($document);
        $result = $obj->normalize()->get();

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @dataProvider isValidProvider
     */
    public function testIsValid($document, $expectedResult)
    {
        $obj = new Cpf($document);
        $result = $obj->isValid();

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @dataProvider formatProvider
     */
    public function testFormat($document, $expectedResult)
    {
        $obj = new Cpf($document);
        $result = $obj->format()->get();

        $this->assertEquals($expectedResult, $result);
    }

    public function normalizeProvider()
    {
        yield 'should_input_valid_data_1' => [
            'document' => '059.440.570-09',
            'expectedResult' => '05944057009',
        ];
        yield 'should_input_valid_data_2' => [
            'document' => '05944057009',
            'expectedResult' => '05944057009',
        ];
        yield 'should_input_valid_data_3' => [
            'document' => '5944057009',
            'expectedResult' => '05944057009',
        ];
        yield 'should_input_valid_data_4' => [
            'document' => '5944057009ABCD',
            'expectedResult' => '05944057009',
        ];
    }

    public function isValidProvider()
    {
        yield 'should_input_valid_data_1' => [
            'document' => '059.440.570-09',
            'expectedResult' => true,
        ];
        yield 'should_input_valid_data_2' => [
            'document' => '05944057009',
            'expectedResult' => true,
        ];
        yield 'should_input_valid_data_3' => [
            'document' => '5944057009',
            'expectedResult' => false,
        ];
        yield 'should_input_valid_data_4' => [
            'document' => '5944057009ABCD',
            'expectedResult' => false,
        ];
    }

    public function formatProvider()
    {
        yield 'should_input_valid_data_1' => [
            'document' => '059.440.570-09',
            'expectedResult' => '059.440.570-09',
        ];
        yield 'should_input_valid_data_2' => [
            'document' => '05944057009',
            'expectedResult' => '059.440.570-09',
        ];
    }
}

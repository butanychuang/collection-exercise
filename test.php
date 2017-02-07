<?php
require __DIR__ . '/vendor/autoload.php';

class TransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider sampleProvider
     */
    public function testTransformer($records, $meta, $expectation)
    {
        $transformer = new Transformer();
        $result = $transformer->transform($records, $meta);
        $this->assertEquals($expectation, $result);
    }

    public function sampleProvider()
    {
        require __DIR__ . '/testdata/records.php';
        require __DIR__ . '/testdata/meta.php';
        require __DIR__ . '/testdata/expectation.php';
        return [
            [$transData, ['company' => $company, 'class' => $class, 'type' => $type], $result]
        ];
    }
}

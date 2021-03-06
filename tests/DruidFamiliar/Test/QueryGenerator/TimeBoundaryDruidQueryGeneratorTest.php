<?php

namespace DruidFamiliar\Test\QueryGenerator;

use DruidFamiliar\QueryParameters\TimeBoundaryQueryParameters;
use PHPUnit_Framework_TestCase;

class TimeBoundaryDruidQueryGeneratorTest extends PHPUnit_Framework_TestCase
{
    public function testGenerateQuery()
    {
        $mockDataSourceName = 'referral-test';

        $q = new \DruidFamiliar\QueryGenerator\TimeBoundaryDruidQueryGenerator();
        $p = new TimeBoundaryQueryParameters($mockDataSourceName);

        $query = $q->generateQuery($p);

        $query = json_decode( $query, true );

        $this->assertArrayHasKey('queryType', $query);
        $this->assertArrayHasKey('dataSource', $query, "Generated query must include required parameters.");

        $this->assertEquals('timeBoundary', $query['queryType'], "Generated query must have timeBoundary for its queryType.");
        $this->assertEquals($mockDataSourceName, $query['dataSource'], "Generated query must use provided dataSource.");
    }
}

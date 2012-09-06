<?php

namespace Balanced\Test;

\Balanced\Bootstrap::init();
\Httpful\Bootstrap::init();

use Balanced\Core\URISpec;
use Balanced\Core\Client;
use Balanced\Core\Resource;
use Balanced\Core\Query;
use Balanced\Core\Page;
use Balanced\Marketplace;

class URISpecTest extends \PHPUnit_Framework_TestCase
{
    function testNoRoot()
    {
        $uri_spec = new URISpec('grapes', 'seed');
        $this->assertEquals($uri_spec->collection_uri, null);
        
        $result = $uri_spec->match('/some/raisins');
        $this->assertEquals($result, null);
        
        $result = $uri_spec->match('/some/grapes');
        $this->assertEquals($result, array('collection' => true));
        
        $result = $uri_spec->match('/some/grapes/1234');
        $expected = array(
            'collection' => false,
            'ids' => array('seed' => '1234')
            ); 
        $this->assertEquals($expected, $result);
    }
    
    function testSingleId()
    {
        $uri_spec = new URISpec('tomatoes', 'stem', '/v1');
        $this->assertNotEquals($uri_spec->collection_uri, null);
        
        $result = $uri_spec->match('/some/tomatoes/that/are/green');
        $this->assertEquals($result, null);
        
        $result = $uri_spec->match('/some/tomatoes');
        $this->assertEquals($result, array('collection' => true));
        
        $result = $uri_spec->match('/some/tomatoes/4321');
        $expected = array(
            'collection' => false,
            'ids' => array('stem' => '4321')
            );
        $this->assertEquals($expected, $result);
    }
    
    function testMultipleIds()
    {
        $uri_spec = new URISpec('tomatoes', array('stem', 'root'), '/v1');
        $this->assertNotEquals($uri_spec->collection_uri, null);
        
        $result = $uri_spec->match('/some/tomatoes/that/are/green');
        $this->assertEquals($result, null);
        
        $result = $uri_spec->match('/some/tomatoes');
        $this->assertEquals($result, array('collection' => true));
        
        $result = $uri_spec->match('/some/tomatoes/4321/1234');
        $expected = array(
            'collection' => false,
            'ids' => array('stem' => '4321', 'root' => '1234')
            );
        $this->assertEquals($expected, $result);
    }
}

class QueryTest extends \PHPUnit_Framework_TestCase
{
    function testParse()
    {
        $uri = '/some/uri?field2=123&sort=field5%2Cdesc&limit=101&field3.field4%5Bcontains%5D=hi';
        $query = new Query('Balanced\Marketplace', $uri);
        $expected = array(
            'field2' => array('123'),
            'field3.field4[contains]' => array('hi')
            );
        $this->assertEquals($query->filters, $expected);
        $expected = array('field5,desc');
        $this->assertEquals($query->sorts, $expected);
        $this->assertEquals($query->size, 101);
    }

    function testBuild()
    {
        $query = new Query('Balanced\Marketplace', '/some/uri');
        $query->filter(Marketplace::$f->name->eq('Wonka Chocs'))
              ->filter(Marketplace::$f->support_email->endswith('gmail.com'))
              ->filter(Marketplace::$f->variable_fee_percentage->gte(3.5))
              ->sort(Marketplace::$f->name->asc())
              ->sort(Marketplace::$f->variable_fee_percentage->desc())
              ->limit(101);
        $this->assertEquals(
            $query->filters,
            array(
                'name' => array('Wonka Chocs'),
                'support_email[contains]' => array('gmail.com'),
                'variable_fee_percentage[>=]'=> array(3.5)
                )
            );
        $this->assertEquals(
            $query->sorts,
            array('name,asc', 'variable_fee_percentage,desc')
            );
        $this->assertEquals(
            $query->size,
            101
            );
    }
}

class PageTest extends \PHPUnit_Framework_TestCase
{
    function testConstruct()
    {
        $data = new \stdClass();
        $data->first_uri = 'some/first/uri';
        $data->previous_uri = 'some/previous/uri';
        $data->next_uri = null;
        $data->last_uri = 'some/last/uri';
        $data->limit= 25;
        $data->offset = 0;
        $data->total = 101;
        $data->items = array();

        $page = new Page(
            'Balanced\Marketplace',
            '/some/uri',
            $data
            );
        
        $this->assertEquals($page->resource, 'Balanced\Marketplace');
        $this->assertEquals($page->total, 101);
        $this->assertEquals($page->items, array());
        $this->assertTrue($page->hasPrevious());
        $this->assertFalse($page->hasNext());
    }
}

class ResourceTest extends \PHPUnit_Framework_TestCase
{
    function testQuery()
    {
        $query = Marketplace::query();
        $this->assertEquals(get_class($query), 'Balanced\Core\Query');
    }
}

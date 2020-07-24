<?php

namespace Tests;

use Orchestra\Testbench\TestCase;
use JianJye\LaravelBasicSearchServiceProvider;
use JianJye\Models\Colour;
use Illuminate\Http\Request;
use JianJye\LaravelBasicSearch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class LaraveBasicSearchTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [LaravelBasicSearchServiceProvider::class];
    }

    /** @test */
    public function it_can_access_the_database()
    {
        $this->assertEquals(6, count(Colour::all()));
    }

    /** @test */
    public function using_normal_search_function_success()
    {
        $fields = ['name'];
        $ranges = [];
        $sorts = ['name', 'created_at',];

        $colours = new Colour();

        $request = new Request();
        $request->setMethod('GET');
        $request->headers->set('key','value');
        $request->query->add(['name' => 'red']);

        $colours = LaravelBasicSearch::fuzzySearch($request, $colours, $fields, $ranges, $sorts);
        $colours = $colours->first();

        $this->assertSame($colours->name, 'red');
    }

    /** @test */
    public function using_fuzzy_search_function_success()
    {
        $fields = ['name'];
        $ranges = [];
        $sorts = ['name', 'created_at',];

        $colours = new Colour();

        $request = new Request();
        $request->setMethod('GET');
        $request->headers->set('key','value');
        $request->query->add(['name' => 'black']);

        $colours = LaravelBasicSearch::fuzzySearch($request, $colours, $fields, $ranges, $sorts);
        $colours = $colours->get();

        $this->assertEquals(3, count($colours));
    }

}

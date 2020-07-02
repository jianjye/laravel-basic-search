<?php

namespace Jianjye\LaravelBasicSearch\Tests;

use Orchestra\Testbench\TestCase;
use Jianjye\LaravelBasicSearch\LaravelBasicSearchServiceProvider;
use Jianjye\LaravelBasicSearch\Models\Colour;
use Illuminate\Http\Request;
use Jianjye\LaravelBasicSearch\LaravelBasicSearch;

class LaraveBasicSearchTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelBasicSearchServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        include_once __DIR__.'/../src/database/migrations/create_colours_table.stub.php';
        (new \CreateColoursTable)->up();
    }

    /** @test */
    public function it_can_access_the_database()
    {
        $colour = new Colour();
        $colour->name = 'blue';
        $colour->save();

        $newColour = Colour::find($colour->id);

        $this->assertSame($newColour->name, 'blue');
    }

    /** @test */
    public function using_normal_search_function_success()
    {
        factory(Colour::class, 5)->create();
        factory(Colour::class)->create(['name' => 'rareColour']);

        $fields = ['name'];
        $ranges = [];
        $sorts = ['name', 'created_at',];

        $colours = new Colour();

        $request = new Request();
        $request->setMethod('GET');
        $request->headers->set('key','value');
        $request->query->add(['name' => 'rareColour']);

        $colours = LaravelBasicSearch::fuzzySearch($request, $colours, $fields, $ranges, $sorts);
        $colours = $colours->first();

        $this->assertSame($colours->name, 'rareColour');
    }

    /** @test */
    public function using_fuzzy_search_function_success()
    {
        factory(Colour::class, 5)->create();
        factory(Colour::class)->create(['name' => 'Dark rare']);
        factory(Colour::class)->create(['name' => 'Light rare']);
        factory(Colour::class)->create(['name' => 'Medium rare']);

        $fields = ['name'];
        $ranges = [];
        $sorts = ['name', 'created_at',];

        $colours = new Colour();

        $request = new Request();
        $request->setMethod('GET');
        $request->headers->set('key','value');
        $request->query->add(['name' => 'rare']);

        $colours = LaravelBasicSearch::fuzzySearch($request, $colours, $fields, $ranges, $sorts);
        $colours = $colours->get();

        $this->assertEquals(3, count($colours));
    }
}

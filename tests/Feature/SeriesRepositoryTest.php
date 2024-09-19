<?php
namespace Tests\Feature;

use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_when_a_series_is_created_its_seasons_and_episodes_must_also_be_created()
    {
        $repository = $this->app->make(SeriesRepository::class);

        // Criando uma instância do SeriesFormRequest sem o contêiner do Laravel
        $request = new SeriesFormRequest();
        $request->merge([
            'name' => 'Nome da série',
            'seasons' => 1,
            'episodes' => 1,
        ]);

        // Validando manualmente os dados no teste
        $this->app['validator']->validate($request->all(), $request->rules());

        // Act
        $repository->add($request);

        // Assert
        $this->assertDatabaseHas('series', ['name' => 'Nome da série']);
        $this->assertDatabaseHas('seasons', ['number' => 1]);
        $this->assertDatabaseHas('episodes', ['number' => 1]);
    }
}

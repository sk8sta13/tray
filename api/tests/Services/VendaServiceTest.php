<?php

namespace Tests\Services;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\Services\VendaService;
use Illuminate\Http\JsonResponse;
use App\Repositories\Eloquent\VendaRepository;
use Illuminate\Validation\ValidationException;

class VendaServiceTest extends TestCase
{
    protected $repository;
    protected $service;

    protected function setUp(): void
    {
        $this->createApplication();
        $this->repository = $this->createMock(VendaRepository::class);
        $this->service = new VendaService($this->repository);
    }

    public function testCreate()
    {
        $requestData = ['vendedor_id' => 6, 'valor_venda' => 5.52];

        $request = Request::create('/vendas', 'POST', $requestData);

        $this->repository->expects($this->once())
            ->method('create')
            ->with($requestData)
            ->willReturn($requestData);

        $response = $this->service->create($request);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals($requestData, $response->getData(true));
    }

    public function testCreateInvalidRequest()
    {
        $request = Request::create('/vendas', 'POST', ['vendedor_id' => 1]);

        $this->expectException(ValidationException::class);

        $this->service->create($request);
    }
}

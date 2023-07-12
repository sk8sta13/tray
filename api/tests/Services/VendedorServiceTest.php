<?php

namespace Tests\Services;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\Services\VendedorService;
use App\Repositories\Eloquent\VendedorRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use App\Models\Vendedor;

class VendedorServiceTest extends TestCase
{
    protected $repository;
    protected $service;

    protected function setUp(): void
    {
        $this->createApplication();
        $this->repository = $this->createMock(VendedorRepository::class);
        $this->service = new VendedorService($this->repository);
    }

    public function testCreate()
    {
        $requestData = ['nome' => 'Nome do Vendedor', 'email' => 'email@vendedor'];

        $request = Request::create('/vendedores', 'POST', $requestData);

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
        $request = Request::create('/vendedores', 'POST', ['nome' => '']);

        $this->expectException(ValidationException::class);

        $this->service->create($request);
    }

    public function testReadAll()
    {
        $this->repository->expects($this->once())
            ->method('all')
            ->willReturn([]);

        $response = $this->service->all();

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals([], $response->getData(true));
    }

    public function testReadFindSuccess()
    {
        $this->repository->expects($this->once())
            ->method('find')
            ->with(1)
            ->willReturn(['nome' => 'teste']);

        $response = $this->service->find(1);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(['nome' => 'teste'], $response->getData(true));
    }

    public function testReadFindEmpty()
    {
        $this->repository->expects($this->once())
            ->method('find')
            ->with(1)
            ->willReturn([]);

        $response = $this->service->find(1);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(204, $response->getStatusCode());
        $this->assertEquals([], $response->getData(true));
    }

    public function testUpdate()
    {
        $requestData = ['nome' => 'Nome do Vendedor', 'email' => 'email@vendedor'];

        $request = Request::create('/vendedores', 'PUT', $requestData);

        $this->repository->expects($this->once())
            ->method('update')
            ->with(1, $requestData)
            ->willReturn($requestData);

        $response = $this->service->update(1, $request);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($requestData, $response->getData(true));
    }

    public function testeUpdateInvalidRequest()
    {
        $request = Request::create('/vendedores/1', 'PUT', []);

        $this->expectException(ValidationException::class);

        $this->service->update(1, $request);
    }

    public function testeDelete()
    {
        $this->repository->expects($this->once())
            ->method('delete')
            ->with(1)
            ->willReturn(1);

        $response = $this->service->delete(1);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(204, $response->getStatusCode());
        $this->assertEquals('', $response->getData(true));
    }

    public function testDeleteFail()
    {
        $this->repository->expects($this->once())
            ->method('delete')
            ->with(1)
            ->willReturn(0);

        $response = $this->service->delete(1);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals(['error' => 'Resource not found'], $response->getData(true));
    }
}

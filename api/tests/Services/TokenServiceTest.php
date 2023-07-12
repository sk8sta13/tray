<?php

namespace Tests\Services;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\Services\TokenService;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Firebase\JWT\JWT;

class TokenServiceTest extends TestCase
{
    protected $repository;
    protected $service;

    protected function setUp(): void
    {
        $this->createApplication();
        $this->repository = $this->createMock(UserRepository::class);
        $this->service = new TokenService($this->repository);
    }

    public function testGetTokenSuccess()
    {
        $user = new \stdClass();
        $user->email = 'teste@teste.com.br';
        $user->password = Hash::make('123456');

        $this->repository->expects($this->once())
            ->method('search')
            ->with(['email' => 'teste@teste.com.br'])
            ->willReturn([$user]);

        $request = Request::create('/meutoken', 'POST', [
            'email' => 'teste@teste.com.br', 
            'password' => '123456'
        ]);
        $response = $this->service->getToken($request);

        $this->assertEquals(['access_token' => JWT::encode(['email' => 'teste@teste.com.br'], env('JWT_KEY'))], $response);
    }

    public function testGetTokenFail()
    {
        $this->repository->expects($this->once())
            ->method('search')
            ->with(['email' => 'teste1@teste.com.br'])
            ->willReturn([]);

        $tokenService = new TokenService($this->repository);
        $request = Request::create('/meutoken', 'POST', [
            'email' => 'teste1@teste.com.br', 
            'password' => '123456'
        ]);
        $response = $this->service->getToken($request);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(401, $response->getStatusCode());
        $this->assertEquals('"Not authorized"', $response->getContent());
    }
}

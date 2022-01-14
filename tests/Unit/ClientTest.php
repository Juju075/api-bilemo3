<?php
declare(strict_types = 1); 
namespace App\Tests\Unit;

use App\Entity\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase  
{
    private Client $clientResource;

    protected function setUp(): void
    {
        parent::setUp();
        $this->clientResource = new Client();
    }
    public function testGetEmail():void
    {
        //test aussi les fonctions associe
    }
    public function testGetRoles():void
    {
        
    }

}
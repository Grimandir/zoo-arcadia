<?php

use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    protected $pdo;

    protected function setUp(): void
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=zoo_arcadia_test', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function testAddService()
    {
        $stmt = $this->pdo->prepare("INSERT INTO services (name, description) VALUES (?, ?)");
        $result = $stmt->execute(['Test Service', 'Test Description']);
        $this->assertTrue($result);

        $stmt = $this->pdo->query("SELECT * FROM services WHERE name = 'Test Service'");
        $service = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->assertNotEmpty($service);
        $this->assertEquals('Test Service', $service['name']);
        $this->assertEquals('Test Description', $service['description']);
    }

    public function testEditService()
    {
        $stmt = $this->pdo->prepare("INSERT INTO services (name, description) VALUES (?, ?)");
        $stmt->execute(['Test Service', 'Test Description']);

        $stmt = $this->pdo->prepare("UPDATE services SET name = ?, description = ? WHERE name = ?");
        $result = $stmt->execute(['Updated Service', 'Updated Description', 'Test Service']);
        $this->assertTrue($result);

        $stmt = $this->pdo->query("SELECT * FROM services WHERE name = 'Updated Service'");
        $service = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->assertNotEmpty($service);
        $this->assertEquals('Updated Service', $service['name']);
        $this->assertEquals('Updated Description', $service['description']);
    }

    public function testDeleteService()
    {
        $stmt = $this->pdo->prepare("INSERT INTO services (name, description) VALUES (?, ?)");
        $stmt->execute(['Test Service', 'Test Description']);

        $stmt = $this->pdo->prepare("DELETE FROM services WHERE name = ?");
        $result = $stmt->execute(['Test Service']);
        $this->assertTrue($result);

        $stmt = $this->pdo->query("SELECT * FROM services WHERE name = 'Test Service'");
        $service = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->assertEmpty($service);
    }
}

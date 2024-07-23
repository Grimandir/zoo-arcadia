<?php

use PHPUnit\Framework\TestCase;

class HabitatTest extends TestCase
{
    protected $pdo;

    protected function setUp(): void
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=zoo_arcadia_test', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function testAddHabitat()
    {
        $stmt = $this->pdo->prepare("INSERT INTO habitats (name, description) VALUES (?, ?)");
        $result = $stmt->execute(['Test Habitat', 'Test Description']);
        $this->assertTrue($result);

        $stmt = $this->pdo->query("SELECT * FROM habitats WHERE name = 'Test Habitat'");
        $habitat = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->assertNotEmpty($habitat);
        $this->assertEquals('Test Habitat', $habitat['name']);
        $this->assertEquals('Test Description', $habitat['description']);
    }

    public function testEditHabitat()
    {
        $stmt = $this->pdo->prepare("INSERT INTO habitats (name, description) VALUES (?, ?)");
        $stmt->execute(['Test Habitat', 'Test Description']);

        $stmt = $this->pdo->prepare("UPDATE habitats SET name = ?, description = ? WHERE name = ?");
        $result = $stmt->execute(['Updated Habitat', 'Updated Description', 'Test Habitat']);
        $this->assertTrue($result);

        $stmt = $this->pdo->query("SELECT * FROM habitats WHERE name = 'Updated Habitat'");
        $habitat = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->assertNotEmpty($habitat);
        $this->assertEquals('Updated Habitat', $habitat['name']);
        $this->assertEquals('Updated Description', $habitat['description']);
    }

    public function testDeleteHabitat()
    {
        $stmt = $this->pdo->prepare("INSERT INTO habitats (name, description) VALUES (?, ?)");
        $stmt->execute(['Test Habitat', 'Test Description']);

        $stmt = $this->pdo->prepare("DELETE FROM habitats WHERE name = ?");
        $result = $stmt->execute(['Test Habitat']);
        $this->assertTrue($result);

        $stmt = $this->pdo->query("SELECT * FROM habitats WHERE name = 'Test Habitat'");
        $habitat = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->assertEmpty($habitat);
    }
}

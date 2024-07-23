<?php

use PHPUnit\Framework\TestCase;

class AnimalTest extends TestCase
{
    protected $pdo;

    protected function setUp(): void
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=zoo_arcadia_test', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function testAddAnimal()
    {
        $stmt = $this->pdo->query("SELECT id FROM habitats LIMIT 1");
        $habitat = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->pdo->prepare("INSERT INTO animals (name, species, habitat_id) VALUES (?, ?, ?)");
        $result = $stmt->execute(['Test Animal', 'Test Species', $habitat['id']]);
        $this->assertTrue($result);

        $stmt = $this->pdo->query("SELECT * FROM animals WHERE name = 'Test Animal'");
        $animal = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->assertNotEmpty($animal);
        $this->assertEquals('Test Animal', $animal['name']);
        $this->assertEquals('Test Species', $animal['species']);
        $this->assertEquals($habitat['id'], $animal['habitat_id']);
    }

    public function testEditAnimal()
    {
        $stmt = $this->pdo->query("SELECT id FROM habitats LIMIT 1");
        $habitat = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->pdo->prepare("INSERT INTO animals (name, species, habitat_id) VALUES (?, ?, ?)");
        $stmt->execute(['Test Animal', 'Test Species', $habitat['id']]);

        $stmt = $this->pdo->prepare("UPDATE animals SET name = ?, species = ?, habitat_id = ? WHERE name = ?");
        $result = $stmt->execute(['Updated Animal', 'Updated Species', $habitat['id'], 'Test Animal']);
        $this->assertTrue($result);

        $stmt = $this->pdo->query("SELECT * FROM animals WHERE name = 'Updated Animal'");
        $animal = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->assertNotEmpty($animal);
        $this->assertEquals('Updated Animal', $animal['name']);
        $this->assertEquals('Updated Species', $animal['species']);
        $this->assertEquals($habitat['id'], $animal['habitat_id']);
    }

    public function testDeleteAnimal()
    {
        $stmt = $this->pdo->query("SELECT id FROM habitats LIMIT 1");
        $habitat = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->pdo->prepare("INSERT INTO animals (name, species, habitat_id) VALUES (?, ?, ?)");
        $stmt->execute(['Test Animal', 'Test Species', $habitat['id']]);

        $stmt = $this->pdo->prepare("DELETE FROM animals WHERE name = ?");
        $result = $stmt->execute(['Test Animal']);
        $this->assertTrue($result);

        $stmt = $this->pdo->query("SELECT * FROM animals WHERE name = 'Test Animal'");
        $animal = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->assertEmpty($animal);
    }
}

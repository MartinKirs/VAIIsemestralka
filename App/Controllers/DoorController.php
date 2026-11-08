<?php

namespace App\Controllers;

use App\Models\Door;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
class DoorController extends BaseController
{
    public function authorize(Request $request, string $action): bool
    {
        return true;
    }

    /**
     * Zobrazenie zoznamu dverí (Read)
     */
    public function index(Request $request): Response
    {
        $doors = Door::getAll();
        return $this->html([
            'doors' => $doors
        ]);
    }

    /**
     * Zobrazenie formulára na pridanie dverí (Create - GET)
     */
    public function add(Request $request): Response
    {
        return $this->html([
            'door' => new Door(),
            'errors' => []
        ], 'form');
    }

    /**
     * Zobrazenie formulára na úpravu dverí (Update - GET)
     */
    public function edit(Request $request): Response
    {
        $id = (int)$request->value('id');
        $door = Door::getOne($id);

        if ($door === null) {
            return $this->redirect($this->url('door.index'));
        }

        return $this->html([
            'door' => $door,
            'errors' => []
        ], 'form');
    }

    /**
     * Spracovanie odoslaného formulára pre pridanie aj úpravu (Create / Update - POST)
     */
    public function save(Request $request): Response
    {
        $id = (int)$request->value('id');

        if ($id > 0) {
            $door = Door::getOne($id);
            if ($door === null) {
                return $this->redirect($this->url('door.index'));
            }
        } else {
            $door = new Door();
        }

        $name = trim((string)$request->value('name'));
        $building = trim((string)$request->value('building'));
        $description = trim((string)$request->value('description'));

        $door->setName($name);
        $door->setBuilding($building);
        $door->setDescription($description);

        $errors = [];
        if ($name === '') {
            $errors[] = 'Názov dverí je povinný.';
        }
        if ($building === '') {
            $errors[] = 'Budova je povinná.';
        }
        if ($description === '') {
            $errors[] = 'Popis je povinný.';
        }

        if (!empty($errors)) {
            return $this->html([
                'door' => $door,
                'errors' => $errors
            ], 'form');
        }

        $door->save();

        return $this->redirect($this->url('door.index'));
    }

    /**
     * Odstránenie záznamu z databázy (Delete - POST)
     */
    public function delete(Request $request): Response
    {
        $id = (int)$request->value('id');
        $door = Door::getOne($id);

        if ($door !== null) {
            $door->delete();
        }

        return $this->redirect($this->url('door.index'));
    }
}
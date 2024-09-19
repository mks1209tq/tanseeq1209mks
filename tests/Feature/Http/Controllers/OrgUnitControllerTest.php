<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\OrgUnitController;
use App\Http\Requests\OrgUnitStoreRequest;
use App\Http\Requests\OrgUnitUpdateRequest;
use App\Models\OrgUnit;

it('displays view on index', function () {
    $orgUnits = OrgUnit::factory()->times(3)->create();

    $response = $this->get(route('org-unit.index'));

    $response->assertOk();
    $response->assertViewIs('orgUnit.index');
    $response->assertViewHas('orgUnits');
});

it('displays view on create', function () {
    $response = $this->get(route('org-unit.create'));

    $response->assertOk();
    $response->assertViewIs('orgUnit.create');
});

it('uses form request validation on store')
    ->assertActionUsesFormRequest(
        OrgUnitController::class,
        'store',
        OrgUnitStoreRequest::class
    );

it('saves and redirects on store', function () {
    $name = $this->faker->name();

    $response = $this->post(route('org-unit.store'), [
        'name' => $name,
    ]);

    $orgUnits = OrgUnit::query()
        ->where('name', $name)
        ->get();
    expect($orgUnits)->toHaveCount(1);
    $orgUnit = $orgUnits->first();

    $response->assertRedirect(route('orgUnits.index'));
    $response->assertSessionHas('orgUnit.id', $orgUnit->id);
});

it('displays view on show', function () {
    $orgUnit = OrgUnit::factory()->create();

    $response = $this->get(route('org-unit.show', $orgUnit));

    $response->assertOk();
    $response->assertViewIs('orgUnit.show');
    $response->assertViewHas('orgUnit');
});

it('displays view on edit', function () {
    $orgUnit = OrgUnit::factory()->create();

    $response = $this->get(route('org-unit.edit', $orgUnit));

    $response->assertOk();
    $response->assertViewIs('orgUnit.edit');
    $response->assertViewHas('orgUnit');
});

it('uses form request validation on update')
    ->assertActionUsesFormRequest(
        OrgUnitController::class,
        'update',
        OrgUnitUpdateRequest::class
    );

it('redirects on update', function () {
    $orgUnit = OrgUnit::factory()->create();
    $name = $this->faker->name();

    $response = $this->put(route('org-unit.update', $orgUnit), [
        'name' => $name,
    ]);

    $orgUnit->refresh();

    $response->assertRedirect(route('orgUnits.index'));
    $response->assertSessionHas('orgUnit.id', $orgUnit->id);

    expect($orgUnit->name)->toBe($name);
});

it('deletes and redirects on destroy', function () {
    $orgUnit = OrgUnit::factory()->create();

    $response = $this->delete(route('org-unit.destroy', $orgUnit));

    $response->assertRedirect(route('orgUnits.index'));

    $this->assertSoftDeleted($orgUnit);
});

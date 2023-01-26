<?php

namespace Tests\Browser\Views;

use App\Http\Controllers\Admin\DocumentTypeController;
use App\Models\DocumentType;
use Illuminate\Support\Str;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DocumentTypeFormsTest extends DuskTestCase
{
    protected string $locate;

    protected DocumentType $document_type;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rolesSeed();
        $this->locate = 'en';
        $this->document_type = DocumentType::factory()->create();
        $this->app->setLocale('en');
    }

    /**
     * @throws Throwable
     */
    public function test_should_fail_creating_document_type_with_wrong_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([DocumentTypeController::class, 'create']))
                ->assertRouteIs('document_type.create')
                ->type('name', Str::random(280))
                ->press('store document_type')
                ->assertSee(trans(key: 'The :attribute may not be greater than :value characters.', replace: [
                    'attribute' => 'name',
                    'value' => 125,
                ], locale: $this->locate));
        });
    }

    /**
     * @throws Throwable
     */
    public function test_should_success_create_document_type_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([DocumentTypeController::class, 'create']))
                ->assertRouteIs('document_type.create')
                ->type('name', 'MozambiqueMz')
                ->press('store document_type')
                ->assertRouteIs('document_type.index')
                ->assertSee('MozambiqueMz');
        });
    }

    /**
     * @throws Throwable
     */
    public function test_should_success_update_document_type_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([DocumentTypeController::class, 'edit'], [
                    'document_type' => $this->document_type->ulid,
                ]))
                ->assertRouteIs('document_type.edit', [
                    'document_type' => $this->document_type->ulid,
                ])
                ->waitForInput('name', 5)
                ->assertInputValue('name', $this->document_type->name)
                ->type('name', $this->document_type->name.' Mutane')->press('store document_type')
                ->assertRouteIs('document_type.index')
                ->assertSee($this->document_type->name.' Mutane');
        });
    }
}

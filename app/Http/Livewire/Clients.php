<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Ville;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

class Clients extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp()
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showExportOption('download', ['excel', 'csv'])
            ->showSearchInput();
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */
    public function datasource(): ?Builder
    {
        return Client::query()->with('ville','categorie');
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('designation')
            ->addColumn('delegation', function(Client $model){
                return $model->ville->delegation->name;
            })
            ->addColumn('ville', function(Client $model){
                return $model->ville->name;
            })
            ->addColumn('code_postal')
            ->addColumn('adresse')
            ->addColumn('phone')
            ->addColumn('compte_auxilliaire')
            ->addColumn('categorie', function(Client $model){
                return $model->categorie->name;
            })
            ->addColumn('reference_titre')
            ->addColumn('created_at_formatted', function(Client $model) {
                return Carbon::parse($model->created_at)->format('d/m/Y');
            })
            ->addColumn('updated_at_formatted', function(Client $model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y');
            });
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */
    public function columns(): array
    {
        return [
            Column::add()
                ->title(__('ID'))
                ->field('id'),

            Column::add()
                ->title(__('DESIGNATION'))
                ->field('designation')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title(__('DELEGATION'))
                ->field('delegation'),

            Column::add()
                ->title(__('VILLE'))
                ->field('ville'),

            Column::add()
                ->title(__('CODE POSTAL'))
                ->field('code_postal')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title(__('ADRESSE'))
                ->field('adresse')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title(__('PHONE'))
                ->field('phone'),

            Column::add()
                ->title(__('COMPTE AUXILLIAIRE'))
                ->field('compte_auxilliaire')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title(__('CATEGORIE'))
                ->searchable()
                ->sortable()
                ->field('categorie'),

            Column::add()
                ->title(__('REFERENCE TITRE'))
                ->field('reference_titre')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title(__('CREATED AT'))
                ->field('created_at_formatted')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('created_at'),

            Column::add()
                ->title(__('UPDATED AT'))
                ->field('updated_at_formatted')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('updated_at'),

        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable this section only when you have defined routes for these actions.
    |
    */


    public function actions(): array
    {
       return [
           Button::add('show')
               ->caption(__('modifier'))
               ->class('inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150')
               ->route('client.show', ['client' => 'id']),

           //Button::add('destroy')
           //    ->caption(__('Delete'))
           //    ->class('bg-red-500 text-white')
           //    ->route('client.destroy', ['client' => 'id'])
           //    ->method('delete')
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable this section to use editOnClick() or toggleable() methods
    |
    */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = Client::query()->find($data['id'])->update([
                $data['field'] => $data['value']
           ]);
       } catch (QueryException $exception) {
           $updated = false;
       }
       return $updated;
    }

    public function updateMessages(string $status, string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field' => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field' => __('Error updating custom field.'),
            ]
        ];

        return ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);
    }
    */

    public function template(): ?string
    {
        return null;
    }

}

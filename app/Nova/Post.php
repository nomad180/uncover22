<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Http\Requests\NovaRequest;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;

class Post extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Post>
     */
    public static $model = \App\Models\Post::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title', 'body', 'slug',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            TEXT::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            TEXT::make('Slug')
                ->sortable()
                ->rules('required', 'max:255'),

            FILE::make('Thumbnail')
                ->disk('public')
                ->disableDownload(),

            TEXT::make('Alt')
                ->hideFromIndex()
                ->sortable()
                ->rules('max:255'),

            TEXT::make('Excerpt')
                ->hideFromIndex()
                ->sortable()
                ->rules('required', 'max:255'),

            NovaTinyMCE::make('body')
                ->hideFromIndex()
                ->rules('required')
                ->options([
                    'plugins' => [
                        'lists','preview','anchor','link','code','pagebreak','image','wordcount','fullscreen','directionality'
                    ],
                    'toolbar' => 'undo redo | styles | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | image | bullist numlist outdent indent | link',
                    'use_lfm' => true
                ]),

            DateTime::make('Publish At', 'published_at')
                ->sortable()
                ->rules('required'),

            BelongsTo::make('User')
                ->sortable()
                ->rules('required'),

            BelongsTo::make('Category')
                ->sortable()
                ->rules('required'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}

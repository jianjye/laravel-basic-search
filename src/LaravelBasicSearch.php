<?php

namespace Jianjye\LaravelBasicSearch;

class LaravelBasicSearch
{
    public static function search($request, $model, $fields, $ranges, $sorts)
    {
        foreach ($fields as $field) {
            if (!empty($request->query($field))) {
                $model = $model->where($field, $request->query($field));
            }
        }

        foreach ($ranges as $range) {
            if (!empty($request->query("{$range}_max"))) {
                $model = $model->where($range, '<=', urldecode($request->query("{$range}_max")));
            }

            if (!empty($request->query("{$range}_min"))) {
                $model = $model->where($range, '>=', urldecode($request->query("{$range}_min")));
            }
        }

        foreach ($sorts as $sort) {
            if (!empty($request->query("sort_{$sort}"))) {
                $model = $model->orderBy($sort, $request->query("sort_{$sort}"));
            }
        }

        return $model;
    }

    public static function fuzzySearch($request, $model, $fields, $ranges, $sorts)
    {
        foreach ($fields as $field) {
            if (!empty($request->query($field))) {
                $model = $model->where($field, 'like', '%' . $request->query($field) . '%');
            }
        }

        foreach ($ranges as $range) {
            if (!empty($request->query("{$range}_max"))) {
                $model = $model->where($range, '<=', urldecode($request->query("{$range}_max")));
            }

            if (!empty($request->query("{$range}_min"))) {
                $model = $model->where($range, '>=', urldecode($request->query("{$range}_min")));
            }
        }

        foreach ($sorts as $sort) {
            if (!empty($request->query("sort_{$sort}"))) {
                $model = $model->orderBy($sort, $request->query("sort_{$sort}"));
            }
        }

        return $model;
    }

    public static function links($request, $fields)
    {
        $links = [];
        foreach ($fields as $field) {
            switch ($request->query("sort_{$field}")) {
                case 'asc':
                    $links[$field] = $request->fullUrlWithQuery(["sort_{$field}" => 'desc']);
                    break;
                case 'desc':
                    $links[$field] = $request->fullUrlWithQuery(["sort_{$field}" => '']);
                    break;
                default:
                    $links[$field] = $request->fullUrlWithQuery(["sort_{$field}" => 'asc']);
                    break;
            }
        }

        return $links;
    }

    public static function icons($request, $fields)
    {
        $icons = [];
        foreach ($fields as $field) {
            if (empty($request->query("sort_{$field}"))) {
                $icons[$field] = 'fa-sort';
                continue;
            }

            if ('asc' == $request->query("sort_{$field}")) {
                $icons[$field] = 'fa-sort-up';
            } else {
                $icons[$field] = 'fa-sort-down';
            }
        }

        return $icons;
    }
}

<?php

namespace App\Repositories;
use App\Contracts\CategoryInterface;
use App\Models\{Category, SubCategory};

class CategoryRepository implements CategoryInterface
{
    public function mainList($type = null, $pagination = false)
    {
        $query = Category::query();

        if (!is_null($type)) {
            $query->where('type', $type);
        }
        return $pagination ? $query->paginate() : $query->with('subCategories')->get();
    }

    public function mainNew()
    {
        return new Category();
    }

    public function mainStore($data)
    {
        return Category::create($data);
    }

    public function mainFind($id)
    {
        return Category::find($id);
    }

	public function mainUpdate($data, $id)
    {
        return Category::find($id)->update($data);
    }

	public function mainDelete($id)
    {
        return Category::find($id)->delete();
    }

    public function subList($type = null, $pagination = false)
    {
        $query = SubCategory::query();

        if (!is_null($type)) {
            $query->where('type', $type);
        }
        return $pagination ? $query->paginate() : $query->with('category')->get();
    }

    public function subNew()
    {
        return new SubCategory();
    }

	public function subStore($data)
    {
        return SubCategory::create($data);
    }

	public function subFind($id)
    {
        return SubCategory::find($id);
    }

	public function subUpdate($data, $id)
    {
        return SubCategory::find($id)->update($data);
    }

	public function subDelete($id)
    {
        return SubCategory::find($id)->delete();
    }
}

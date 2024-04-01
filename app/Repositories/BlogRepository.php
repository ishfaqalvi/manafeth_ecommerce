<?php

namespace App\Repositories;
use App\Contracts\BlogInterface;
use App\Models\Blog;

class BlogRepository implements BlogInterface
{
	public function paginationList()
	{
		return Blog::paginate();
	}

	public function simpleList()
	{
		return Blog::get();
	}

    public function specialList()
	{
		return Blog::whereSpecial('Yes')->get();
	}

	public function create()
	{
		return new Blog();
	}

	public function store($data)
	{
		return Blog::create($data);
	}

	public function find($id)
	{
		return Blog::find($id);
	}

	public function update($data, $id)
	{
		return Blog::find($id)->update($data);
	}

	public function delete($id)
	{
		return Blog::find($id)->delete();
	}
}

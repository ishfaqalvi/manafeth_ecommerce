<?php

namespace App\Repositories;
use App\Contracts\BannerInterface;
use App\Models\Banner;

class BannerRepository implements BannerInterface
{
	//To view all banners data
	public function groupByList()
	{
		return Banner::get()->groupBy('type');
	}

	//To view all banners data
	public function list($filter)
	{
		return Banner::filter($filter)->whereStatus('Active')->get();
	}

	//To create a new banner
	public function create()
	{
		return new Banner();
	}

	//To store a new banner
	public function store($data)
	{
		return Banner::create($data);
	}

	//To find a banner
	public function find($id)
	{
		return Banner::find($id);
	}

	//To update a banner detail
	public function update($data, $id)
	{
		return Banner::find($id)->update($data);
	}

	//To delete a banner
	public function delete($id)
	{
		return Banner::find($id)->delete();
	}
}
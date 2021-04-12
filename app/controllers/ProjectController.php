<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Auth;
use App\Core\Request;

class ProjectController
{
	protected $pageTitle;

	public function index()
	{
		$pageTitle = "Projects";
		$user_id = Auth::user('id');

		$project_datas = App::get('database')->selectLoop('*', 'projects', "user_id = '$user_id'");
		return view('projects/index', compact('project_datas', 'pageTitle'));
	}

	public function detail($id)
	{
		$pageTitle = "Project Detail";
		$user_id = Auth::user('id');

		$project_details = App::get('database')->select("*", 'projects', "id='$id' AND user_id = '$user_id'");

		if (!$project_details) {
			redirect('project');
		}

		return view('projects/detail', compact('project_details', 'pageTitle'));
	}

	public function add()
	{
		$pageTitle = "Project Add";
		$projectCode = "PROJ-" . strtoupper(randChar(8));
		return view('projects/new', compact('projectCode', 'pageTitle'));
	}

	public function store()
	{
		$request = Request::validate('project/add', [
			'proj-code' => 'required',
			'proj-name' => 'required'
		]);

		$project_form = [
			'project_code' => $request['proj-code'],
			'project_name' => $request['proj-name'],
			'description' => $request['proj-description'],
			'date_added' => date("Y-m-d H:i:s"),
			'user_id' => Auth::user('id')
		];

		App::get('database')->insert("projects", $project_form);
		redirect('project/add', "Added successfully.");
	}

	public function delete($id)
	{
		$user_id = Auth::user('id');
		App::get('database')->delete('projects', "id = '$id' AND user_id = '$user_id'");
		redirect('project', "Deleted successfully.");
	}

	public function updateDetail($id)
	{
		$request = Request::validate('project/detail/' . $id, [
			'edit-proj-code' => 'required',
			'edit-proj-name' => 'required'
		]);

		$update_project_form = [
			'project_code' => $request['edit-proj-code'],
			'project_name' => $request['edit-proj-name'],
			'description' => $request['edit-proj-description']
		];

		App::get('database')->update("projects", $update_project_form, "id = '$id'");
		redirect('project/detail/' . $id, "Updated successfully.");
	}
}

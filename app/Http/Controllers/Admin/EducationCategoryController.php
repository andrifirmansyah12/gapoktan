<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EducationCategory;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class EducationCategoryController extends Controller
{
    // set index page view
	public function index() {
		return view('admin.edukasi-kategori.index');
	}

    // handle fetch all eamployees ajax request
	public function fetchAll()
    {
		$emps = EducationCategory::latest()->get();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table id="example1" class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>';
            $nomor=1;
			foreach ($emps as $emp) {
				$output .= '<tr>
                <td>' . $nomor++ . '</td>
                <td>' . $emp->name . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i></a>
                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Tidak ada data Kategori Edukasi!</h1>';
		}
	}

    // handle insert a new employee ajax request
	public function store(Request $request)
    {
		$empData = ['name' => $request->name, 'slug' => $request->slug];

		EducationCategory::create($empData);
		return response()->json([
			'status' => 200,
		]);
	}

    // handle edit an employee ajax request
	public function edit(Request $request)
    {
		$id = $request->id;
		$emp = EducationCategory::find($id);
		return response()->json($emp);
	}

    // handle update an employee ajax request
	public function update(Request $request)
    {
		$emp = EducationCategory::find($request->emp_id);

		$empData = ['name' => $request->name, 'slug' => $request->slug];

		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}

    // handle delete an employee ajax request
	public function delete(Request $request)
    {
		$id = $request->id;
		$emp = EducationCategory::find($id);
        $emp->delete();
	}

    public function checkSlug(Request $request)
    {
        // Old version: without uniqueness
        $slug = $request->name;

        // New version: to generate unique slugs
        $slug = SlugService::createSlug(EducationCategory::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}

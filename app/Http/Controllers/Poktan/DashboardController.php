<?php

namespace App\Http\Controllers\Poktan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Farmer;
use App\Models\Plant;
use App\Models\Education;
use App\Models\Activity;
use Redirect, Response;
Use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $year = ['2022','2023','2024','2025','2026','2027','2028','2029','2030'];

        $plant = [];
        $harvest = [];
        foreach ($year as $key => $value) {
            $plant[] = Plant::join('farmers', 'plants.farmer_id', '=', 'farmers.id')
                    ->join('poktans', 'plants.poktan_id', '=', 'poktans.id')
                    ->where('poktans.user_id', '=', auth()->user()->id)
                    ->where('plants.harvest_date', '=', null)
                    ->where(\DB::raw("DATE_FORMAT(plants.created_at, '%Y')"),$value)
                    ->count();
            $harvest[] = Plant::join('farmers', 'plants.farmer_id', '=', 'farmers.id')
                    ->join('poktans', 'plants.poktan_id', '=', 'poktans.id')
                    ->where('poktans.user_id', '=', auth()->user()->id)
                    ->whereNotNull('plants.harvest_date')
                    ->where(\DB::raw("DATE_FORMAT(plants.created_at, '%Y')"),$value)
                    ->count();
        }

    	return view('poktan.dashboard.index')
                ->with('year',json_encode($year,JSON_NUMERIC_CHECK))
                ->with('plant',json_encode($plant,JSON_NUMERIC_CHECK))
                ->with('harvest',json_encode($harvest,JSON_NUMERIC_CHECK));
    }

    // handle fetch all eamployees ajax request
	public function fetchAll(Request $request) {
        $countPlant = Plant::join('farmers', 'plants.farmer_id', '=', 'farmers.id')
                    ->join('poktans', 'plants.poktan_id', '=', 'poktans.id')
                    ->where('poktans.user_id', '=', auth()->user()->id)
                    ->where('plants.harvest_date', '=', null)
                    ->count();
        $countHarvest = Plant::join('farmers', 'plants.farmer_id', '=', 'farmers.id')
                    ->join('poktans', 'plants.poktan_id', '=', 'poktans.id')
                    ->where('poktans.user_id', '=', auth()->user()->id)
                    ->whereNotNull('plants.harvest_date')
                    ->count();
        $countFarmer = Farmer::join('poktans', 'farmers.poktan_id', '=', 'poktans.id')
                    ->join('users', 'farmers.user_id', '=', 'users.id')
                    ->where('poktans.user_id', '=', auth()->user()->id)
                    ->count();
        $countEducation = Education::where('user_id', auth()->user()->id)->count();
        $countActivity = Activity::where('user_id', auth()->user()->id)->count();

		$output = '';
            $output .= '
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon" style="background: #16A085">
                            <i class="far fa-solid fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Akun Petani</h4>
                            </div>
                            <div class="card-body">
                                '.$countFarmer.'
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon" style="background: #16A085">
                            <i class="far fa-solid fa-calendar-days"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Tandur</h4>
                            </div>
                            <div class="card-body">
                                '.$countPlant.'
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon" style="background: #16A085">
                            <i class="far fa-solid fa-calendar-check"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Panen</h4>
                            </div>
                            <div class="card-body">
                                '.$countHarvest.'
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon" style="background: #16A085">
                            <i class="far fa-solid fa-clapperboard"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Post Edukasi</h4>
                            </div>
                            <div class="card-body">
                                '.$countEducation.'
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon" style="background: #16A085">
                            <i class="far fa-solid fa-clipboard"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Post Kegiatan</h4>
                            </div>
                            <div class="card-body">
                                '.$countActivity.'
                            </div>
                        </div>
                    </div>
                </div>';
			echo $output;
	}
}

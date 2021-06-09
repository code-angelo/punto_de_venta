<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ventas;
use App\Compras;
use Illuminate\support\Facades\DB;


class ChartDataController extends Controller
{
    //funcion para obtener los meses de los registros de ventas, sin repetir el mismo mes
    public function getAllMonths(){

        $month_array = array();
        $fechas = Ventas::orderBy('created_at', 'ASC')->pluck('created_at');
        
        if(!empty($fechas)){
            foreach($fechas as $fecha){
                $data = new \DateTime($fecha);
                $month_no = $data->format('m'); //regresa el numero del mes
                $month_name = $data->format('M'); //regresa el nombre del mes
                $month_array[$month_no] = $month_name;
            }
        }
        return $month_array;
    }

    function getMonthlySellsCount($month){
        $monthly_sells_count = Ventas::whereMonth('created_at', $month)->get()->count();
        return $monthly_sells_count;
    }

    function getMonthlySellData(){

        $monthly_sells_count_array = array();
        $month_array = $this->getAllMonths();
        $month_name_array = array();
        if(!empty($month_array)){
            foreach ($month_array as $month_no => $month_name) {
                $monthly_sells_count = $this->getMonthlySellsCount($month_no);
                array_push($monthly_sells_count_array, $monthly_sells_count);
                array_push($month_name_array, $month_name);
            }
        }
        // $month_array = $this->getAllMonths();
        $max_no = max($monthly_sells_count_array);
        $max = round(($max_no + 10/2) /10) * 10;
        $monthly_sells_count_array = array(
            'months' => $month_name_array,
            'sells_count_data' => $monthly_sells_count_array,
            'max' => $max,
        );
        return $monthly_sells_count_array;
    } 


    // metodospara la compras las compras
    public function getMonths(){

        $month_array = array();
        $fechas = Compras::orderBy('created_at', 'ASC')->pluck('created_at');
        
        if(!empty($fechas)){
            foreach($fechas as $fecha){
                $data = new \DateTime($fecha);
                $month_no = $data->format('m'); //regresa el numero del mes
                $month_name = $data->format('M'); //regresa el nombre del mes
                $month_array[$month_no] = $month_name;
            }
        }
        return $month_array;
    }

    function getMonthlyBuysCount($month){
        $monthly_sells_count = Compras::whereMonth('created_at', $month)->get()->count();
        return $monthly_sells_count;
    }

    function getMonthlyBuyData(){

        $monthly_sells_count_array = array();
        $month_array = $this->getMonths();
        $month_name_array = array();
        if(!empty($month_array)){
            foreach ($month_array as $month_no => $month_name) {
                $monthly_sells_count = $this->getMonthlyBuysCount($month_no);
                array_push($monthly_sells_count_array, $monthly_sells_count);
                array_push($month_name_array, $month_name);
            }
        }
        // $month_array = $this->getAllMonths();
        $max_no = max($monthly_sells_count_array);
        $max = round(($max_no + 10/2) /10) * 10;
        $monthly_sells_count_array = array(
            'months' => $month_name_array,
            'sells_count_data' => $monthly_sells_count_array,
            'max' => $max,
        );
        return $monthly_sells_count_array;
    }



    // Metodos para obtener el total monetario de ventas GRAFICA PARA VENTAS EN MONEDAS
    public function getMes(){

        $month_array = array();
        $fechas = Ventas::orderBy('created_at', 'ASC')->pluck('created_at');
        
        if(!empty($fechas)){
            foreach($fechas as $fecha){
                $data = new \DateTime($fecha);
                $month_no = $data->format('m'); //regresa el numero del mes
                $month_name = $data->format('M'); //regresa el nombre del mes
                $month_array[$month_no] = $month_name;
            }
        }
        return $month_array;
    }
    public function getMesCompras(){

        $month_array = array();
        $fechas = Compras::orderBy('created_at', 'ASC')->pluck('created_at');
        
        if(!empty($fechas)){
            foreach($fechas as $fecha){
                $data = new \DateTime($fecha);
                $month_no = $data->format('m'); //regresa el numero del mes
                $month_name = $data->format('M'); //regresa el nombre del mes
                $month_array[$month_no] = $month_name;
            }
        }
        return $month_array;
    }

    function getotalPorMes($month){
        $ventas = DB::table("ventas")->whereMonth('created_at', $month)->sum('total');
        return $ventas;
    }
    function getotalPorMesCompras($month){
        $compras = DB::table("compras")->whereMonth('created_at', $month)->sum('total');
        return $compras;
    }

    function getVentasTotales(){
        //arreglos para las ventas
        $month_array = $this->getMes();
        $monthly_sells_count_array = array();
        $month_name_array = array();

        if(!empty($month_array)){
            foreach ($month_array as $month_no => $month_name) {
                $monthly_sells_count = $this->getotalPorMes($month_no);
                array_push($monthly_sells_count_array, $monthly_sells_count);
                array_push($month_name_array, $month_name);
            }
        }

        //arreglos para las compras
        $month_array_compras = $this->getMesCompras();
        $monthly_buys_count_array = array();
        $month_name_array_compras = array();

        if(!empty($month_array_compras)){
            foreach ($month_array_compras as $month_no_compras => $month_name_compras) {
                $monthly_buys_count = $this->getotalPorMesCompras($month_no_compras);
                array_push($monthly_buys_count_array, $monthly_buys_count);
                array_push($month_name_array_compras, $month_name_compras);
            }
        }
        // $month_array = $this->getAllMonths();
        $max_no_ventas = max($monthly_sells_count_array);
        $max_no_compras = max($monthly_buys_count_array);
        
        if($max_no_ventas >= $max_no_compras){
            $max_no = max($monthly_sells_count_array);
        }else{
            $max_no = max($monthly_buys_count_array);
        }
        $max = round(($max_no + 10/2) /10) * 10;
        
        $monthly_sells_count_array = array(
            'months' => $month_name_array,
            'months_compras' => $month_name_array_compras,
            'sells_count_data' => $monthly_sells_count_array,
            'buys_count_data' => $monthly_buys_count_array,
            'max' => $max,
        );
        return $monthly_sells_count_array;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $default_program_studi = 'T1';
        $filter_pelatihan = $request->input('filter_pelatihan', $default_program_studi);
        $filter_tanggal = $request->input('filter_tanggal');
        $filter_bulan = $request->input('filter_bulan');
        $filter_hari = $request->input('filter_hari');

        $query = Siswa::with('programStudy');

        if ($filter_pelatihan) {
            $query->where('pelatihan', $filter_pelatihan);
        }

        if ($filter_tanggal) {
            $query->whereDate('created_at', $filter_tanggal);
        }

        if ($filter_bulan) {
            $query->whereMonth('created_at', date('m', strtotime($filter_bulan)))
                  ->whereYear('created_at', date('Y', strtotime($filter_bulan)));
        }

        if ($filter_hari) {
            $query->where('harie', $filter_hari);
        }

        $siswas = $query->orderBy('created_at', 'desc')->paginate(50);
        $programStudis = ProgramStudy::all();

        return view('admins.siswa', compact('siswas', 'programStudis', 'filter_pelatihan', 'filter_tanggal', 'filter_bulan', 'filter_hari'));
    }

    public function exportToExcel(Request $request)
    {
        $filter_pelatihan = $request->input('filter_pelatihan');
        $filter_tanggal = $request->input('filter_tanggal');
        $filter_bulan = $request->input('filter_bulan');
        $filter_hari = $request->input('filter_hari');
        $page = $request->input('page', 1); // Get the current page or default to 1

        $query = Siswa::with('programStudy');

        if ($filter_pelatihan) {
            $query->where('pelatihan', $filter_pelatihan);
        }

        if ($filter_tanggal) {
            $query->whereDate('created_at', $filter_tanggal);
        }

        if ($filter_bulan) {
            $query->whereMonth('created_at', date('m', strtotime($filter_bulan)))
                  ->whereYear('created_at', date('Y', strtotime($filter_bulan)));
        }

        if ($filter_hari) {
            $query->where('harie', $filter_hari);
        }

        // Get the current page of data
        $siswas = $query->orderBy('created_at', 'desc')->paginate(50, ['*'], 'page', $page);

        $spreadsheet = new Spreadsheet();

        // Sheet 1: Data Siswa
        $sheet1 = $spreadsheet->getActiveSheet();
        $sheet1->setTitle('Data Siswa');
        $sheet1->setCellValue('A1', 'No')
                ->setCellValue('B1', 'Nama')
                ->setCellValue('C1', 'Alamat')
                ->setCellValue('D1', 'No. HP')
                ->setCellValue('E1', 'Jenis Kelamin')
                ->setCellValue('F1', 'Agama')
                ->setCellValue('G1', 'Kota Kelahiran')
                ->setCellValue('H1', 'Tanggal Lahir')
                ->setCellValue('I1', 'NIK')
                ->setCellValue('J1', 'Tanggal Terbit Identitas')
                ->setCellValue('K1', 'Tanggal Berakhir Identitas')
                ->setCellValue('L1', 'Nama Ibu');
        $row = 2;
        foreach ($siswas as $index => $siswa) {
            $sheet1->setCellValue('A' . $row, $index + 1)
                   ->setCellValue('B' . $row, $siswa->name)
                   ->setCellValue('C' . $row, $siswa->alamat)
                   ->setCellValue('D' . $row, $siswa->nohp)
                   ->setCellValue('E' . $row, $siswa->jenis_kelamin)
                   ->setCellValue('F' . $row, $siswa->agama)
                   ->setCellValue('G' . $row, $siswa->kota_lahir)
                   ->setCellValue('H' . $row, $siswa->tgl_lahir)
                   ->setCellValueExplicit('I' . $row, $siswa->nik, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                   ->setCellValue('J' . $row, $siswa->tanggal_terbit)
                   ->setCellValue('K' . $row, $siswa->tanggal_berakhir)
                   ->setCellValue('L' . $row, $siswa->nama_ibu);
            $row++;
        }

        // Auto-size columns
        foreach (range('A', 'M') as $columnID) {
            $sheet1->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Sheet 2: Rekap KTP
        $spreadsheet->createSheet();
        $sheet2 = $spreadsheet->setActiveSheetIndex(1);
        $sheet2->setTitle('Rekap KTP');
        $sheet2->setCellValue('A1', 'Nama')
               ->setCellValue('B1', 'Foto KTP')
               ->setCellValue('C1', 'Pas Foto')
               ->setCellValue('D1', 'Foto Ijazah');

        $row = 2;
        foreach ($siswas as $siswa) {
            $sheet2->setCellValue('A' . $row, $siswa->name);

            // Foto KTP
            if ($siswa->foto_ktp) {
                $drawing = new Drawing();
                $drawing->setName('Foto KTP');
                $drawing->setDescription('Foto KTP');
                $drawing->setPath(storage_path('app/public/' . $siswa->foto_ktp));
                $drawing->setHeight(100); // Adjust this value for the landscape layout
                $drawing->setWidth(150);  // Adjust this value for the landscape layout
                $drawing->setCoordinates('B' . $row);
                $drawing->setWorksheet($sheet2);
            }

            // Pas Foto
            if ($siswa->pas_foto) {
                $drawing = new Drawing();
                $drawing->setName('Pas Foto');
                $drawing->setDescription('Pas Foto');
                $drawing->setPath(storage_path('app/public/' . $siswa->pas_foto));
                $drawing->setHeight(100); // Adjust this value for the landscape layout
                $drawing->setWidth(150);  // Adjust this value for the landscape layout
                $drawing->setCoordinates('C' . $row);
                $drawing->setWorksheet($sheet2);
            }

            // Foto Ijazah
            if ($siswa->foto_ijazah) {
                $drawing = new Drawing();
                $drawing->setName('Foto Ijazah');
                $drawing->setDescription('Foto Ijazah');
                $drawing->setPath(storage_path('app/public/' . $siswa->foto_ijazah));
                $drawing->setHeight(100); // Adjust this value for the landscape layout
                $drawing->setWidth(150);  // Adjust this value for the landscape layout
                $drawing->setCoordinates('D' . $row);
                $drawing->setWorksheet($sheet2);
            }

            // Adjust the row height for images
            $sheet2->getRowDimension($row)->setRowHeight(75);

            $row++;
        }

        // Set the column widths
        $sheet2->getColumnDimension('B')->setWidth(30);  // Adjust this value for the landscape layout
        $sheet2->getColumnDimension('C')->setWidth(30);
        $sheet2->getColumnDimension('D')->setWidth(30);

        // Set the page orientation to landscape
        $sheet1->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet2->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data_Siswa.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet ;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx ;
use Illuminate\Support\Facades\Response;

class ExcelController extends Controller
{
    
    public function exportUsersList(Request $req)
    {
        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
    
        // Assuming $spreadsheet is your PhpSpreadsheet object
        $sheet = $spreadsheet->getActiveSheet();
    
        // Define dynamic header names
        $headerNames = ['Sr No', 'Name','D.O.B','Email', 'Phone No ' ,'Area ','City' ,'State' ,'Zip Code'];
    
        // Insert new rows at the top based on the number of dynamic headers
        foreach ($headerNames as $header) {
            $sheet->insertNewRowBefore(1);
         }
    
        // Set dynamic header row values
        foreach (range('A', 'Z') as $index => $column) {
            $sheet->setCellValue($column . '3', $headerNames[$index] ?? '');
        }
        // Add some data to the sheet
        $sheet->setCellValue('A1', 'UsersList Data');
        $sheet->setCellValue('B1', date('Y-m-d H:i:s'));

    
        // Set the header row to be bold
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
        ];
    
        // Find the last column with data
        $lastColumn = $sheet->getHighestDataColumn();
    
        $headerRange = 'A1:' . $lastColumn . (count($headerNames) + 1);
        $sheet->getStyle($headerRange)->applyFromArray($styleArray);
    
        // Automatically adjust the column width
        foreach (range('A', $lastColumn) as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }
    
        // Insert a new row for data
        $sheet->insertNewRowBefore((count($headerNames) + 2));
    

        //! get all user data
           // Using dependency injection to access ControllerA
           $controllerA = app(UsersDetailsController::class);

     
            // Call the fetchData method from ControllerA
            $sData = $controllerA->getAllUsersListForAdmin();


            $row = 4 ; 
            //! insert data into the sheet
            foreach($sData  as $index => $data){
                $sheet->setCellValue('A' .  $index + $row , $index + 1);
                $sheet->setCellValue('B' .  $index +  $row , $data['fname']." ".$data['lname']);
                $sheet->setCellValue('C' .  $index +  $row , $data['dob']);
                $sheet->setCellValue('D' .  $index +  $row , $data['email']);
                $sheet->setCellValue('E' .  $index +  $row , $data['phoneno'] );
                $sheet->setCellValue('F' .  $index +  $row , $data['area'] ?  $data['area'] : "N/A");
                $sheet->setCellValue('G' .  $index +  $row , $data['city']?  $data['city'] : "N/A");
                $sheet->setCellValue('H' .  $index +  $row , $data['state']?  $data['state'] : "N/A");
                $sheet->setCellValue('I' .  $index +  $row , $data['zip_code']?  $data['zip_code'] : "N/A");
            }

            $sFileName = "AllUserList_" . time() ;
            $sFullFileName  = $sFileName .'.xlsx'; 
      
        // Save the spreadsheet to a file
        $filePath = storage_path("app/excel/{$sFullFileName}");
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save($filePath);
    
        // Return a response with a download link
        return response()->download($filePath, $sFullFileName);
    }


  //! product export excel
    public function exportProductList(){
            // Create a new Spreadsheet object
            $spreadsheet = new Spreadsheet();
            
            // Assuming $spreadsheet is your PhpSpreadsheet object
            $sheet = $spreadsheet->getActiveSheet();
            // Define dynamic header names
            $headerNames = ['Sr No', 'Product Name','Product Description','Pricce', 'Stocks' ,'Online Date '];
            // Insert new rows at the top based on the number of dynamic headers
            foreach ($headerNames as $header) { 
            $sheet->insertNewRowBefore(1);
            }
            // Set dynamic header row values
            foreach (range('A', 'Z') as $index => $column) {
            $sheet->setCellValue($column . '3', $headerNames[$index] ?? '');
            }
            // Add some data to the sheet
            $sheet->setCellValue('A1', 'UsersList Data');
            $sheet->setCellValue('B1', date('Y-m-d H:i:s'));
            // Set the header row to be bold
            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
            ];
            // Find the last column with data
            $lastColumn = $sheet->getHighestDataColumn();
            $headerRange = 'A1:' . $lastColumn . (count($headerNames) + 1);
            $sheet->getStyle($headerRange)->applyFromArray($styleArray);
            
            // Automatically adjust the column width
            foreach (range('A', $lastColumn) as $column) {
                $sheet->getColumnDimension($column)->setAutoSize(true);
            }

            // Insert a new row for data
            $sheet->insertNewRowBefore((count($headerNames) + 2));


            //! get all user data
            // Using dependency injection to access ControllerA
            $controllerProduct = app(ProductController::class);

            // Call the fetchData method from ControllerA
            $sData = $controllerProduct->getProductListData();
            
        // dd($sData )

            $row = 4 ; 
            //! insert data into the sheet
            foreach($sData  as $index => $data){
                $sheet->setCellValue('A' .  $index + $row , $index + 1);
                $sheet->setCellValue('B' .  $index +  $row , $data->product_name);
                $sheet->setCellValue('C' .  $index +  $row , $data->product_description);
                $sheet->setCellValue('D' .  $index +  $row , $data->product_price);
                $sheet->setCellValue('E' .  $index +  $row , $data->stocks  ? $data->stocks : 'N/A' );
                $sheet->setCellValue('F' .  $index +  $row , $data->product_online_date);
                
            }
            $sFileName = "AllProductList_" . time() ;
            $sFullFileName  = $sFileName .'.xlsx'; 
            
            // Save the spreadsheet to a file
            $filePath = storage_path("app/excel/{$sFullFileName}");
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
            $writer->save($filePath);
                // Return a response with a download link
                return response()->download($filePath, $sFullFileName);
    }

}
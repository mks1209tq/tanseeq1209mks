<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Employee;

class ProcessEmployeeFiles extends Command
{
    protected $signature = 'employees:process-files {folder : The folder to process}';
    protected $description = 'Process employee files and add to database';

    public function handle()
    {
        $folderPath = $this->argument('folder');

        if (!Storage::exists($folderPath)) {
            $this->error("Folder not found: $folderPath");
            return 1;
        }

        $files = Storage::files($folderPath);

        foreach ($files as $file) {
            $filename = basename($file);
            
            // Skip files already prefixed with not_found_
            if (str_starts_with($filename, 'not_found_')) {
                $this->line("Skipping already processed file: $filename");
                continue;
            }

            $employeeId = $this->extractEmployeeId($filename);

            if ($employeeId) {
                $this->processFile($folderPath, $employeeId, $filename);
            } else {
                $this->warn("Could not extract employee ID from filename: $filename");
                $this->renameFile($folderPath, $filename);
            }
        }

        $this->info('File processing completed.');
    }

    private function extractEmployeeId($filename)
    {
        // Adjust this method based on your filename format
        // For example, if your files are named like "EMP001_document.pdf"
        $parts = explode('_', $filename);
        return $parts[0] ?? null;
    }

    private function processFile($folderPath, $employeeId, $filename)
    {
        $employee = Employee::where('employee_code', $employeeId)->first();

        if ($employee) {
            $this->line("Employee $employeeId already exists in database");
            // Optionally update the filename if it has changed
            if ($employee->filename !== $filename) {
                $employee->update(['filename' => $filename]);
                $this->info("Updated filename for employee $employeeId");
            }
        } else {
            $this->warn("Employee $employeeId not found in database");
            $this->renameFile($folderPath, $filename);
        }
    }

    private function renameFile($folderPath, $filename)
    {
        $oldPath = $folderPath . '/' . $filename;
        $newFilename = 'not_found_' . $filename;
        $newPath = $folderPath . '/' . $newFilename;

        if (Storage::move($oldPath, $newPath)) {
            $this->info("Renamed file to: $newFilename");
        } else {
            $this->error("Failed to rename file: $filename");
        }
    }
}

<?php

class FileComparator
{
    /**
     * Compares two files and produces two output files:
     * - The first output file contains strings unique to the first file.
     * - The second output file contains strings unique to the second file.
     *
     * @param string $file1Path Path to the first file.
     * @param string $file2Path Path to the second file.
     * @return array Array containing the paths to the output files.
     */
    public function compareFiles($file1Path, $file2Path)
    {
        $file1 = file($file1Path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $file2 = file($file2Path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if ($file1 === false || $file2 === false) {
            return false;
        }

        sort($file1);
        sort($file2);

        $uniqueToFile1 = array_diff($file1, $file2);
        $uniqueToFile2 = array_diff($file2, $file1);

        $file1OutputPath = 'files/output_file1.txt';
        $file2OutputPath = 'files/output_file2.txt';

        file_put_contents($file1OutputPath, implode(PHP_EOL, $uniqueToFile1));
        file_put_contents($file2OutputPath, implode(PHP_EOL, $uniqueToFile2));

        return [
            'file1' => $file1OutputPath,
            'file2' => $file2OutputPath
        ];
    }
}

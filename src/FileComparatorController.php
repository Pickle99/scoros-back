<?php

require_once 'src/FileComparator.php';

class FileComparatorController
{
    public function handleRequest()
    {
        if (!isset($_FILES['input1']) || !isset($_FILES['input2'])) {
            http_response_code(400);
            echo json_encode(["error" => "Both input files are required."]);
            return;
        }

        $file1 = $_FILES['input1'];
        $file2 = $_FILES['input2'];

        $validator = new FileValidator();
        if (!$validator->validateFile($file1) || !$validator->validateFile($file2)) {
            http_response_code(400);
            echo json_encode(["error" => "Invalid files uploaded."]);
            return;
        }

        $comparator = new FileComparator();
        $result = $comparator->compareFiles($file1['tmp_name'], $file2['tmp_name']);

        if ($result) {
            echo json_encode([
                "output_file1" => "files/" . $result['file1'],
                "output_file2" => "files/" . $result['file2'],
            ]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "An error occurred while processing the files."]);
        }
    }
}

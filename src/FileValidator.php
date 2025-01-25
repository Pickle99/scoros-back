<?php

class FileValidator
{
    public function validateFile($file)
    {
        if ($file['size'] > 10 * 1024 * 1024) { // Max 10MB file size
            return false;
        }

        // Check file type (we only allow text files)
        if ($file['type'] !== 'text/plain') {
            return false;
        }

        return true;
    }
}

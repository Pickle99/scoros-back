<?php

class FileValidator
{
    public function validateFile($file)
    {
        if ($file['size'] > 10 * 1024 * 1024) { 
            return false;
        }

        if ($file['type'] !== 'text/plain') {
            return false;
        }

        return true;
    }
}

<?php

// phuong thuc load  view
class BaseController
{
    const VIEW_FOLDER_NAME = 'Views';
    const MODEL_FOLDER_NAME = 'Models';

    /**
     * Qui tac1: path name :folderName.fileName
     * Qui tac2: Lấy từ sau thư mục Views
     */
    protected function loadView($viewPath, $data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        return require(self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $viewPath) . '.php');
    }

    protected function loadModel($modelPath)
    {
        return require(self::MODEL_FOLDER_NAME . '/' . $modelPath . '.php');
    }
}

<?php
if( isset( $_POST['my_file_upload'] ) ){
    //проверка на размер файла
    if($_FILES[0]['size'] > 3000000)
    {
        exit;
    }

    if(!preg_match('~\\.(?:jpe?g|png|gif)$~iu', $_FILES[0]['name']))
    {
        exit;
    }
    $uploaddir = './images/avatar'; //директория

    // cоздадим папку если её нет
    if( ! is_dir( $uploaddir ) ) mkdir( $uploaddir, 0777 );

    $files      = $_FILES; // полученные файлы
    $done_files = array();

    // переместим файлы из временной директории в указанную
    foreach( $files as $file ){
        $file_name = $file['name'];

        if( move_uploaded_file( $file['tmp_name'], "$uploaddir/$file_name" ) ){
            $done_files[] = realpath( "$uploaddir/$file_name" );
        }
    }

    $data = $done_files ? array('files' => $done_files ) : array('error' => 'Ошибка загрузки файлов.');

    die( json_encode( $data ) );
}
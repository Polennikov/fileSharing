<?php
session_start();
?>
<?php
$_SESSION['warTypeFile'] = 0;
$fileMass = array();
// Название <input type="file">
$input_name = 'file';
// Разрешенные расширения файлов.
$allow = array(
    'zip',
    'doc',
    'docx',
    'xls',
    'xlsx',
    'pdf',
    'jpg',
    'png'
);
// Директория куда будут загружаться файлы.
$path = '..//uploads/';
if (isset($_FILES[$input_name])) {
// Проверим директорию для загрузки.
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
// Преобразуем массив $_FILES в удобный вид для перебора в foreach.
    $files = array();
    $diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
    if ($diff == 0) {
        $files = array($_FILES[$input_name]);
    } else {
        foreach ($_FILES[$input_name] as $k => $l) {
            foreach ($l as $i => $v) {
                $files[$i][$k] = $v;
            }
        }
    }
    foreach ($files as $file) {
// Оставляем в имени файла только буквы, цифры и некоторые символы.
        $pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
        $name = mb_eregi_replace($pattern, '-', $file['name']);
        $name = mb_ereg_replace('[-]+', '-', $name);
// Т.к. есть проблема с кириллицей в названиях файлов (файлы становятся недоступны).
// Сделаем их транслит:
        $converter = array(
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'g',
            'д' => 'd',
            'е' => 'e',
            'ё' => 'e',
            'ж' => 'zh',
            'з' => 'z',
            'и' => 'i',
            'й' => 'y',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ф' => 'f',
            'х' => 'h',
            'ц' => 'c',
            'ч' => 'ch',
            'ш' => 'sh',
            'щ' => 'sch',
            'ь' => '',
            'ы' => 'y',
            'ъ' => '',
            'э' => 'e',
            'ю' => 'yu',
            'я' => 'ya',

            'А' => 'A',
            'Б' => 'B',
            'В' => 'V',
            'Г' => 'G',
            'Д' => 'D',
            'Е' => 'E',
            'Ё' => 'E',
            'Ж' => 'Zh',
            'З' => 'Z',
            'И' => 'I',
            'Й' => 'Y',
            'К' => 'K',
            'Л' => 'L',
            'М' => 'M',
            'Н' => 'N',
            'О' => 'O',
            'П' => 'P',
            'Р' => 'R',
            'С' => 'S',
            'Т' => 'T',
            'У' => 'U',
            'Ф' => 'F',
            'Х' => 'H',
            'Ц' => 'C',
            'Ч' => 'Ch',
            'Ш' => 'Sh',
            'Щ' => 'Sch',
            'Ь' => '',
            'Ы' => 'Y',
            'Ъ' => '',
            'Э' => 'E',
            'Ю' => 'Yu',
            'Я' => 'Ya',
        );
        $name = strtr($name, $converter);
        $parts = pathinfo($name);
        if (empty($name) || empty($parts['extension'])) {
        } elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
            $_SESSION['warTypeFile'] = 1;
        } else {
// Чтобы не затереть файл с таким же названием, добавим префикс.
            $i = 0;
            $prefix = '';
            while (is_file($path . $parts['filename'] . $prefix . '.' . $parts['extension'])) {
                $prefix = '(' . ++$i . ')';
            }
            $name = $parts['filename'] . $prefix . '.' . $parts['extension'];
// Перемещаем файл в директорию.
            if (move_uploaded_file($file['tmp_name'], $path . $name)) {
// Далее можно сохранить название файла в БД и т.п.
                array_push($fileMass, $name);
            } else {
                $_SESSION['warTypeFile'] = 1;
            }
        }
    }
    $_SESSION['file'] = $fileMass;
}


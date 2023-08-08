<?php
$src = $_FILES['file']['tmp_name'];
$dst = '/tmp/' . $_FILES['file']['name'];
if (move_uploaded_file($src, $dst) == 1) {
echo 'done';
} else {
echo 'error code: ' . $_FILES['file']['error'];
}
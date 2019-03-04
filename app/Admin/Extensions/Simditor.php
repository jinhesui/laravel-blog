<?php
namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;

class Simditor extends Field
{
    protected $view = 'admin.simditor';

    protected static $css = [
        '/css/simditor.css',
    ];

    protected static $js = [
        '/js/module.js',
        '/js/hotkeys.js',
        '/js/uploader.js',
        '/js/simditor.js',

    ];

    public function render()
    {
       $name = $this->formatName($this->column);
       $token = csrf_token();
       $url = route('uploadImg');

       $this->script = <<<EOT
$(document).ready(function(){

      var editor = new Simditor({
          textarea: $('#editor'),
          toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'image', 'hr', '|', 'indent', 'outdent', 'alignment'],
          upload: {
                url: '$url',
                params: { _token: '$token'},
                fileKey: 'upload_file',
                connectionCount: 3,
                leaveConfirm: '文件上传中，关闭此页面将取消上传。'
            },
            pasteImage: true,
      });
 });
EOT;
       return parent::render();

   }
}

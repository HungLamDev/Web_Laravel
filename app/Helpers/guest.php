<?php
use function foo\func;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Str;

if(!function_exists('get_data_user')){
    function get_data_user($type, $field = 'id'){
        return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field : '';
    }
}
if(!function_exists('upload_image')){
    function upload_image($file, $folder = '',  array $extend = array()){
        $code = 1;


        // lay duong dan anh
        $baseFilename = public_path().'/uploads/'.$_FILES[$file]['name'];

       // thong tin file
       $info = new SplFileInfo($baseFilename);
       //duoi file
       $ext = strtolower($info->getExtension());

       // kiem, trang ddinh dang file
       if (! $extend)
         $extend = ['png', 'jpg','jpeg','webp'];

       if (! in_array($ext , $extend))
            return $data['code'] = 0;

        //ten file moi 
        $nameFile = trim(str_replace('.'.$ext,'',strtolower($info->getFilename())));
        $filename = date('Y-m-d__').\Illuminate\Support\Str::slug($nameFile).'.'.$ext;;

        //thu muc goc de upload 
         $path = public_path().'/uploads/'.date('Y/m/d');
        if ($folder)
             $path = public_path().'/uploads/'.$folder.'/'. date('Y/m/d');
            
        if(!\File::exists($path))
            mkdir($path,0777,true);
        
        move_uploaded_file($_FILES[$file]['tmp_name'],$path.'/'.$filename);
            $data = [
                'name' => $filename,
                'code' => $code,
                'path' => $path,
                'path_img' => 'uploads/'.$filename
            ];
        return $data;
         } 
}
if(!function_exists('pare_url_file')){
    function pare_url_file($image , $folder = ''){
        if(!$image){
            return '/images/no-image-'.config('app.name').'.jpg';

        }
        $explode = explode("__", $image);
        if(isset($explode[0])){
            $time = str_replace('-','/', $explode[0]);
            return '/uploads'.$folder.'/'.date('Y/m/d',strtotime($time)).'/'.$image;
        }

    }
}